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
		ini_set("SMTP","smtp.gmail.com");

		// $ToEmail = 'andhikaadjie23@gmail.com'; 
	 //    $EmailSubject = $this->input->post('c_subject'); 
	 //    $mailheader = "From: ".$this->input->post('c_email')."\r\n"; 
	 //    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	 //    $MESSAGE_BODY = $this->input->post('c_message');
	 //    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

		$this->load->library('email');

		       $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'andhikaadjie23@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => '05November1996',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];
 
        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from($this->input->post('c_email'));    // Email dan nama pegirim.
        $this->email->to('andhikaadjie23@gmail.com');                       // Penerima email.
 
        // Lampiran email. Isi dengan url/path file.
        // $this->email->attach('https://masrud.com/themes/masrud/img/logo.png');
 
        // Subject email.
        $this->email->subject($this->input->post('c_subject'));
 
        // Isi email. Bisa dengan format html.
        $this->email->message($this->input->post('c_message'));
		if ($this->email->send()) {
			echo "SUKSES";
		}
		else {
			echo "GAGAL";
		}
	}
}
