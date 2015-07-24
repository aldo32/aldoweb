<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grupos extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("grupos_model");
		$this->load->model("etapas_model");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["alert"] = $this->session->flashdata('alert');				
		$data["grupos"] = $this->grupos_model->getAll();				
		
		$this->load->view('grupos_view', $data);
	}
	
	function nuevo() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["grupo"]="";
		$this->load->view("grupos_editar_view", $data);
	}
	
	function editar($idGrupo = 0) {
		$grupo = $this->grupos_model->checkGrupo($idGrupo);
	
		if (isset($grupo)) {
			$data = $this->general($this->sessionData["user_data"]);
			$data["grupo"] = $grupo;
				
			$this->load->view("grupos_editar_view", $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El grupo no existe </div>';
			$this->session->set_flashdata('alert', $alert);
				
			redirect("grupos");
		}
	}
	
	function guardarGrupo() {
		$type = $this->input->post("type");
		$idGrupo = $this->input->post("idGrupo");
		
		$grupo = ($idGrupo != "") ? $this->grupos_model->checkGrupo($idGrupo) : "";
		
		$this->form_validation->set_rules('idEtapa', '', 'required|trim|valid_combo');
		$this->form_validation->set_rules('nombre', '', 'required|trim');		
		
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('valid_combo', 'Selecione una opción');

		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data['grupo'] = $grupo;
				
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("grupos_editar_view", $data);
		}
		else {
			$register["idEtapa"] = $this->input->post("idEtapa");			
			$register["nombre"] = $this->input->post("nombre");			
			
			if ($type == "insert") {							
				$this->db->insert("grupos", $register);
					
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El grupo se creó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			else {
				$this->db->where('id', $idGrupo);
				$this->db->update('grupos', $register);
			
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El grupo con id '.$idGrupo.' se modificó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			
			redirect("grupos");
		}
	}
	
	function eliminar($idGrupo = 0) {
		$grupo = $this->etapas_model->checkEtapa($idGrupo);
	
		if (isset($grupo)) {
			$this->db->delete('grupos', array('id' => $idGrupo));
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se elimino el grupo con id '.$idGrupo.'</div>';
			$this->session->set_flashdata('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> la etapa no existe </div>';
			$this->session->set_flashdata('alert', $alert);
		}
	
		redirect("grupos");
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