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
			
		if (isset($grupos)) {		
			reset($grupos);
			$idGrupo = key($grupos);
			
			$usuariosPorGrupo = $this->usuarios_model->usuariosPorGrupo($idGrupo, $idEtapa);
		}
		else {
			$grupos = array("-1"=>"Na hay grupos para esta etapa");
			$usuariosPorGrupo=null;
		}
			

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
		<select style="width: 250px; height: 280px;" class="form-control" id="usuariosGrupo" multiple >
        	<?php 
            if (isset($usuariosPorGrupo)) {
            	foreach ($usuariosPorGrupo AS $row) {
            		?>
            		<option value="<?php echo $row->idUsuario?>"><?php echo $row->nombreUsuario?></option>
            		<?php
            	}							            						
            }
            else { echo "<option value='-1'>No hay usuarios</option>"; }
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
			
			if (!$res) {
				$register["idEtapa"] = $idEtapa;
				$register["idGrupo"] = $idGrupo;
				$register["idUsuario"] = $usuarios[$i];
				
				$this->db->insert("gruposetapasusuarios", $register);
			}
			else {
				$name=$res->nombreUsuario;								
				array_push($errors, $name); 
			}						
		}
		
		if (sizeof($errors) > 0) {
			$alert1='<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario <strong>';
			$alert2=' </strong> ya existe en esta etapa y grupo </div>';
			$tmp="";
			
			for ($i=0; $i<sizeof($errors); $i++) {
				$tmp=$tmp.$errors[$i].", ";
			}
			
			$errors=$alert1." ".$tmp." ".$alert2;
		}
		else { $errors == ""; }
		
		/*Send registers in json for create the select with the new registers and send errors too*/
		$usuariosPorGrupo = $this->usuarios_model->usuariosPorGrupo($idGrupo, $idEtapa);	

		if (!isset($usuariosPorGrupo)) {
			$usuariosPorGrupo = array(array("idUsuario"=>"-1", "nombreUsuario"=>"No hay usuarios"));
		}
		
		echo json_encode(array("registers"=>$usuariosPorGrupo, "errors"=>$errors));		
	}
	
	function deleteUsersOfGroupStage() {
		$idGrupo = $this->input->post("idGrupo");
		$idEtapa = $this->input->post("idEtapa");
		$usuariosGrupo = $this->input->post("usuariosGrupo");
		$usuariosGrupo = explode(",", $usuariosGrupo);
		
		for ($i=0; $i<sizeof($usuariosGrupo); $i++) {
			$this->db->delete('gruposetapasusuarios', array('idEtapa' => $idEtapa, "idGrupo"=>$idGrupo, "idUsuario"=>$usuariosGrupo[$i]));
		}
		
		$usuariosPorGrupo = $this->usuarios_model->usuariosPorGrupo($idGrupo, $idEtapa);
		
		if (!isset($usuariosPorGrupo)) {
			$usuariosPorGrupo = array(array("idUsuario"=>"-1", "nombreUsuario"=>"No hay usuarios"));
		} 
		
		echo json_encode(array("registers"=>$usuariosPorGrupo, "errors"=>""));
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