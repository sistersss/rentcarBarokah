<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Pelanggan_model');
		$this->load->model('Admin_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['title'] = "Daftar Pelanggan";
		$data['pelanggan'] = $this->Pelanggan_model->getPelanggan();
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('pelanggan/list',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function tambahPelanggan()
	{
		$this->Pelanggan_model->addPelanggan();
		redirect(base_url().'Pelanggan');
	}

	public function editPelanggan($id)
	{
		$this->Pelanggan_model->editPelanggan($id);
		redirect(base_url().'Pelanggan');
	}

	public function hapusPelanggan($id)
	{
		$this->Pelanggan_model->deletePelanggan($id);
		redirect(base_url().'Pelanggan');
	}
}
