<?php
defined('BASEPATH') or exit('No direct script access allowed');


class DatasiswaController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('DatasiswaModel');
    }
    function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('datasiswa/index');
        $this->load->view('templates/footer');
    }

    function data_siswa()
    {
        $data = $this->DatasiswaModel->getAll();
        echo json_encode($data);
    }

    function save()
    {
        $data = $this->DatasiswaModel->save_datasiswa();
        echo json_encode($data);
    }

    function update()
    {
        $data = $this->DatasiswaModel->update_datasiswa();
        echo json_encode($data);
    }

    function delete()
    {
        $data = $this->DatasiswaModel->delete_datasiswa();
        echo json_encode($data);
    }

}
