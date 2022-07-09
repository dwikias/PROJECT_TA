<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datasiswa_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Data Jumlah Siswa';
		$data['data_aktual'] = $this->Datasiswa_model->getAll();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('datasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';

		$this->form_validation->set_rules('periode', 'Periode', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('datasiswa/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Datasiswa_model->tambahDataSiswa();
			redirect('datasiswa/index');
		}
	}

	public function hapus($periode)
	{
		$this->Datasiswa_model->hapusDataSiswa($periode);
		redirect('datasiswa/index');
	}

	public function hapusAll()
	{
		$this->Datasiswa_model->hapusAllData();
		redirect('datasiswa/index');
	}

	public function edit($periode)
	{
		$data['judul'] = 'Ubah Data Jumlah Siswa';
		$data['data_aktual'] = $this->Datasiswa_model->ambil_data($periode);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('datasiswa/edit', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit($periode)
	{
		$this->Datasiswa_model->proses_edit($periode);
		redirect('datasiswa');
	}

	public function chart_data()
	{
		$data = $this->Datasiswa_model->getAll();
		echo json_encode($data);
	}
}
