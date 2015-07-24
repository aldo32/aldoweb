<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();
				
		$this->load->library("general_library");					
	}
	
	public function index() {				
		$data = $this->general("");																					
		
		$this->load->view('inicio_view', $data);
	}		
	
	function general($session) {					
		$data["includes"] = $this->load->view("general/general_includes_view", '', true);
		$data["header"] = $this->load->view("general/general_header_view", '', true);						
		
		return $data;
	}
	
}
