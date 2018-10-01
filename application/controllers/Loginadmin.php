<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginadmin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Model');
	}
	public function index()
	{
		$data = array();
		$this->load->view('admin/login');
	}
	
	public function proses() {
		$login = $this->Model->get_where("admin",array("username"=>$this->input->post('username'),"password"=>md5($this->input->post("password"))))->row();
		if(!empty($login)) {
			$this->session->set_userdata(array("username"=>$login->username,"level"=>"admin"));
			redirect(base_url()."home");
		}else {
			$this->session->set_flashdata("status","<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Gagal Login.</div>");
			redirect(base_url()."loginadmin");
		}
	}
	
	public function logout() {
		session_destroy();
		redirect(base_url()."loginadmin");
	}
}
