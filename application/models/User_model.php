<?php

class User_model extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('data_user')->result_array();
    }

    public function tambahDataUser()
    {
        $data = [
            'id' => $this->input->post('id', true),
            'nama' => $this->input->post('nama', true),
            'pass' => $this->input->post('pass', true)
        ];

        $this->db->insert('data_user', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_user');
    }

    public function hapusAllData()
    {
        $this->db->emptyTable('data_user');
    }

    public function ambil_data($id)
    {
        return $this->db->get_where('data_user', ['id' => $id])->row_array();
    }

    public function proses_edit()
    {

        $data =
            [
                'id' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'pass' => $this->input->post('pass'),
            ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('data_user', $data);
    }
}
