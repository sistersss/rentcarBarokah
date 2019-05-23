<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Transaction_model');
		$this->load->model('Pelanggan_model');
		$this->load->model('Mobil_model');
		$this->load->model('Jenis_model');
		$this->load->model('Admin_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

		$this->load->library('ckeditor');

		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		// $this->ckeditor->config['toolbar'] = array(
  //               array('Bold','Italic','Underline','Strike','Subscript','Superscript')
                                                    // );
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '300px';

	}

	public function penyewaan()
	{
		$data['title'] = "Daftar Transaction";
		$data['sewa'] = $this->Transaction_model->getSewa();
		$data['jenis'] = $this->Jenis_model->getJenis();
		$data['pelanggan'] = $this->Pelanggan_model->getPelanggan();
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('transaction/listsewa',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function checkTransaction()
	{
		$tran = $this->Transaction_model->getTransaction();
		foreach ($tran as $t) {
			$awal  = new DateTime($t['tgl_sewa']); // waktu sewa(tanggal diambil)
			$akhir = new DateTime(date('Y-m-d H:i:s')); // Waktu sekarang
			$diff  = $awal->diff($akhir); // hitung selisih hari
	   		$telat = $diff->d; // ngambil selisih hari

	   		if($telat > 1){ // cek selisih hari kalo lebih dari 1
	   			$this->Transaction_model->expiredTransaction($t['id_transaksi']); // ubah status transaksi jadi 2:expired
	   			$this->Transaction_model->notifExpired($t['id_transaksi']); // buat notif transaksi expired
	   			$this->db->query("UPDATE mobil SET kuota_mobil=(kuota_mobil+1) WHERE id_mobil=".$t['id_mobil']);
	   		}
	   		else{

	   		}
		}
	}

	public function settingKeterangan()
	{
		$data['title'] = 'Setting Keterangan';
		if (isset($_POST['submit'])) {
			$this->Transaction_model->updateKeterangan();
			redirect(base_url().'Transaction/settingKeterangan');
		}
		else {
			$data['keterangan'] = $this->Transaction_model->getKeterangan();
			$data['notif'] = $this->Admin_model->getNotifikasi();
			$data['content'] = $this->load->view('element/settingketerangan',$data, TRUE);
			$this->load->view('element/main', $data);
		}
	}

	public function pengembalian()
	{
		$data['title'] = "Daftar Transaction";
		$data['kembali'] = $this->Transaction_model->getKembali();
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('transaction/listkembali',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function kembalikanMobil()
	{
		$data['title'] = "Daftar Transaction";
		$data['pengembalian'] = $this->Transaction_model->getPengembalian();
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('transaction/listpengembalian',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function subjenisAjax($id) { 
       $result = $this->db->where("id_jenis",$id)->get("subjenis")->result();

       echo json_encode($result);

   	}

   	public function mobilAjax($id) { 
       $result = $this->db->where("id_subjenis",$id)->get("mobil")->result();

       echo json_encode($result);

   	}

   	public function detailmobilAjax($id) { 
       $result = $this->db->where("id_mobil",$id)->get("mobil")->result();

       echo json_encode($result);

   	}

   	public function ambilMobil($id, $id_mobil)
   	{
   		$this->Transaction_model->updateStatus($id);
   		// $this->db->query("UPDATE mobil SET kuota_mobil=(kuota_mobil-1) WHERE id_mobil=".$id_mobil);
   		redirect(base_url().'Transaction/penyewaan');
   	}

   	public function kembaliMobil($id, $id_mobil)
   	{
   		$tran = $this->Transaction_model->getTransactionById($id);
   		$awal  = new DateTime($tran[0]['tgl_sewa']);
		$akhir = new DateTime(date('Y-m-d H:i:s')); // Waktu sekarang
		$diff  = $awal->diff($akhir);
   		$telat = $diff->d - $tran[0]['lama_sewa'];
   		if($telat > 0) {
   			$denda = 100000*$telat;
   		}
   		else {
   			$denda = 0;
   		}
   		$this->Transaction_model->kembaliMobil($id, $denda);
   		$this->db->query("UPDATE mobil SET kuota_mobil=(kuota_mobil+1) WHERE id_mobil=".$id_mobil);
   		redirect(base_url().'Transaction/pengembalian');
   	}

	public function tambahSewa()
	{
		$this->Transaction_model->addSewa();
		redirect(base_url().'Transaction/penyewaan');
	}

	public function editSewa($id)
	{
		$this->Transaction_model->editSewa($id);
		redirect(base_url().'Transaction/penyewaan');
	}

	public function hapusSewa($id)
	{
		$this->Transaction_model->deleteTransaksi($id);
		redirect(base_url().'Transaction/penyewaan');
	}

	public function hapusKembali($id)
	{
		$this->Transaction_model->deleteTransaksi($id);
		redirect(base_url().'Transaction/pengembalian');
	}
}
