<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class horarios extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("horarios_model");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["alert"] = $this->session->flashdata('alert');
		
		$query = $this->db->get('horarios');
		$data["horarios"] = $query->result();				
		
		$this->load->view('horarios_view', $data);
	}
	
	function nuevo() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["horario"]="";
		$this->load->view("horarios_editar_view", $data);
	}
	
	function editar($idHorario = 0) {
		$horario = $this->horarios_model->checkHorario($idHorario);
	
		if (isset($horario)) {
			$data = $this->general($this->sessionData["user_data"]);
			$data["horario"] = $horario;
				
			$this->load->view("horarios_editar_view", $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El horario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
				
			redirect("horarios");
		}
	}
	
	function guardarHorario() {
		$type = $this->input->post("type");
		$idHorario = $this->input->post("idHorario");
		
		$horario = ($idHorario != "") ? $this->horarios_model->checkHorario($idHorario) : "";
		
		$this->form_validation->set_rules('nombre', '', 'required|trim');
		$this->form_validation->set_message('required', 'Campo obligatorio');

		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data['horario'] = $horario;
				
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("horarios_editar_view", $data);
		}
		else {
			$register["nombre"] = $this->input->post("nombre");
						
			if ($type == "insert") {							
				$this->db->insert("horarios", $register);
					
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El horario se creó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			else {
				$this->db->where('id', $idHorario);
				$this->db->update('horarios', $register);
			
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El horario con id '.$idHorario.' se modificó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			
			redirect("horarios");
		}
	}
	
	function eliminar($idHorario = 0) {
		//Antes de eliminar un horario verificar las tablas usuarios, llegadas, horariosreglas
		$usuario = $this->horarios_model->verifyUsersInHorario($idHorario);
		if (!$usuario) {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> No se puede eliminar el horario, aun existen usuarios ligados a este  </div>';
			$this->session->set_flashdata('alert', $alert);
			redirect("horarios");
		}
		
		$llegadas = $this->horarios_model->verifyLlegadasInHorario($idHorario);
		if (!$llegadas) {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> No se puede eliminar el horario, Hay registros de llegadas ligados a este.  </div>';
			$this->session->set_flashdata('alert', $alert);
			redirect("horarios");
		}
		
		$horariosreglas = $this->horarios_model->verifyReglasInHorario($idHorario);
		if (!$horariosreglas) {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> No se puede eliminar el horario, Hay registros en las reglas de horarios ligados a este.  </div>';
			$this->session->set_flashdata('alert', $alert);
			redirect("horarios");
		}
		
		$horario = $this->horarios_model->checkHorario($idHorario);
	
		if (isset($horario)) {
			$this->db->delete('horarios', array('id' => $idHorario));
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se elimino el horario con id '.$idHorario.'</div>';
			$this->session->set_flashdata('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El horario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
		}
	
		redirect("horarios");
	}
	
	function general($session) {
		$info["session"] =  $session;
			
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);		
	
		return $data;
	}
}