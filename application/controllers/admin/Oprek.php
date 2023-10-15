<?php
class Oprek extends CI_Controller {
    
        public $all_divisi = '';
    	public $website = '';
    	
    	public function __construct()
	    {
		parent::__construct();
		$this->load->model("Model_detail_organisasi");
		$this->load->model("Model_divisi");
		$this->load->model("Model_jabatan");
		$this->load->model("Model_member");
		$this->load->model("Model_oprek");
		$this->all_divisi = $this->Model_divisi->get()->result_array();
		$this->website = $this->Model_detail_organisasi->get()->row_array();

		$this->x->harus_login($this->session);
		
	    }

        public function index()
        {
            $data['title'] = "Calon HMP";
    		$data['subtitle'] = "All Data";
    		
    		$data['main_data'] = $this->Model_member->get_all_and_join()->result_array();
    		$data['jabatan'] = $this->Model_jabatan->get_all()->result_array();
    		$data['oprek'] = $this->Model_oprek->getAwal()->result_array();
    		$data['detail'] = $this->Model_detail_organisasi->get()->row_array();
    		
    
    		$this->load->view('member/templates/header', $data);
    		$this->load->view('member/templates/sidebar', $data);
    		$this->load->view('member/templates/navbar', $data);
    		$this->load->view('member/oprek/oprek', $data);
    		$this->load->view('member/templates/footer', $data);
    		$this->load->view('member/oprek/oprek_js', $data);
        }
        
        public function ambildata()
    {
        if ($this->input->is_ajax_request() == true) {

            $list = $this->mahasiswa->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {

                $no++;
                $row = array();

                // Membuat Tombol
                $tomboledit = "<button type=\"button\" class=\"btn btn-outline-info\" title=\"Edit Data\" onclick=\"edit('" . $field->nobp . "')\">
                    <i class=\"fa fa-tags\"></i>
                </button>";
                $tombolhapus = "<button type=\"button\" class=\"btn btn-outline-danger\" title=\"Hapus Data\" onclick=\"hapus('" . $field->nobp . "')\">
                    <i class=\"fa fa-trash\"></i>
                </button>";

                $row[] = "<input type=\"checkbox\" class=\"centangNobp\" value=\"$field->nobp\" name=\"nobp[]\">";
                $row[] = $no;
                // $row[] = $field->nobp;
                // $row[] = $field->nama;
                // $row[] = $field->tmplahir;
                // $row[] = $field->tgllahir;
                // $row[] = ($field->jenkel == 'L' ? 'Laki-Laki' : 'Perempuan');
                $row[] = $tomboledit . ' ' . $tombolhapus;
                $data[] = $row;
            }
            // $data['oprek'] = $this->Model_oprek->getAwal()->result_array();

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" =>$this->Model_oprek->getAwal()->result_array(),
                // "recordsFiltered" => $this->mahasiswa->count_filtered(),
                "data" => $data,
            );
            //output dalam format JSON
            echo json_encode($output);
        } else {
            exit('Maaf data tidak bisa ditampilkan');
        }
    }
        
        
        
    
    
        public function diterima()
        {
            $data['title'] = "Calon HMP";
    		$data['subtitle'] = "Diterima";
    		
    		$data['main_data'] = $this->Model_member->get_all_and_join()->result_array();
    		$data['jabatan'] = $this->Model_jabatan->get_all()->result_array();
    		$data['oprek'] = $this->Model_oprek->terima()->result_array();
    
    		$this->load->view('member/templates/header', $data);
    		$this->load->view('member/templates/sidebar', $data);
    		$this->load->view('member/templates/navbar', $data);
    		$this->load->view('member/oprek/oprekDiterima', $data);
    		$this->load->view('member/templates/footer', $data);
    		$this->load->view('member/oprek/oprek_js', $data);
        }
        
        public function ditolak()
        {
            $data['title'] = "Calon HMP";
    		$data['subtitle'] = "Ditolak";
    		
    		$data['main_data'] = $this->Model_member->get_all_and_join()->result_array();
    		$data['jabatan'] = $this->Model_jabatan->get_all()->result_array();
    		$data['oprek'] = $this->Model_oprek->tolak()->result_array();
    
    		$this->load->view('member/templates/header', $data);
    		$this->load->view('member/templates/sidebar', $data);
    		$this->load->view('member/templates/navbar', $data);
    		$this->load->view('member/oprek/oprekDitolak', $data);
    		$this->load->view('member/templates/footer', $data);
    		$this->load->view('member/oprek/oprek_js', $data);
        }
        
        
        public function myPdfPage($data){
            $url = base_url('assets/user/'.$data);
            $html = '<iframe src="'.$url.'" style="border:none; width: 100%; height: 100%"></iframe>';
            echo $html;
        }
        
        
        
         public function terimaUser(){
            if ($this->input->is_ajax_request() == true) {
                
            $id_oprek = $this->input->post('id_oprek', true);
             $data = array
                (
                'statuss' => 2 
                 );
           
          $this->Model_oprek->update_data($id_oprek,$data );
    	
        }else{
            exit('Maaf Data yang anda inputkan bukan JSON');
        }
        }
         public function tolakUser($id){
           $data = array
                (
                'statuss' => 1 
                 );
           
          $this->Model_oprek->update_data($id,$data );
    		$this->session->set_flashdata("msg", "success#Data berhasil diubah.");
    		redirect(base_url() . "admin/oprek/ditolak");
        }
        
        public function aktifdaftar(){
             $data = array
                (
                'daftar' => 1
                 );
        
           
        $this->Model_detail_organisasi->update_data(1,$data);
    	$this->session->set_flashdata("msg", "success#Pendaftarn di aktifkan");
    	redirect(base_url() . "admin/oprek");
        }
        
        public function nonaktifdaftar(){
       
             $data = array
                (
                'daftar' => 0
                 );
           
        $this->Model_detail_organisasi->update_data(1,$data );
    	$this->session->set_flashdata("msg", "success#Pendaftarn di aktifkan");
    	redirect(base_url() . "admin/oprek");
        }
        
}