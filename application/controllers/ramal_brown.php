<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ramal_brown extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatasiswaModel');
        $this->load->model('Ramal_model_brown');
        $this->load->helper('url');
        //$this->load->library('form_validation');
    }

    // RUMUS PERALAMAN BROWN
    public function hitung_brown($alpha)
    {

        $tables = $this->DatasiswaModel->getAll();
        $periode = 3;
        $s_single_quote = 0;
        $s_double_quote = 0;

        $tables_forecasting = [];
        $tahun_forecasting = 0;
        $periode_forecasting = 0;
        $last_tahun_actual = 0;
        $at = 0;
        $bt = 0;
        $sum = 0;

        for ($i = 0; $i < count($tables) + $periode - 1; $i++) {

            $table_forecasting = new stdClass();

            if ($i < count($tables)) {
                if (
                    $i == 0
                ) {
                    $s_single_quote = $tables[$i]['jumlah'];
                    $s_double_quote = $tables[$i]['jumlah'];
                } else {
                    $s_single_quote = ($alpha * $tables[$i]['jumlah']) + (1 - $alpha) * ($s_single_quote);
                    $s_double_quote = ($alpha * $s_single_quote) + ((1 - $alpha) * ($s_double_quote));
                }

                $at = (2 * $s_single_quote) - $s_double_quote;
                $bt = ($alpha / (1 - $alpha)) * ($s_single_quote - $s_double_quote);

                $m = 1;
                $last_tahun_actual = $tables[$i]['tahun'];
                $tahun_forecasting = $last_tahun_actual + 1;
                $periode_forecasting = $tables[$i]['periode'] + 1;
                $table_forecasting->jumlah = $at + ($bt * $m);

                if ($i < count($tables) - 1) {
                    $table_forecasting->error = abs($tables[$i + 1]['jumlah'] - $table_forecasting->jumlah) / abs($tables[$i + 1]['jumlah']);
                    $table_forecasting->error = round($table_forecasting->error * 100, 2);
                    $sum += $table_forecasting->error;
                }
            } else {
                $tahun_forecasting = $tahun_forecasting + 1;
                $periode_forecasting = $periode_forecasting + 1;
                $m = $tahun_forecasting - $last_tahun_actual;
                $table_forecasting->jumlah = $at + ($bt * $m);
            }

            $table_forecasting->periode = $periode_forecasting;
            $table_forecasting->tahun = $tahun_forecasting;

            $tables_forecasting[$i] = $table_forecasting;
        }

        $mape = $sum / (count($tables) - 1);
        return round($mape, 3);
    }

    // DETAIL PERALAMAN BROWN
    public function detailBrown($alpha)
    {

        $tables = $this->DatasiswaModel->getAll();
        $periode = 3;
        $s_single_quote = 0;
        $s_double_quote = 0;

        $tables_forecasting = [];
        $tahun_forecasting = 0;
        $periode_forecasting = 0;
        $last_tahun_actual = 0;
        $at = 0;
        $bt = 0;
        $sum = 0;

        for ($i = 0; $i < count($tables) + $periode - 1; $i++) {

            $table_forecasting = new stdClass();

            if ($i < count($tables)) {

                if (
                    $i == 0
                ) {
                    $s_single_quote = $tables[$i]['jumlah'];
                    $s_double_quote = $tables[$i]['jumlah'];
                } else {
                    $s_single_quote = $alpha * $tables[$i]['jumlah'] + (1 - $alpha) * ($s_single_quote);
                    $s_double_quote = $alpha * $s_single_quote + (1 - $alpha) * ($s_double_quote);
                }

                $at = 2 * $s_single_quote - $s_double_quote;
                $bt = ($alpha / (1 - $alpha)) * ($s_single_quote - $s_double_quote);
                $m = 1;
                $last_tahun_actual = $tables[$i]['tahun'];
                $tahun_forecasting = $last_tahun_actual + 1;
                $periode_forecasting = $tables[$i]['periode'] + 1;
                $table_forecasting->jumlah = $at + ($bt * $m);

                if ($i < count($tables) - 1) {
                    $table_forecasting->error = abs($tables[$i + 1]['jumlah'] - $table_forecasting->jumlah) / abs($tables[$i + 1]['jumlah']);
                    $table_forecasting->error = round($table_forecasting->error * 100, 2);
                    $sum += $table_forecasting->error;
                }
            } else {
                //Menghitung peramalan 3 tahun berikutnya

                $tahun_forecasting = $tahun_forecasting + 1;
                $periode_forecasting = $periode_forecasting + 1;
                $m = $tahun_forecasting - $last_tahun_actual;
                $table_forecasting->jumlah = $at + ($bt * $m);
            }

            $table_forecasting->periode = $periode_forecasting;
            $table_forecasting->tahun = $tahun_forecasting;
            $tables_forecasting[$i] = $table_forecasting;
        }

        foreach ($tables_forecasting as $row) {

            $data[] = [

                'periode' => $row->periode,
                'tahun' => $row->tahun,
                'nilai_ramal' => round($row->jumlah, 2),
            ];
        }

        $cek_kondisi = $this->Ramal_model_brown->getDetail();

        if ($cek_kondisi == NULL) {
            $this->db->insert_batch('hitung_brown', $data);
        } else {
            $this->db->update_batch('hitung_brown', $data, 'periode');
        }
    }


    public function hitung_mape_brown()
    {
        $alpha = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9];

        foreach ($alpha as $alpha) {
            $data = $this->hitung_brown($alpha);

            if ($data < 10) {
                $kateg = "Sangat Baik";
            } elseif ($data < 20) {
                $kateg = "Baik";
            } elseif ($data < 50) {
                $kateg = "Cukup";
            } else {
                $kateg = "Buruk";
            }

            $this->db->insert('hasil_mape_brown', ["alpha" => $alpha, "nilai_mape" => $data, "kateg" => $kateg]);
        }
    }

    public function mape_brown()
    {

        if ($this->Ramal_model_brown->getMape() == NULL) {
            $this->hitung_mape_brown();
        } else {
            $this->update_mape_brown();
        }

        echo json_encode($this->Ramal_model_brown->getMape());
    }

    public function update_mape_brown()
    {
        $alpha = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9];

        foreach ($alpha as $alpha) {
            $data = $this->hitung_brown($alpha);

            if ($data < 10) {
                $kateg = "Sangat Baik";
            } elseif ($data < 20) {
                $kateg = "Baik";
            } elseif ($data < 50) {
                $kateg = "Cukup";
            } else {
                $kateg = "Buruk";
            }

            $this->db->update('hasil_mape_brown', ["alpha" => $alpha, "nilai_mape" => $data, "kateg" => $kateg], ["alpha" => $alpha]);
        }
    }

    public function getDetail()
    {
        $alpha = $this->uri->segment(3);;

        $this->load->model('Ramal_model_brown');
        $data['judul'] = 'Hasil Peramalan Jumlah Siswa';

        $this->detailBrown($alpha);

        $data['hitung_brown'] = $this->Ramal_model_brown->getDetail();
        $data['data_aktual'] = $this->DatasiswaModel->getAll();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peramalan/detail_brown', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        return $this->load->view('peramalan/cetakPdf_brown');
    }
}
