<?php
class Lpj extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library([
        //     'form_validation',

        // ]);
        // $this->load->helper('url');
        // $this->load->model('Modelmahasiswa', 'mahasiswa');
        	$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_divisi");
		$this->load->model("Model_jabatan");
		$this->load->model("Model_member");
		$this->load->model("Model_oprek");
// 		$data['oprek'] = $this->Model_oprek->getAwal()->result_array();
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();
        $this->x->harus_login($this->session);
    }
    public function index()
    {
     
        $this->load->view('member/templates/header', $data);
		$this->load->view('member/templates/sidebar', $data);
		$this->load->view('member/templates/navbar', $data);
		$this->load->view('member/lpj/v_lpj', $data);
		$this->load->view('member/templates/footer', $data);
		$this->load->view('member/anggota_js', $data);
    }
    
    
        public function ambildata()
    {
        if ($this->input->is_ajax_request() == true) {
            
        
        $data = $this->Model_oprek->getAwal()->result_array();
        
       
            
        echo json_encode($data);
            
           
        }else{
            exit('Salah Harus Pake Ajax');
        }
               
       
        
    }
    
    
}