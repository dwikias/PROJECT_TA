<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		$this->load->model('DatasiswaModel');
		$this->load->model('Ramal_model_brown');
		$this->load->model('Ramal_model_holt');

		$data['data_aktual'] = $this->DatasiswaModel->getAll();
		$data['hitung_brown'] = $this->Ramal_model_brown->getDetail();
		$data['hitung_holt'] = $this->Ramal_model_holt->getDetail();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function about()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('about');
		$this->load->view('templates/footer');
	}
}
