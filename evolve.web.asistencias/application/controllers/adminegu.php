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
		$data["option"] = 0;					
		
		$this->load->view('adminegu_view', $data);
	}	

	function egu() {
		$this->form_validation->set_rules('idEtapa', '', 'required|trim|valid_combo');
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción');
		
		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data["option"] = 0;
		
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("adminegu_view", $data);
		}
		else {
			$data = $this->general($this->sessionData["user_data"]);
			$data["option"] = 1;			
			
			$idEtapa = $this->input->post("idEtapa");
			$tmp = $this->getData($idEtapa);			

			$data = array_merge($data, $tmp);
			
			$this->load->view("adminegu_view", $data);
		}				
	}
	
	function getData($idEtapa) {
		$this->db->order_by("nombre", "asc");
		$query = $this->db->get("usuarios");		
		$usuarios = $query->result();
		$grupos = $this->grupos_model->getComboGruposByIdEtapa($idEtapa);
			
		reset($grupos);
		$idGrupo = key($grupos);
			
		$usuariosPorGrupo = $this->usuarios_model->usuariosPorGrupo($idGrupo, $idEtapa);

		$query = $this->db->get_where("etapas", array("id"=>$idEtapa));
		$etapa = $query->row();				
		
		$data["etapa"] = $etapa;
		$data["usuarios"] = $usuarios;
		$data["grupos"] = $grupos;
		$data["usuariosPorGrupo"] = $usuariosPorGrupo;
		
		return $data;
	}
	
	function showUsersByGroup() {
		$idGrupo = $this->input->post("idGrupo");
		$idEtapa = $this->input->post("idEtapa");
		$usuariosPorGrupo = $this->usuarios_model->usuariosPorGrupo($idGrupo, $idEtapa);
		
		?>
		<select style="width: 250px; height: 280px;" class="form-control" id="usuarios" multiple >
        	<?php 
            if (isset($usuariosPorGrupo)) {
            	foreach ($usuariosPorGrupo AS $row) {
            		?>
            		<option value="<?php echo $row->idUsuario?>"><?php echo $row->nombreUsuario?></option>
            		<?php
            	}							            						
            }
            else { echo "<option value='-1'>No hay grupos</option>"; }
            ?>
        </select>
		<?php 
	}
	
	function addUsersToGroupStage() {
		$idGrupo = $this->input->post("idGrupo");
		$idEtapa = $this->input->post("idEtapa");
		$usuarios = $this->input->post("usuarios");
		$usuarios = explode(",", $usuarios);
		$errors = array();
		
		for ($i=0; $i<sizeof($usuarios); $i++) {
			/*check if the user is in the table*/
			$res = $this->usuarios_model->chekUserInGruposEtapasUsuarios($idEtapa, $idGrupo, $usuarios[$i]);
		}
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