<?php
class Ramal_model_holt extends CI_model
{

    public function add_ramal($data)
    {
        $this->db->insert('hitung_holt', $data);
    }

    public function getDetail()
    {
        return  $this->db->get('hitung_holt')->result_array();
    }

    public function getMape()
    {
        return $this->db->get('hasil_mape_holt')->result_array();
    }
}
