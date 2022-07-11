<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ramal extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Peramalan Jumlah Siswa';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peramalan/index');
        $this->load->view('templates/footer');
    }

}
