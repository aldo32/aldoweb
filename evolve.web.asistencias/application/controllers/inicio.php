<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();
		
		$this->load->model("usuarios_model");
		$this->load->model("horarios_model");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {
		$data = $this->general($this->sessionData["user_data"]);
		$this->load->view('inicio_view', $data);
	}
	
	function loadDataAssists() {
		/* get all registers from entradas */
		$query = $this->db->get('entrada');
		$entradas = $query->result(); 
		
		if (isset($entradas)) {
			foreach ($entradas AS $entrada) {
				/*get info from user*/
				$usuario = $this->usuarios_model->checkUser($entrada->No);
				/*get info from horario*/
				$horario = $this->horarios_model->checkHorario($usuario->idHorario);				
				
				/*get stages and groups which the user belong */						
				$query = $this->db->get_where("gruposetapasusuarios", array('idUsuario'=>$entrada->No));
				$geus = $query->result();
				
				foreach ($geus AS $geu) {
					$register["idEtapa"] = $geu->idEtapa;
					$register["idGrupo"] = $geu->idGrupo;
					$register["idUsuario"] = $geu->idUsuario;
					$register["idHorario"] = $horario->id;
					
					/*get time from datetime*/
					$time = strtotime($entrada->Time);
					$time = date("H:i", $time);
					$register["hrLleagada"] = $time;
				}			
								
			}
		}
		else {
			echo "No hay entradas";
		}
	}
	
	function general($session) {	
		$info["session"] =  $session;
					
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);
		
		return $data;
	}
	
}