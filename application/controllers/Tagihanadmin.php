<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihanadmin extends CI_Controller {

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
			"content" => "admin/tagihan",
			"list"	  => $this->Model->manual("select * from tagihan 
							join siswa on(siswa.siswa_id=tagihan.tagihan_siswa_id)
							join kelas on(kelas.kelas_id=siswa.siswa_kelas_id)")->result(),
			"kelas"	  => $this->Model->get("kelas")->result(),
			"siswa"   => $this->Model->get("siswa")->result()
		);
		$this->load->view('admin/wrapper',$data);
	}
	
	public function insertindividu() {
		$data = array(
			"tagihan_tanggal" => $this->input->post("tagihan_tanggal"),
			"tagihan_siswa_id" => $this->input->post("tagihan_siswa_id"),
			"tagihan_pesan" => $this->input->post("tagihan_pesan")
		);
		$res = $this->Model->save("tagihan",$data);
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Simpan Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Simpan Data.</div>");
		}
		redirect(base_url()."tagihanadmin");
	}
	
	public function insertgroup() {
		
		$kelas = $this->input->post("tagihan_siswa_id");
		$qkelas = $this->db->get_where("siswa",array("siswa_kelas_id"=>$kelas))->result();
		if(!empty($qkelas)) {
			
			$arrinsert = array();
			$i = 0;
			foreach($qkelas as $qk) {
				$arrinsert[$i]['tagihan_siswa_id'] = $qk->siswa_id;
				$arrinsert[$i]['tagihan_tanggal'] = $this->input->post("tagihan_tanggal");
				$arrinsert[$i]['tagihan_pesan'] = $this->input->post("tagihan_pesan");
				$i++;
			}
			$res = $this->db->insert_batch("tagihan",$arrinsert);
			if($res) {
				$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Simpan Data.</div>");
			}else {
				$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Simpan Data.</div>");
			}
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Data Siswa Kosong, Tidak Berhasil Mengirimkan Tagihan.</div>");
		}
		
		redirect(base_url()."tagihanadmin");
	}
	
	public function update() {
		$id = $this->input->post('siswa_id');
		$data = array(
			"siswa_nis" => $this->input->post("siswa_nis"),
			"siswa_nama" => $this->input->post("siswa_nama"),
			"siswa_tempat_lahir" => $this->input->post("siswa_tempat_lahir"),
			"siswa_tanggal_lahir" => $this->input->post("siswa_tanggal_lahir"),
			"siswa_jenis_kelamin" => $this->input->post("siswa_jenis_kelamin"),
			"siswa_ayah" => $this->input->post("siswa_ayah"),
			"siswa_ibu" => $this->input->post("siswa_ibu"),
			"siswa_wali_telp" => $this->input->post("siswa_wali_telp"),
			"siswa_alamat" => $this->input->post("siswa_alamat"),
			"siswa_kelas_id" => $this->input->post("siswa_kelas_id")
		);
		$res = $this->Model->edit("siswa",array("siswa_id"=>$id),$data);
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Ubah Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Ubah Data.</div>");
		}
		redirect(base_url()."siswaadmin");
	}
	
	public function destroy() {
		$id = $this->uri->segment(3);
		$res = $this->Model->delete("siswa",array("siswa_id"=>$id));
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Hapus Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Hapus Data.</div>");
		}
		redirect(base_url()."siswaadmin");
	}
}
