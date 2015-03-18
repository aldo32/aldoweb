<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class permisos extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();	

		$this->load->model("permisos_model");
		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();			
		if ($this->sessionData["user_data"] == "") { redirect("login"); }		
	}
	
	public function index() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["alert"] = $this->session->flashdata('alert');
		
		$query = $this->db->get('permisos');
		$data["permisos"] = $query->result();				
		
		$this->load->view('permisos_view', $data);
	}
	
	function nuevo() {				
		$data = $this->general($this->sessionData["user_data"]);
		$data["permiso"]="";
		$this->load->view("permisos_editar_view", $data);
	}
	
	function editar($idPermiso = 0) {
		$permiso = $this->permisos_model->checkPermiso($idPermiso);
	
		if (isset($permiso)) {
			$data = $this->general($this->sessionData["user_data"]);
			$data["permiso"] = $permiso;
				
			$this->load->view("permisos_editar_view", $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El permiso no existe </div>';
			$this->session->set_flashdata('alert', $alert);
				
			redirect("permisos");
		}
	}
	
	function guardarPermiso() {
		$type = $this->input->post("type");
		$idPermiso = $this->input->post("idPermiso");
		
		$permiso = ($idPermiso != "") ? $this->permisos_model->checkPermiso($idPermiso) : "";
		
		$this->form_validation->set_rules('nombre', '', 'required|trim');
		$this->form_validation->set_message('required', 'Campo obligatorio');

		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data['permiso'] = $permiso;
				
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("permisos_editar_view", $data);
		}
		else {
			$register["nombre"] = $this->input->post("nombre");
			$register["color"] = $this->input->post("color");
						
			if ($type == "insert") {							
				$this->db->insert("permisos", $register);
					
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El permiso se creó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			else {
				$this->db->where('id', $idPermiso);
				$this->db->update('permisos', $register);
			
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El permiso con id '.$idPermiso.' se modificó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			
			redirect("permisos");
		}
	}
	
	function eliminar($idPermiso = 0) {				
		$permiso = $this->permisos_model->checkPermiso($idPermiso);
	
		if (isset($permiso)) {
			$this->db->delete('permisos', array('id' => $idPermiso));
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se elimino el permiso con id '.$idPermiso.'</div>';
			$this->session->set_flashdata('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El permiso no existe </div>';
			$this->session->set_flashdata('alert', $alert);
		}
	
		redirect("permisos");
	}
	
	function general($session) {
		$info["session"] =  $session;
			
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);		
	
		return $data;
	}
}