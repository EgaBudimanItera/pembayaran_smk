<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelasadmin extends CI_Controller {

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
			"content" => "admin/kelas",
			"list"	  => $this->Model->get("kelas")->result()
		);
		$this->load->view('admin/wrapper',$data);
	}
	
	public function insert() {
		$data = array(
			"kelas_nama" => $this->input->post("kelas_nama")
		);
		$res = $this->Model->save("kelas",$data);
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Simpan Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Simpan Data.</div>");
		}
		redirect(base_url()."kelasadmin");
	}
	
	public function update() {
		$id = $this->input->post('kelas_id');
		$data = array(
			"kelas_nama" => $this->input->post("kelas_nama")
		);
		$res = $this->Model->edit("kelas",array("kelas_id"=>$id),$data);
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Ubah Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Ubah Data.</div>");
		}
		redirect(base_url()."kelasadmin");
	}
	
	public function destroy() {
		$id = $this->uri->segment(3);
		$res = $this->Model->delete("kelas",array("kelas_id"=>$id));
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Hapus Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Hapus Data.</div>");
		}
		redirect(base_url()."kelasadmin");
	}
}
