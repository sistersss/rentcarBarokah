<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Mobil_model');
		$this->load->model('User_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

		// if (empty($this->session->userdata('user_id'))) {
		// 	redirect(base_url().'index.php/login');
		// }

	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['mobil_terbaru'] = $this->Mobil_model->getDataMobilTerbaru();
		$data['content'] = $this->load->view('home',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

	public function detailMobil($id)
	{
		$data['title'] = 'Detail Mobil';
		$data['mobil'] = $this->Mobil_model->getDataMobilById($id);
		$data['content'] = $this->load->view('detail',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

	public function pesanMobil($id)
	{
		if($this->session->userdata('id_pelanggan')){
			$data['title'] = 'Pesan Mobil';
			$data['pelanggan'] = $this->User_model->getDataPelangganById($id);
			$data['content'] = $this->load->view('pesan',$data, TRUE);
			$this->load->view('element/mainuser', $data);
		}
		else {
			redirect(base_url().'index.php/User');
		}
	}
}
