<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaranadmin extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->level!='admin') {
			redirect(base_url());
		}
		$this->load->model("Model");
	}
	public function index()
	{
		$data = array(
			"content" => "admin/pembayaran",
			"list"	  => $this->Model->manual("select * from pembayaran 
						join tagihan on(tagihan.tagihan_id=pembayaran.pembayaran_tagihan_id)
						join siswa on(tagihan.tagihan_siswa_id=siswa.siswa_id)
						join kelas on(kelas.kelas_id=siswa.siswa_kelas_id)")->result()
		);
		$this->load->view('admin/wrapper',$data);
	}
	
	public function validasi() {
		$idp = $this->uri->segment(3);
		$idt = $this->uri->segment(4);
		$data = array(
			"pembayaran_status" => "1"
		);
		$data2 = array(
			"tagihan_status" => "2"
		);
		$res = $this->Model->edit("pembayaran",array("pembayaran_id"=>$idp),$data);		
		if($res) {
			$this->Model->edit('tagihan',array("tagihan_id"=>$idt),$data2);
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Validasi Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Validasi Data.</div>");
		}
		redirect(base_url()."pembayaranadmin");
	}
	
	public function tolak() {
		$idp = $this->uri->segment(3);
		$idt = $this->uri->segment(4);
		$data = array(
			"pembayaran_status" => "2"
		);
		$data2 = array(
			"tagihan_status" => "3"
		);
		$res = $this->Model->edit("pembayaran",array("pembayaran_id"=>$idp),$data);		
		if($res) {
			$this->Model->edit('tagihan',array("tagihan_id"=>$idt),$data2);
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Tolak Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Tolak Data.</div>");
		}
		redirect(base_url()."pembayaranadmin");
	}
	
	public function destroy() {
		$id = $this->uri->segment(3);
		$res = $this->Model->delete("pembayaran",array("pembayaran_id"=>$id));
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Hapus Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Hapus Data.</div>");
		}
		redirect(base_url()."pembayaranadmin");
	}
}
