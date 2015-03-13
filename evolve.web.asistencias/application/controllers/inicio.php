<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {
		$data = $this->general($this->sessionData["user_data"]);
		$this->load->view('inicio_view', $data);
	}
	
	function general($session) {	
		$info["session"] =  $session;
					
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);
		
		return $data;
	}
	
}