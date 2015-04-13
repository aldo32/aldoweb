<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reportes extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("grupos_model");
		$this->load->model("etapas_model");
		$this->load->model("usuarios_model");
		$this->load->library("general_library");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {						
		$usuario = $this->sessionData["user_data"];
		$data = $this->general($usuario);	
		$data["usuario"] = $usuario;																		
				
		$llegadas = $this->usuarios_model->getLlegadasAll();
		$data["llegadas"] = $llegadas;						
		
		$this->load->view('reportes_view', $data);
	}
	
	function unico() {
		
	}
	
	function exportar($type="todos") {
		if ($type == "todos") {
			$llegadas = $this->usuarios_model->getLlegadasAll();
			$data["llegadas"] = $llegadas;
			$data["type"] = $type;
			$data["filename"] = "EntradasEvosTodos_".date("Y-m-d");
		}		
		else {
			//by user
		}
		
		$this->load->view("reportes_export_view", $data);
	}
	
	function general($session) {
		$info["session"] =  $session;
			
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);
	
		$data["etapas"] = $this->grupos_model->getComboEtapas();
	
		return $data;
	}
}