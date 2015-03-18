<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class horariosreglas extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("horariosreglas_model");
		$this->load->model("horarios_model");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["alert"] = $this->session->flashdata('alert');
				
		$data["horariosreglas"] = $this->horariosreglas_model->getAll();				
		
		$this->load->view('horariosreglas_view', $data);
	}
	
	function nuevo() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["horariosregla"]="";
		$this->load->view("horariosreglas_editar_view", $data);
	}
	
	function editar($idHorariosregla = 0) {
		$horariosregla = $this->horariosreglas_model->checkHorariosregla($idHorariosregla);
	
		if (isset($horariosregla)) {
			$data = $this->general($this->sessionData["user_data"]);
			$data["horariosregla"] = $horariosregla;
				
			$this->load->view("horariosreglas_editar_view", $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La regla de horario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
				
			redirect("horariosreglas");
		}
	}
	
	function guardarHorariosregla() {
		$type = $this->input->post("type");
		$idHorariosregla = $this->input->post("idHorariosregla");
		
		$horariosregla = ($idHorariosregla != "") ? $this->horariosreglas_model->checkHorariosregla($idHorariosregla) : "";
		
		$this->form_validation->set_rules('idHorario', '', 'required|trim|valid_combo');
		$this->form_validation->set_rules('horaInicio', '', 'required|trim');
		$this->form_validation->set_rules('horaFin', '', 'required|trim');
		$this->form_validation->set_rules('multa', '', 'required|trim');
		
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción');

		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data['horariosregla'] = $horariosregla;
				
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("horariosreglas_editar_view", $data);
		}
		else {
			$register["idHorario"] = $this->input->post("idHorario");
			$register["horaInicio"] = $this->input->post("horaInicio");
			$register["horaFin"] = $this->input->post("horaFin");
			$register["multa"] = $this->input->post("multa");
						
			if ($type == "insert") {							
				$this->db->insert("horariosreglas", $register);
					
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La regla de horario se creó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			else {
				$this->db->where('id', $idHorariosregla);
				$this->db->update('horariosreglas', $register);
			
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La regla de horario con id '.$idHorariosregla.' se modificó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			
			redirect("horariosreglas");
		}
	}
	
	function eliminar($idHorariosregla = 0) {				
		$horariosregla = $this->horariosreglas_model->checkHorariosregla($idHorariosregla);
	
		if (isset($horariosregla)) {
			$this->db->delete('horariosreglas', array('id' => $idHorariosregla));
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se elimino la regla de horario con id '.$idHorariosregla.'</div>';
			$this->session->set_flashdata('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> LA regla de horario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
		}
	
		redirect("horariosreglas");
	}
	
	function general($session) {
		$info["session"] =  $session;
			
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);		
		
		$data["horariosCombo"] = $this->horarios_model->getComboHorario();
	
		return $data;
	}
}