<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ramal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datasiswa_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['judul'] = 'Peramalan Jumlah Siswa';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peramalan/index');
        $this->load->view('templates/footer');
    }

    public function tb_mape()
    {

    }

    public function hitung_brown()
    {
        echo "";
    }
}
