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

	public function historiTransaksi($id)
	{
		$data['title'] = 'Histori Transaksi';
		$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
		$data['histori'] = $this->Mobil_model->getDataTransaksi($id);
		$data['content'] = $this->load->view('histori',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

	public function contactUs()
	{
		$data['title'] = 'Kontak';
		$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
		$data['content'] = $this->load->view('contact',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

	public function listMobil($id=null)
	{
		$data['title'] = 'List Mobil';
		$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
		$data['subkategori'] = $this->Kategori_model->getDataSubkategoriMobil($id);
		$data['mobil'] = $this->Mobil_model->getDataMobil();
		$data['content'] = $this->load->view('listmobil',$data, TRUE);
		$this->load->view('element/mainuser', $data);
	}

	public function pesanMobil($id)
	{
		if($this->session->userdata('id_pelanggan')){
			$data['title'] = 'Pesan Mobil';
			$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
			$data['keterangan'] = $this->User_model->getKeterangan();
			$data['pelanggan'] = $this->User_model->getDataPelangganById($this->session->userdata('id_pelanggan'));
			$data['content'] = $this->load->view('pesan',$data, TRUE);
			$this->load->view('element/mainuser', $data);
		}
		else {
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
		if($mobil[0]['kuota_mobil']>=1) {
			$total_bayar = $mobil[0]['harga_sewa']*$this->input->post('lama_pinjam');
			$this->Mobil_model->addTransaction($id_mobil, $id_user, $total_bayar);
			$kuota_sekarang = $mobil[0]['kuota_mobil']-1;
			$this->Mobil_model->updateKuota($id_mobil, $kuota_sekarang);

			$data['mobil'] = $mobil;
			$data['tgl_pinjam'] = $this->input->post('tgl_pinjam');
			$data['lama_pinjam'] = $this->input->post('lama_pinjam');
			$data['total_bayar'] = $total_bayar;
			$data['kategori'] = $this->Kategori_model->getDataKategoriMobil();
			$data['transaksi'] = $this->Mobil_model->getDataTransaksiMobil();
			$data['keterangan'] = $this->User_model->getKeterangan();
			$this->session->unset_userdata('pesan');
			$this->session->unset_userdata('id_pesan');
			$data['content'] = $this->load->view('cetak',$data, TRUE);
			$this->load->view('element/mainuser', $data);
		}
		else {
			$this->session->set_flashdata('kuota', 'Kuota Mobil Sudah Habis');
			redirect(base_url());
		}
	}

	public function batalkanTransaksi($id, $id_mobil)
	{
		$this->db->query("UPDATE transaction SET status=3 WHERE id_transaksi=".$id);
		$this->db->query("UPDATE mobil SET kuota_mobil=(kuota_mobil+1) WHERE id_mobil=".$id_mobil);
		redirect(base_url().'index.php/HomeUser/historiTransaksi/'.$this->session->userdata('id_pelanggan'));
	}

	public function sendEmail()
	{
		$from_email = $this->input->post('c_email');
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'nania.anabela22@gmail.com',
			'smtp_pass' => '25021999',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($from_email, 'Identification');
        $this->email->to("nania.anabela22@gmail.com");
        $this->email->subject($this->input->post('c_subject'));
        $this->email->message($this->input->post('c_message'));
        //Send mail
        if($this->email->send()){
            echo "SUKSES";
        }
        else{
            echo "GAGAL";
        }

		
	}
}
