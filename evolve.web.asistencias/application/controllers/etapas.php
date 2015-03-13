<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class etapas extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("etapas_model");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["alert"] = $this->session->flashdata('alert');
		
		$query = $this->db->get('etapas');
		$data["etapas"] = $query->result();				
		
		$this->load->view('etapas_view', $data);
	}
	
	function nuevo() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["etapa"]="";
		$this->load->view("etapas_editar_view", $data);
	}
	
	function editar($idEtapa = 0) {
		$etapa = $this->etapas_model->checkEtapa($idEtapa);
	
		if (isset($etapa)) {
			$data = $this->general($this->sessionData["user_data"]);
			$data["etapa"] = $etapa;
				
			$this->load->view("etapas_editar_view", $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La etapa no existe </div>';
			$this->session->set_flashdata('alert', $alert);
				
			redirect("etapas");
		}
	}
	
	function guardarEtapa() {
		$type = $this->input->post("type");
		$idEtapa = $this->input->post("idEtapa");
		
		$etapa = ($idEtapa != "") ? $this->etapas_model->checkEtapa($idEtapa) : "";
		
		$this->form_validation->set_rules('fechaInicio', '', 'required|trim');
		$this->form_validation->set_rules('fechaFin', '', 'required|trim');
		$this->form_validation->set_rules('nombre', '', 'required|trim');
		$this->form_validation->set_rules('premio', '', 'required|trim');
		
		$this->form_validation->set_message('required', 'Campo obligatorio');

		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data['etapa'] = $etapa;
				
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("etapas_editar_view", $data);
		}
		else {
			$register["fechaInicio"] = $this->input->post("fechaInicio");
			$register["fechaFin"] = $this->input->post("fechaFin");
			$register["nombre"] = $this->input->post("nombre");
			$register["premio"] = $this->input->post("premio");
			
			if ($type == "insert") {							
				$this->db->insert("etapas", $register);
					
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La etapa se creó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			else {
				$this->db->where('id', $idEtapa);
				$this->db->update('etapas', $register);
			
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La etapa con id '.$idUsuario.' se modificó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			
			redirect("etapas");
		}
	}
	
	function eliminar($idEtapa = 0) {
		$etapa = $this->etapas_model->checkEtapa($idEtapa);
	
		if (isset($etapa)) {
			$this->db->delete('etapas', array('id' => $idEtapa));
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se elimino la etapa con id '.$idEtapa.'</div>';
			$this->session->set_flashdata('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> la etapa no existe </div>';
			$this->session->set_flashdata('alert', $alert);
		}
	
		redirect("etapas");
	}
	
	function general($session) {
		$info["session"] =  $session;
			
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);		
	
		return $data;
	}
}