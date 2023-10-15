<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_statusProker extends CI_model {

	public $table = "h_statusproker";
	public function read()
	{
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where('id_status', $post['id_status']);
		$this->db->update($this->table, $post);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
	public function delete($id_status)
	{
		$this->db->where('id_status', $id_status);
		$this->db->delete($this->table);
	}
	
	public function find($id_status){
		$this->db->where('id_status', $id_status);
		return $this->db->get($this->table);
	}
}