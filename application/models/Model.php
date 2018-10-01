<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	public function get($table) {
		return $this->db->get($table);
	}
	
	public function get_where($table,$where) {
		return $this->db->get_where($table,$where);
	}
	
	public function manual($sql) {
		return $this->db->query($sql);
	}
	
	public function save($table,$data) {
		return $this->db->insert($table,$data);
	}
	
	public function edit($table,$id,$data) {
		$this->db->where($id);
		return $this->db->update($table,$data);
	}
	
	public function delete($table,$id) {
		$this->db->where($id);
		return $this->db->delete($table);
	}
}
