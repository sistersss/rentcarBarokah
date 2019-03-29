<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Kategori_model');
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
		$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
		$data['mobil_terbaru'] = $this->Mobil_model->getDataMobilTerbaru();
		$data['mobil_terlaris'] = $this->Mobil_model->getDataMobilTerlaris();
		$data['content'] = $this->load->view('home',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

	public function detailMobil($id)
	{
		$data['title'] = 'Detail Mobil';
		$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
		$data['mobil'] = $this->Mobil_model->getDataMobilById($id);
		$data['content'] = $this->load->view('detail',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

<<<<<<< HEAD
=======
	public function listMobil($id=null)
	{
		$data['title'] = 'List Mobil';
		$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
		$data['subkategori'] = $this->Kategori_model->getDataSubkategoriMobil($id);
		$data['mobil'] = $this->Mobil_model->getDataMobil();
		$data['content'] = $this->load->view('listmobil',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

>>>>>>> master
	public function pesanMobil($id)
	{
		if($this->session->userdata('id_pelanggan')){
			$data['title'] = 'Pesan Mobil';
			$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
<<<<<<< HEAD
			$data['pelanggan'] = $this->User_model->getDataPelangganById($id);
=======
			$data['pelanggan'] = $this->User_model->getDataPelangganById($this->session->userdata('id_pelanggan'));
>>>>>>> master
			$data['content'] = $this->load->view('pesan',$data, TRUE);
			$this->load->view('element/mainuser', $data);
		}
		else {
<<<<<<< HEAD
			redirect(base_url().'index.php/User');
		}
=======
			$pesan = array('pesan'=>'active',
    					   'id_pesan'=>$id);
			$this->session->set_userdata($pesan);
			redirect(base_url().'index.php/User');
		}
	}

	public function transaction($id_mobil)
	{
		$id_user = $this->session->userdata('id_pelanggan');
		$mobil = $this->Mobil_model->getDataMobilById($id_mobil);
		$total_bayar = $mobil[0]['harga_sewa']*$this->input->post('lama_pinjam');
		$this->Mobil_model->addTransaction($id_mobil, $id_user, $total_bayar);

		$data['mobil'] = $mobil;
		$data['tgl_pinjam'] = $this->input->post('tgl_pinjam');
		$data['lama_pinjam'] = $this->input->post('lama_pinjam');
		$data['total_bayar'] = $total_bayar;
		$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
		$this->session->unset_userdata('pesan');
		$this->session->unset_userdata('id_pesan');
		$data['content'] = $this->load->view('cetak',$data, TRUE);
		$this->load->view('element/mainuser', $data);
>>>>>>> master
	}
}
