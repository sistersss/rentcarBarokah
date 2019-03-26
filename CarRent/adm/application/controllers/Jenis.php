<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Jenis_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['title'] = "Daftar Jenis";
		$data['jenis'] = $this->Jenis_model->getJenis();
		$data['content'] = $this->load->view('jenis/list',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function tambahJenis()
	{
		$this->Jenis_model->addJenis();
		redirect(base_url().'Jenis');
	}

	public function editJenis($id)
	{
		$this->Jenis_model->editJenis($id);
		redirect(base_url().'Jenis');
	}

	public function hapusJenis($id)
	{
		$this->Jenis_model->deleteJenis($id);
		redirect(base_url().'Jenis');
	}
}
