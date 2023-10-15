<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_divisi");
		$this->load->model("Model_detail_organisasi");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}
	public function index()
	{
		$data['title'] = "Keanggotaan";
		$data['subtitle'] = "Divisi";
		
		$data['main_data'] = $this->Model_divisi->get()->result_array();
		
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/divisi', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/divisi_js', $data);

	}
	public function edit()
	{
	    $detail_divisi = $this->Model_divisi->get_tunggal($this->input->post('id_divisi', true))->row_array();
	    
	    $gambar_lama = $detail_divisi['logo'];
	    
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		
		$upload = $_FILES['logo']['name'];
		if ($upload) {
		    $gambar = $this->upload_gambar($gambar_lama);
		} else {
		    $gambar = $gambar_lama;
		}
		
		$post['logo'] = $gambar;


		$this->Model_divisi->edit( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url() . "admin/divisi");
	}
	
	public function add()
	{
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		
		$upload = $_FILES['logo']['name'];
		if ($upload) {
		    $gambar = $this->upload_gambar(NULL);
		} else {
		    $gambar = NULL;
		}
		
		$post['logo'] = $gambar;

		$this->Model_divisi->add( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil ditambahkan.");
		redirect(base_url() . "admin/divisi");
	}
	public function delete($id_divisi)
	{
		$delete = $this->Model_divisi->delete( $id_divisi );
		if ( $delete == true ) {
			$this->session->set_flashdata("msg", "success#Data berhasil dihapus.");
		}
		else{
			$this->session->set_flashdata("msg", "error#Data gagal dihapus, mungkin data masih dipakai.");
		}
		redirect(base_url() . "admin/divisi");
	}
	
	private function upload_gambar($gambar_lama) {
	    $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = 'assets/img/divisi/tmp/';
        $config['file_name'] = time();
    
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('logo')){
           if ($gambar_lama !== NULL && $gambar_lama !== ""){
               unlink($gambar_lama);
           }
           
           // mengecilkan ukuran foto
        	$this->load->model('ResizeImage');
        	$this->ResizeImage->dir($config['upload_path'] . $this->upload->data('file_name'));
        	$this->ResizeImage->resizeTo(500, 500, 'maxwidth');
        	$this->ResizeImage->saveImage('assets/img/divisi/' . $this->upload->data('file_name'));

        	$this->load->helper('file');
        	unlink( $config['upload_path'] . $this->upload->data('file_name') ); // delete temporary file
           
           $new_image = $this->upload->data('file_name');
           return 'assets/img/divisi/' .$new_image;
        } else {
           $this->session->set_flashdata("msg", "error#Proses Gagal::". $this->upload->display_errors());
            redirect(base_url() . "admin/divisi"); 
        }
	}

}