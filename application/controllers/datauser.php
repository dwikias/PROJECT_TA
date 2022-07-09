<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datauser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data User';
        $data['data_user'] = $this->User_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('datauser/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('datauser/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->User_model->tambahDataUser();
            redirect('datauser/index');
        }
    }

    public function hapus($id)
    {
        $this->User_model->hapusDataUser($id);
        redirect('datauser/index');
    }

    public function hapusAll()
    {
        $this->User_model->hapusAllData();
        redirect('datauser/index');
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data User';
        $data['data_user'] = $this->User_model->ambil_data($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('datauser/edit', $data);
        $this->load->view('templates/footer');
    }

    public function proses_edit($id)
    {
        $this->User_model->proses_edit($id);
        redirect('datauser/index');
    }
}
