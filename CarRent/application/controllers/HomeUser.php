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
	}

	public function sendEmail()
	{
		ini_set("SMTP","smtp.gmail.com");

		// $ToEmail = 'andhikaadjie23@gmail.com'; 
	 //    $EmailSubject = $this->input->post('c_subject'); 
	 //    $mailheader = "From: ".$this->input->post('c_email')."\r\n"; 
	 //    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	 //    $MESSAGE_BODY = $this->input->post('c_message');
	 //    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

		$this->load->library('email');

		       //SMTP & mail configuration
				$config = array(
					'protocol' => 'smtp',
					'mailtype'=> 'text',
					'crlf' => '\r\n',
					'wordwrap'=>TRUE,
					'newline'=>'\r\n',
					'validate'=>FALSE,
					'smtp_host' => 'smtp.gmail.com',
					'smtp_port' => 587,
					'smtp_user' => 'andhikaadjie23@gmail.com',
					'smtp_pass' => '05November1996',
					'charset' => 'utf-8'
				);
				$this->email->initialize($config);

		       //Email content

				$this->email->from('noreply@kuliahonline360.com', 'No-Reply KulOn');
				$this->email->to('andhikaadjie23@gmail.com');				
				$this->email->subject('Lupa Password');
				// 		$message = "<p>This email has been sent as a request to reset our password</p>";
		  //          	$message .= "<p><a href='admin.kuliahonline360.com/user/forget_password/".$check['code']."'>Click here </a>if you want to reset your password,
		  //                      if not, then ignore</p>";
				$message = 'asgdhsajd';
				$this->email->message($message);
				if ($this->email->send()) {
					echo "SUKSES";
				}
				else {
					echo "GAGAL";
				}
	}
}
