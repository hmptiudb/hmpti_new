<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

	public $all_divisi = '';
	public $website = '';

	public function __construct()
	{
		parent::__construct();

        $this->load->model("Model_pengunjung");
        $this->load->model("Model_detail_organisasi");
        $this->load->model('Model_event');
        $this->load->model('Model_pendaftar');

        $this->website = $this->Model_detail_organisasi->get()->row_array();
		$this->x->harus_login($this->session);

	}
	
	public function index()
	{
		$data['title'] = "Profil";
		$data['subtitle'] = "";
		
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|trim|strip_tags', [
		        'required' => '{field} tidak boleh kosong',
		        'valid_email' => '{field} tidak valid'
		    ]);
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|strip_tags', [
		        'required' => '{field} tidak boleh kosong',
		    ]);
		$this->form_validation->set_rules('no_telp', 'No. Telp', 'required|numeric|trim|strip_tags', [
		        'required' => '{field} tidak boleh kosong',
		        'numeric' => '{field} harus angka'
		    ]);
		
	   $data['pengunjung'] = $this->Model_pengunjung->get_by_email($this->session->userdata('email'))->row_array();
		
		if ($this->form_validation->run() == false) {

    		$this->load->view('member/templates/header', $data);
    		$this->load->view('member/templates/sidebar', $data);
    		$this->load->view('member/templates/navbar', $data);
    		$this->load->view('pengunjung/profile', $data);
    		$this->load->view('member/templates/footer', $data);
		} else {
		    
		  $nama = $this->input->post('nama', TRUE);
		  $email = $this->input->post('email', TRUE);
		  $no_telp = $this->input->post('no_telp', TRUE);
		  $gambar_lama = $data['pengunjung']['gambar_pengunjung'];
		  
    		  
    	   $upload = $_FILES['gambar_pengunjung']['name'];
        	if ($upload) {
    		 	$gambar = $this->upload_gambar($gambar_lama);
    		} else {
    		    $gambar = $gambar_lama;
    		}
    		
        		
		  $data = array(
                'nama' => $nama,
                'no_telp' => $no_telp,
                'gambar_pengunjung' => $gambar
            );
            
            $this->db->where('email', $email);
            $this->db->update('h_pengunjung', $data);
        		  
		  $this->db->update('h_pengunjung', [
		      'nama' => $nama,
		      'email' => $email,
		      'no_telp' => $no_telp,
		  ]);
		  
		  $this->session->set_flashdata("msg", "success#Profil berhasil diubah.");
	    redirect(base_url() . "pengunjung");
		}
	}
	
	private function upload_gambar($gambar_lama) {
	    $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = 'assets/img/profil/tmp/';
        $config['file_name'] = time();
    
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('gambar_pengunjung')){
           if ($gambar_lama != NULL && $gambar_lama != ""){
               unlink($gambar_lama);
           }
           
           // mengecilkan ukuran foto
        	$this->load->model('ResizeImage');
        	$this->ResizeImage->dir($config['upload_path'] . $this->upload->data('file_name'));
        	$this->ResizeImage->resizeTo(500, 500, 'maxwidth');
        	$this->ResizeImage->saveImage('assets/img/profil/' . $this->upload->data('file_name'));

        	$this->load->helper('file');
        	unlink( $config['upload_path'] . $this->upload->data('file_name') ); // delete temporary file
           
           $new_image = $this->upload->data('file_name');
           return 'assets/img/profil/' .$new_image;
        } else {
           $this->session->set_flashdata("msg", "error#Proses Gagal::". $this->upload->display_errors());
            redirect(base_url() . "pengunjung"); 
        }
	}
	
	public function daftar_event(){
	    $data['title'] = "Event";
		$data['subtitle'] = "Daftar Event";
		$data['event_terbaru'] = $this->Model_event->get_upcoming()->result_array();
		$data['events'] = $this->Model_event->get_lama()->result_array();
		
	    $this->load->view('member/templates/header', $data);
    	$this->load->view('member/templates/sidebar', $data);
    	$this->load->view('member/templates/navbar', $data);
    	$this->load->view('pengunjung/v_event', $data);
    	$this->load->view('member/templates/footer', $data);
    	$this->load->view('pengunjung/v_event_js', $data);
	}
	
		
	public function event_diikuti(){
	    $data['title'] = "Event";
		$data['subtitle'] = "Event Diikuti";
		$data['events'] = $this->Model_pendaftar->get_event_diikuti($this->session->userdata('email'))->result_array();
		
// 		var_dump($data['events']);
// 		die();
		
	    $this->load->view('member/templates/header', $data);
    	$this->load->view('member/templates/sidebar', $data);
    	$this->load->view('member/templates/navbar', $data);
    	$this->load->view('pengunjung/v_event_diikuti', $data);
    	$this->load->view('member/templates/footer', $data);
    	$this->load->view('pengunjung/v_event_diikuti_js', $data);
	}
	
	public function sertifikat_event(){
	    $data['title'] = "Event";
	    $data['subtitle'] = "Download sertifikat";
	   // $data['events'] =
	   
	   	$this->load->view('member/templates/header', $data);
    	$this->load->view('member/templates/sidebar', $data);
    	$this->load->view('member/templates/navbar', $data);
    	$this->load->view('pengunjung/v_sertif', $data);
    	$this->load->view('member/templates/footer', $data);
    	$this->load->view('pengunjung/v_sertif_js', $data);
	}
	
	public function listDataSertif(){
	    if ($this->input->is_ajax_request() == true) {
          $this->load->model('Model_event_pengunjung');
          $list = $this->Model_event_pengunjung->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
    
            $no++;
            $row = array();
    
            $row[] = $no;
            $row[] = date("d M Y, H:m", $field->jadwal);
            $row[] = $field->judul;
            
            $this->db->where('id_event =', $field->id_event);
            $cek_sertif_tersedia = $this->db->get('h_sertifikat')->num_rows();
            $link = base_url("p/download_sertifikat/" . $field->id_event);
            
            $row[] = $cek_sertif_tersedia === 0 ? "<span class='badge badge-danger'>Sertifikat tidak tersedia</span>": "<a href='" . $link . ".pdf' class='btn btn-sm btn-success'>Download Sertifikat</a>";
            $data[] = $row;
          }
    
          $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Model_event_pengunjung->count_all(),
            "recordsFiltered" => $this->Model_event_pengunjung->count_filtered(),
            "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
        } else {
          exit('Maaf data tidak bisa ditampilkan');
        }
	}
}