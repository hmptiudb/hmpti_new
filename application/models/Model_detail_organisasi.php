<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detail_organisasi extends CI_model {

	public $table = 'h_detail_organisasi';
	
	public function get()
	{
		return $this->db->get($this->table);
	}
	public function edit($post)
	{
		$this->db->update($this->table, $post);
	}
	
	function update_data($id,$data){
		$this->db->where('id', $id);
		$this->db->update($this->table,$data);
	}
	
}
