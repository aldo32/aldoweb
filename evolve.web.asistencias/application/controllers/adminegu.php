<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminegu extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("grupos_model");
		$this->load->model("etapas_model");
		$this->load->model("usuarios_model");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["etapas"] = $this->grupos_model->getComboEtapas();					
		
		$this->load->view('adminegu_view', $data);
	}		
	
	function general($session) {
		$info["session"] =  $session;
			
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);		
	
		return $data;
	}
}