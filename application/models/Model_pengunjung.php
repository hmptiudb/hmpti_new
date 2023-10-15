<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengunjung extends CI_model {

	public $table = "h_pengunjung";
	
	public function get_all()
	{
		$this->db->from($this->table);
		$this->db->order_by("nim", "ASC");
		return $this->db->get();
	}
	public function get_by_email($email)
	{
		$this->db->where('email', $email);
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->where("nim", $post['nim']);
		$this->db->update($this->table, $post);
	}
	public function add($post)
	{
		$this->db->insert($this->table, $post);
	}
	public function check_pengunjung($email)
	{
		$this->db->where('email', $email);
		return $this->db->get($this->table)->row_array();
	}
}
