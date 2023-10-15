<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_oprek extends CI_model {

	public $table = "h_oprek";
	
	public function getAwal()
	{
	    $this->db->order_by('statuss', 'ASC');
		return $this->db->get($this->table);
	}
		public function terima()
	{
	    $this->db->where("statuss",2);
		return $this->db->get($this->table);
	}
		public function tolak()
	{
	    $this->db->where("statuss",1);
		return $this->db->get($this->table);
	}
	
	public function get_tunggal($id_divisi)
	{
		$this->db->where("id_divisi", $id_divisi);
		return $this->db->get($this->table);
	}
	
	public function id_to_divisi($id_divisi)
	{
		$this->db->where("id_divisi", $id_divisi);
		return $this->db->get($this->table)->row_array()['nama_divisi'];
	}
	
	public function edit($post)
	{
		$this->db->where("id_divisi", $post['id_divisi']);
		$this->db->update($this->table, $post);
	}
	
	public function add($data)
	{
		$this->db->insert($this->table, $data);
	}


	// Check sebelum delete
	public function check_divisi($id_divisi)
	{
		$this->db->where('id_divisi', $id_divisi);
		return $this->db->get( 'h_jabatan' )->num_rows();
	}
	
	public function delete($id_divisi)
	{
		$a = $this->check_divisi($id_divisi);
		if ( $a == 0 ) { // <-- num rows of jabatan that has THIS id_divisi
			$this->db->where('id_divisi', $id_divisi);
			$this->db->delete($this->table);
			return true;
		}
		else{
			return false;
		}
	}
	
	function update_data($id,$data){
		$this->db->where('id_oprek',$id);
		$this->db->update($this->table,$data);
	}	
}
