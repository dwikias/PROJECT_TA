<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ramal_holt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DatasiswaModel');
        $this->load->model('Ramal_model_holt');
        //$this->load->library('form_validation');
    }

    // RUMUS PERAMALAN DES HOLT
    public function hitung_holt($alpha, $betha)
    {
        $tables = $this->DatasiswaModel->getAll();

        $periode = 3;
        $st = [];
        $bt = [];

        $tables_forecasting = [];
        $tahun_forecasting = 0;
        $periode_forecasting = 0;
        $last_tahun_actual = 0;
        $n = 0;
        $sum = 0;


        for ($i = 0; $i < count($tables) + $periode - 1; $i++) {

            $table_forecasting = new stdClass();

            if ($i < count($tables)) {
                if ($i == 0) {
                    $st[$i] = $tables[$i]['jumlah'];
                    $bt[$i] = (($tables[3]['jumlah'] - $tables[2]['jumlah']) + ($tables[1]['jumlah'] - $tables[0]['jumlah'])) / 2;
                } else {
                    $st[$i] = ($alpha * $tables[$i]['jumlah']) + ((1 - $alpha) * ($st[$i - 1] + $bt[$i - 1]));
                    $bt[$i] = ($betha * ($st[$i] - $st[$i - 1])) + ((1 - $betha) * $bt[$i - 1]);
                }

                $m = 1;

                $last_tahun_actual = $tables[$i]['tahun'];
                $tahun_forecasting = $last_tahun_actual + 1;
                $periode_forecasting = $tables[$i]['periode'] + 1;
                $table_forecasting->jumlah = $st[$i] + ($bt[$i] * $m);

                if ($i < count($tables) - 1) {
                    $table_forecasting->error = abs($tables[$i + 1]['jumlah'] - $table_forecasting->jumlah) / abs($tables[$i + 1]['jumlah']);
                    $table_forecasting->error = round($table_forecasting->error * 100, 2);
                    $sum += $table_forecasting->error;
                }

                $n = $i;
            } else {

                $tahun_forecasting = $tahun_forecasting + 1;
                $periode_forecasting = $periode_forecasting + 1;
                $m = $tahun_forecasting - $last_tahun_actual;
                $table_forecasting->jumlah = $st[$n] + ($bt[$n] * $m);
            }

            $table_forecasting->periode = $periode_forecasting;
            $table_forecasting->tahun = $tahun_forecasting;
            $tables_forecasting[$i] = $table_forecasting;
        }

        $mape = $sum / (count($tables) - 1);
        return round($mape, 3);
    }


    // DETAIL DES HOLT
    public function detailHolt($alpha, $betha)
    {
        $tables = $this->DatasiswaModel->getAll();
        $periode = 3;
        $st = [];
        $bt = [];

        $tables_forecasting = [];
        $tahun_forecasting = 0;
        $periode_forecasting = 0;
        $last_tahun_actual = 0;
        $n = 0;
        $sum = 0;


        for ($i = 0; $i < count($tables) + $periode - 1; $i++) {

            $table_forecasting = new stdClass();

            if ($i < count($tables)) {
                if ($i == 0) {
                    $st[$i] = $tables[$i]['jumlah'];
                    $bt[$i] = (($tables[3]['jumlah'] - $tables[2]['jumlah']) + ($tables[1]['jumlah'] - $tables[0]['jumlah'])) / 2;
                } else {
                    $st[$i] = ($alpha * $tables[$i]['jumlah']) + ((1 - $alpha) * ($st[$i - 1] + $bt[$i - 1]));
                    $bt[$i] = ($betha * ($st[$i] - $st[$i - 1])) + ((1 - $betha) * $bt[$i - 1]);
                }

                $m = 1;

                $last_tahun_actual = $tables[$i]['tahun'];
                $tahun_forecasting = $last_tahun_actual + 1;
                $periode_forecasting = $tables[$i]['periode'] + 1;

                $table_forecasting->jumlah = $st[$i] + ($bt[$i] * $m);


                if ($i < count($tables) - 1) {
                    $table_forecasting->error = abs($tables[$i + 1]['jumlah'] - $table_forecasting->jumlah) / abs($tables[$i + 1]['jumlah']);
                    $table_forecasting->error = round($table_forecasting->error * 100, 2);
                    $sum += $table_forecasting->error;
                }

                $n = $i;
            } else {

                $tahun_forecasting = $tahun_forecasting + 1;
                $periode_forecasting = $periode_forecasting + 1;
                $m = $tahun_forecasting - $last_tahun_actual;
                $table_forecasting->jumlah = $st[$n] + ($bt[$n] * $m);
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

        $cek_kondisi = $this->Ramal_model_holt->getDetail();

        if ($cek_kondisi == NULL) {
            $this->db->insert_batch('hitung_holt', $data);
        } else {
            $this->db->update_batch('hitung_holt', $data, 'periode');
        }
    }

    public function hitung_mape_holt()
    {
        $betha = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9];
        $alpha = 0.9;

        foreach ($betha as $betha) {
            $data = $this->hitung_holt($alpha, $betha);

            if ($data < 10) {
                $kateg = "Sangat Baik";
            } elseif ($data < 20) {
                $kateg = "Baik";
            } elseif ($data < 50) {
                $kateg = "Cukup";
            } else {
                $kateg = "Buruk";
            }


            $this->db->insert('hasil_mape_holt', ["alpha" => $alpha, "betha" => $betha, "nilai_mape" => $data, "kateg" => $kateg]);
        }
    }

    public function mape_holt()
    {
        $data['judul'] = 'Hasil Akurasi Metode DES Holt';

        if ($this->Ramal_model_holt->getMape() == NULL) {

            $this->hitung_mape_holt();
        } else {
            $this->update_mape_holt();
        }

        echo json_encode($this->Ramal_model_holt->getMape());
    }

    public function update_mape_holt()
    {
        $betha = [0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9];
        $alpha = 0.9;

        foreach ($betha as $betha) {
            $data = $this->hitung_holt($alpha, $betha);

            if ($data < 10) {
                $kateg = "Sangat Baik";
            } elseif ($data < 20) {
                $kateg = "Baik";
            } elseif ($data < 50) {
                $kateg = "Cukup";
            } else {
                $kateg = "Buruk";
            }


            $this->db->update('hasil_mape_holt', ["alpha" => $alpha, "betha" => $betha, "nilai_mape" => $data, "kateg" => $kateg], ["betha" => $betha]);
        }
    }

    public function getDetail()
    {
        $this->load->model('Ramal_model_holt');
        $data['judul'] = 'Hasil Peramalan Jumlah Siswa';


        $betha = $this->uri->segment(3);;
        $alpha = 0.9;

        $this->detailHolt($alpha, $betha);

        $data['data_aktual'] = $this->DatasiswaModel->getAll();
        $data['hitung_holt'] = $this->Ramal_model_holt->getDetail();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peramalan/detail_holt', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        return $this->load->view('peramalan/cetakPdf_holt');
    }
}
