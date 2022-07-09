<?php
class DatasiswaModel extends CI_Model
{

    // function datasiswa_list()
    // {
    //     $hasil = $this->db->query("SELECT * FROM data_aktual");
    //     return $hasil->result();
    // }

    // function simpan_datasiswa($periode, $tahun, $jumlah)
    // {
    //     $hasil = $this->db->query("INSERT INTO data_aktual (periode,tahun,jumlah)VALUES('$periode','$tahun','$jumlah')");
    //     return $hasil;
    // }

    // function get_datasiswa_by_kode($periode)
    // {
    //     $hsl = $this->db->query("SELECT * FROM data_aktual WHERE periode='$periode'");
    //     if ($hsl->num_rows() > 0) {
    //         foreach ($hsl->result() as $data) {
    //             $hasil = array(
    //                 'periode' => $data->periode,
    //                 'tahun' => $data->tahun,
    //                 'jumlah' => $data->jumlah,
    //             );
    //         }
    //     }
    //     return $hasil;
    // }

    // function update_datasiswa($periode, $tahun, $jumlah)
    // {
    //     $hasil = $this->db->query("UPDATE data_aktual SET periode = '$periode', tahun ='$tahun', jumlah='$jumlah' WHERE periode='$periode'");
    //     return $hasil;
    // }

    // function hapus_datasiswa($periode)
    // {
    //     $hasil = $this->db->query("DELETE FROM data_aktual WHERE periode='$periode'");
    //     return $hasil;
    // }
    public function getAll()
    {
        return $this->db->get('data_aktual')->result_array();
    }

    function save_datasiswa()
    {
        $data = array(
            'periode'     => $this->input->post('periode'),
            'tahun'     => $this->input->post('tahun'),
            'jumlah' => $this->input->post('jumlah'),
        );
        $result = $this->db->insert('data_aktual', $data);
        return $result;
    }

    function update_datasiswa()
    {
        $periode = $this->input->post('periode');
        $tahun = $this->input->post('tahun');
        $jumlah = $this->input->post('jumlah');


        $this->db->set('tahun', $tahun);
        $this->db->set('jumlah', $jumlah);
        $this->db->where('periode', $periode);
        $result = $this->db->update('data_aktual');
        return $result;
    }

    function delete_datasiswa()
    {
        $periode = $this->input->post('periode');
        $this->db->where('periode', $periode);
        $result = $this->db->delete('data_aktual');
        return $result;
    }

    public function deleteAllData()
    {
        $this->db->empty_table('data_aktual');
    }
}
