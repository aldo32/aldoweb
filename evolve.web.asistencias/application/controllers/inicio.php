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
	
	//Type 0: only current day		1: All data
	function loadDataAssists($type=0) {
		if ($type == 1) {
			/*delete all registers form table llegadas*/
			$this->db->truncate("llegadas");
			
			/* get all registers from entradas */
			$query = $this->db->get('entrada');
			$entradas = $query->result();
		}
		else {
			/*get registers from entradas only current Day*/
			$entradas = $this->usuarios_model->genEntradasByCurrentDay();
		}
		
		
		if (isset($entradas)) {
			foreach ($entradas AS $entrada) {
				/*get info from user*/
				$usuario = $this->usuarios_model->checkUser($entrada->No);
				/*get info from horario*/
				$horario = $this->horarios_model->checkHorario($usuario->idHorario);						

				/*get hour of checkin*/
				$tmp = explode(" ", $horario->nombre);				
				$tmp = strtotime($tmp[1]);
				$horaEntrada = date("H:i:s", $tmp); 
				
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
					$time = date("H:i:s", $time);
					$register["hrLlegada"] = $time;
					
					/*check if the user have a permission*/					
					$permisoUsuario = $this->usuarios_model->getPermissionByIdUsuario($geu->idUsuario);
					if (isset($permisoUsuario->id)) { $register["permiso"] = $permisoUsuario->id; } else { $register["permiso"]=0; }													
														
					/*Calculating the fin, this, if the user not have permission*/
					if ($register["permiso"] == 0) {
						/*get value of fin in the table horariosreglas*/																	
						$regla = $this->usuarios_model->getHorarioRegla($register["idHorario"], $register["hrLlegada"]);
						
						/*get minutes of the rest*/
						$time1 = new DateTime($horaEntrada);
						$time2 = new DateTime($register["hrLlegada"]);
						$res = date_diff($time2, $time1);
						$register["diferenciaMin"] = ($res->invert == 1) ? $res->h.":".$res->i.":".$res->s : 0;
						$register["multa"] = ($res->h > 0) ? ((($res->h*60)+$res->i) * $regla->multa) : ($res->i * $regla->multa);																		 
					}
					
					/*Calculating time acomulated from all stage*/
					$register["acumuladoTiempo"]="00:00:00";
					
					$this->db->insert("llegadas", $register);
				}			
								
			}
			
			echo "Listo";
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