<?php

class Datasiswa_model extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('data_aktual')->result_array();
    }

    public function getAlpha()
    {
        return $this->db->get('alpha')->result_array();
    }

    public function tambahDataSiswa()
    {
        $data = [
            'periode' => $this->input->post('periode', true),
            'tahun' => $this->input->post('tahun', true),
            'jumlah' => $this->input->post('jumlah', true)
        ];

        $this->db->insert('data_aktual', $data);
    }

    public function hapusDataSiswa($periode)
    {
        $this->db->where('periode', $periode);
        $this->db->delete('data_aktual');
    }

    public function hapusAllData()
    {
        $this->db->empty_table('data_aktual');
    }


    public function ambil_data($periode)
    {
        return $this->db->get_where('data_aktual', ['periode' => $periode])->row_array();
    }

    public function proses_edit()
    {

        $data =
            [
                'periode' => $this->input->post('periode'),
                'tahun' => $this->input->post('tahun'),
                'jumlah' => $this->input->post('jumlah'),
            ];

        $this->db->where('periode', $this->input->post('periode'));
        $this->db->update('data_aktual', $data);
    }
}
