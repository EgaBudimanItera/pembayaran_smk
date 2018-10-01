<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->level!='admin') {
			redirect(base_url());
		}
	}
	public function index()
	{
		$data = array(
			"content" => "admin/home"
		);
		
		$this->load->view('admin/wrapper',$data);		
	}
	
	public function proses() {
		
	}
}
