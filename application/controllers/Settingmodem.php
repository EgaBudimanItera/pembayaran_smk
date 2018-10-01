<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'libraries/php_serial.class.php');

class Settingmodem extends CI_Controller {

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
			"content" => "admin/modem",
			"list"	  => $this->Model->get("modem")->result()
		);
		$this->load->view('admin/wrapper',$data);
	}
	
	public function koneksi() {
		
		$modem = $this->Model->get('modem')->row();
		
		$serial = new phpSerial;
		$serial->deviceSet($modem->modem_set);
		$serial->confBaudRate($modem->modem_baudrate);
		$open = $serial->deviceOpen();
		if($open) {
			$serial->deviceClose();
			echo "Koneksi Berhasil";
		}else {
			$serial->deviceClose();
			echo "Koneksi Gagal";
		}
		//sleep(7);
		//$read=$serial->readPort();
		//$serial->deviceClose();
	}
	
	public function update() {
		$data = array(
			"modem_set" => $this->input->post("modem_set"),
			"modem_baudrate" => $this->input->post("modem_baudrate")
		);
		$res = $this->db->update("modem",$data);
		if($res) {
			$this->session->set_flashdata("status","<div class='alert alert-info alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Berhasil Ubah Data.</div>");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Ubah Data.</div>");
		}
		redirect(base_url()."settingmodem");
	}
	
}
