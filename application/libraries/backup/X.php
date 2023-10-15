<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class X {

	public function harus_login($session)
	{
	    
// 	    $ci = $this->get_instance();
		if ( empty($session->userdata('email')) ) {
			$session->set_flashdata("msg", "error#Session sudah habis. Silakan login lagi.");
			redirect( base_url() . "login" );
		}
		if ( !empty($session->userdata('guest')) ) { //<-- jika user bukan member organisasi
			// $session->set_flashdata("msg", "error#Tolong jangan macam-macam ya.");
			redirect( base_url() );
		}
		
		
        // 		Gone fandi diganti senggol bacok
    // 	if ( empty($session->userdata('level')) ) {
    // 		$session->set_flashdata("msg", "error#Session sudah habis. Silakan login lagi.");
    // 			redirect( base_url() . "login" );
    // 	}
    		
    // 	if ( !empty($session->userdata('level')) ) { //<-- cek login
    // 	    $url = $ci->uri->segment(1);
    // 	    $akses = [
    // 	        'admin' => ['admin', 'p', 'logout'],
    // 	        'pengunjung' => ['pengunjung', 'p', 'logout'],
    // 	    ];
    		
    // 		if(!in_array($url, $akses[$session->userdata('level')])){
    // 		    $session->set_flashdata("msg", "error#Tolong jangan macam-macam ya.");
    // 		    redirect(base_url("/login"));
    // 		}
    // 	}
	}
	
}
