<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Model");
	}
	public function index()
	{
		$data = array(
			'page' => 'front'
		);
		$this->load->view('wrapper',$data);
	}
	
	public function informasi() {
		$data = array(
			'page' => 'informasi'
		);
		$this->load->view('wrapper',$data);
	}
	
	public function login() {
		$data = array(
			'page' => 'login'
		);
		$this->load->view('wrapper',$data);
	}
	
	public function logout() {
		session_destroy();
		redirect(base_url());
	}
	
	public function proseslogin() {
		
		$login = $this->Model->get_where("siswa",array("siswa_nis"=>$this->input->post('username'),"siswa_password"=>md5($this->input->post("password"))))->row();
		if(!empty($login)) {
			$this->session->set_userdata(array("username"=>$login->siswa_nis,"nama"=>$login->siswa_nama,"id"=>$login->siswa_id));
			redirect(base_url());
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Login.</div>");
			redirect(base_url()."front/login");
		}
	}
	
	public function profil() {
		if(empty($this->session->username)) {
			session_destroy();
			redirect(base_url());
		}
		$username = $this->session->username;
		$data = array(
			'page' => 'profil',
			'ls' => $this->Model->manual("SELECT * FROM siswa JOIN kelas ON(kelas.kelas_id=siswa.siswa_kelas_id) WHERE siswa_nis='$username'")->row()
		);
		$this->load->view('wrapper',$data);
	}
	
	public function pembayaran() {
		if(empty($this->session->username)) {
			session_destroy();
			redirect(base_url());
		}
		$username = $this->session->id;
		$data = array(
			'page' => 'pembayaran',
			'list' => $this->Model->get_where("tagihan",array("tagihan_siswa_id"=>$username))->result(),
			'tagihan' => $this->Model->get_where("tagihan",array("tagihan_siswa_id"=>$username,"tagihan_status"=>"0"))->num_rows(),
		);
		$this->load->view('wrapper',$data);
	}
	
	public function formbayar() {
		if(empty($this->session->username)) {
			session_destroy();
			redirect(base_url());
		}
		$username = $this->session->id;
		$idtagihan = $this->uri->segment(3);
		$data = array(
			'page' => 'formpembayaran',
			'list' => $this->Model->get_where("tagihan",array("tagihan_id"=>$idtagihan))->row()
		);
		$this->load->view('wrapper',$data);
	}
	
	public function uploadbuktibayar() {
		if(empty($this->session->username)) {
			session_destroy();
			redirect(base_url());
		}
		
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 1024;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if($this->upload->do_upload('pembayaran_bukti')) {
			$file = $this->upload->data();
			$insert = array(
				"pembayaran_jumlah" => $this->input->post('pembayaran_jumlah'),
				"pembayaran_tanggal" => $this->input->post('pembayaran_tanggal'),
				"pembayaran_norek" => $this->input->post('pembayaran_norek'),
				"pembayaran_atasnama" => $this->input->post('pembayaran_atasnama'),
				"pembayaran_tagihan_id" => $this->input->post('pembayaran_tagihan_id'),
				"pembayaran_bukti" => $file['file_name']
			);
			$res = $this->Model->save('pembayaran',$insert);
			if($res) {				
				$this->Model->edit("tagihan",array("tagihan_id"=>$this->input->post('pembayaran_tagihan_id')),array('tagihan_status'=>'1'));				
				$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Upload Bukti Transfer.</div>");			
			}else {
				$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Upload Bukti Transfer.</div>");				
			}
		}else {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Upload Bukti Transfer. ".$error."</div>");				
		}
		redirect(base_url()."front/pembayaran");
	}
	
	public function detailbayar() {
		if(empty($this->session->username)) {
			session_destroy();
			redirect(base_url());
		}
		$username = $this->session->id;
		$id = $this->uri->segment(3);
		$data = array(
			'page' => 'detailpembayaran',
			'list' => $this->Model->get_where("pembayaran",array("pembayaran_tagihan_id"=>$id))->row()
		);
		$this->load->view('wrapper',$data);
	}
	
}
