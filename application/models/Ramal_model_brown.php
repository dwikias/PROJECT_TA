<?php
class Ramal_model_brown extends CI_model
{

    public function add_ramal($data)
    {
        $this->db->insert('hitung_brown', $data);
    }

    public function getDetail()
    {
        return  $this->db->get('hitung_brown')->result_array();
    }

    public function getMape()
    {
        return $this->db->get('hasil_mape_brown')->result_array();
    }

    public function getForecast()
    {
        $batas = $this->db->query('SELECT * FROM data_aktual');
        $jum =  $batas->num_rows();

        $this->db->select('tahun', 'nilai_ramal');
        $this->db->from('hitung_brown');
        $this->db->where('periode >', $jum);
        $query = $this->db->get();

        return $query;
    }
}
