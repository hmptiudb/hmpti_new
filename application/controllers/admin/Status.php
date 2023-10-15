<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Setingan Status di page Program kerja
 */

class Status extends CI_Controller
{
	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_statusProker");


		$this->load->model("Model_divisi");
		$this->load->model("Model_detail_organisasi");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
	}

    public function index(){
		$data['title'] = 'Setting Status Proker';
        $data["main_data"] = $this->Model_statusProker->read()->result_array();
		$data['subtitle'] = $data['title'];
		// var_dump($data);
		// die();
		$this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/setting_status', $data);
		$this->load->view('member/templates/footer', $data);
		// $this->load->view('member/proker_js', $data);
    }

	public function add(){
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);

		$this->Model_statusProker->add($post);
		$this->session->set_flashdata("msg", "success#Data berhasil ditambah.");
		redirect(base_url().'admin/status');
	}

	public function edit(){
		$post = $this->input->post(NULL, true);
		foreach ($post as $name => $val) { //<-- langsung sapu semua
			$this->form_validation->set_rules($name, $name, 'trim|strip_tags');
		}
		$this->form_validation->run();
		$post = $this->input->post(NULL, true);
		// var_dump($post);
		// die();
		$this->Model_statusProker->edit( $post );
		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
		redirect(base_url().'admin/status');
	}

	public function delete($id_status)
	{
		$this->Model_statusProker->delete( $id_status );
		$this->session->set_flashdata("msg", "success#Data berhasil dihapus.");
		redirect(base_url().'admin/status');
	}
}