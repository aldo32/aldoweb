<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuarios extends CI_Controller {
	
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
		if ($_SESSION["admin"] == 0) { redirect("inicio"); }
		
		$data = $this->general($this->sessionData["user_data"]);
		
		$data["alert"] = $this->session->flashdata('alert');		
		
		$data["users"] = $this->usuarios_model->getAllUsers();
		$this->load->view('usuarios_view', $data);
	}
	
	function nuevo() {
		$data = $this->general($this->sessionData["user_data"]);
		$data['usuario']="";
		
		$this->load->view("usuarios_editar_view", $data);
	}
	
	function editar($idUsuario = 0) {
		$usuario = $this->usuarios_model->checkUser($idUsuario);
		
		if (isset($usuario)) {			
			$data = $this->general($this->sessionData["user_data"]);
			$data["usuario"] = $usuario;			
			
			$this->load->view("usuarios_editar_view", $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
			
			redirect("usuarios");
		}
	}
	
	function guardarusuario() {
		$type = $this->input->post("type");
		$idUsuario = $this->input->post("idUsuario");
		
		$usuario = ($idUsuario != "") ? $this->usuarios_model->checkUser($idUsuario) : "";
		
		$this->form_validation->set_rules('nombre', '<strong>nombre</strong>', 'required|trim');
		$this->form_validation->set_rules('puesto', '<strong>nombre</strong>', 'required|trim');
		$this->form_validation->set_rules('clasificacion', '<strong>Clasificación</strong>', 'required|trim');
		$this->form_validation->set_rules('sexo', '<strong>Sexo</strong>', 'required|trim');
		$this->form_validation->set_rules('complexion', '<strong>Complexión</strong>', 'required|trim');
		$this->form_validation->set_rules('idHorario', '<strong>Horario</strong>', 'valid_combo|trim');
		$this->form_validation->set_rules('activo', '<strong>Activo</strong>', 'required|trim');
		$this->form_validation->set_rules('admin', '<strong>admin</strong>', 'required|trim');
		if ($type == "insert") {			
			$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim|matches[cpassword]');
			$this->form_validation->set_rules('cpassword', '<strong>Password</strong>', 'required');
			$this->form_validation->set_rules('usuario', '<strong>Usuario</strong>', 'required|trim|valid_user|is_unique[usuarios.usuario]');
		}		
		
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('numeric', 'Campo numerico');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción');
		$this->form_validation->set_message('matches', 'El password no es igual');
		$this->form_validation->set_message('valid_user', 'Nombre de usuario no valido');
		$this->form_validation->set_message('is_unique', 'El usuiario ya existe');
		
		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data['usuario'] = $usuario;
			
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("usuarios_editar_view", $data);			
		}
		else {
			$register["nombre"] = $this->input->post("nombre");
			$register["puesto"] = $this->input->post("puesto");
			$register["clasificacion"] = $this->input->post("clasificacion");
			$register["sexo"] = $this->input->post("sexo");
			$register["complexion"] = $this->input->post("complexion");
			$register["idHorario"] = $this->input->post("idHorario");
			$register["activo"] = $this->input->post("admin");
			$register["admin"] = $this->input->post("admin");						
			
			if ($type == "insert") {
				$register["password"] = $this->input->post("password");
				$register["usuario"] = $this->input->post("usuario");
				
				$this->db->insert("usuarios", $register);
					
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario se creó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
			else {
				$this->db->where('id', $idUsuario);
				$this->db->update('usuarios', $register);
				
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario con id '.$idUsuario.' se modificó correctamemte </div>';
				$this->session->set_flashdata('alert', $alert);
			}
												
			redirect("usuarios");
		}
	}
	
	function cambiarPassword($idUsuario = 0) {
		$usuario = $this->usuarios_model->checkUser($idUsuario);
		
		if (isset($usuario)) {
			$data = $this->general($this->sessionData["user_data"]);
			$data["usuario"] = $usuario;
				
			$this->load->view("usuarios_password_view", $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
				
			redirect("usuarios");
		}
	}
	
	function guardarPassword() {
		$idUsuario = $this->input->post("idUsuario");
		
		$usuario = $this->usuarios_model->checkUser($idUsuario);
				
		$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', '<strong>Password</strong>', 'required');
		
		if ($usuario->usuario != $this->input->post('usuario')) 
			$this->form_validation->set_rules('usuario', '<strong>Usuario</strong>', 'required|trim|valid_user|is_unique[usuarios.usuario]');
				
		$this->form_validation->set_message('required', 'El campo obligatorio');
		$this->form_validation->set_message('matches', 'Los passwords no son iguales');
		$this->form_validation->set_message('valid_user', 'Nombre de usuario no valido');
		$this->form_validation->set_message('is_unique', 'Este usuario ya existe');
		
		if ($this->form_validation->run()==FALSE) {
			$data = $this->general($this->sessionData["user_data"]);
			$data['usuario'] = $usuario;
				
			$this->form_validation->set_error_delimiters('', '');
			$this->load->view("usuarios_password_view", $data);
		}
		else {
			
			if ($usuario->usuario != $this->input->post('usuario')) 
				$register["usuario"]=$this->input->post('usuario');
			
			$register["password"]=$this->input->post('password');
			
			$this->db->where('id', $idUsuario);
			$this->db->update('usuarios', $register);
			
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se cambió el password del usuario con id '.$idUsuario.'</div>';
			$this->session->set_flashdata('alert', $alert);
			
			redirect("usuarios");
		}
	}
	
	function eliminar($idUsuario = 0) {
		$usuario = $this->usuarios_model->checkUser($idUsuario);
		
		if (isset($usuario)) {
			$this->db->delete('usuarios', array('id' => $idUsuario));
			
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se elimino el usuario con id '.$idUsuario.'</div>';
			$this->session->set_flashdata('alert', $alert);							
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario no existe </div>';
			$this->session->set_flashdata('alert', $alert);					
		}
		
		redirect("usuarios");
	}
	
	function agregarPermiso($idUsuario) {		
		$data = $this->general($this->sessionData["user_data"]);		
		$data["alert"] = $this->session->flashdata('alert');
		
		$usuario = $this->usuarios_model->checkUser($idUsuario);			
		
		if (isset($usuario)) {
			$data["usuario"] = $usuario;
			$data["permisosUsuario"] = $this->usuarios_model->getPermisionsUser($idUsuario);
			$this->load->view('usuarios_permisos_view', $data);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
			
			redirect("usuarios");
		}				
	}
	
	function guardarPermiso() {
		$idUsuario = $this->input->post("idUsuario");
		
		$this->form_validation->set_rules('idPermiso', '', 'valid_combo|trim');
		$this->form_validation->set_rules('fecha', '', 'required|trim');
		
		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción');
		
		$data = $this->general($this->sessionData["user_data"]);
		$data["usuario"] = $this->usuarios_model->checkUser($idUsuario);
		$data["permisosUsuario"] = $this->usuarios_model->getPermisionsUser($idUsuario);
		
		if ($this->form_validation->run()==FALSE) {						
			$this->form_validation->set_error_delimiters('', '');			
		}
		else {
			$register["idPermiso"] = $this->input->post("idPermiso");
			$register["idUsuario"] = $idUsuario;
			$register["fecha"] = $this->input->post("fecha");
			
			$this->db->insert("permisosusuarios", $register);
			
			redirect("usuarios/agregarPermiso/".$idUsuario);
		}
		
		$this->load->view('usuarios_permisos_view', $data);		
	}
	
	function eliminarPermiso($id=0) {
		$permisoUsuario = $this->usuarios_model->checkPermisoUsuario($id);
		
		if (isset($permisoUsuario)) {					
			$this->db->delete('permisosusuarios', array('id' => $id));
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se elimino el permiso con id '.$id.'</div>';
			$this->session->set_flashdata('alert', $alert);
						
			redirect("usuarios/agregarPermiso/".$permisoUsuario->idUsuario);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El permiso del usuario no existe </div>';
			$this->session->set_flashdata('alert', $alert);
			
			redirect("usuarios");
		}				
	}
	
	function general($session) {	
		$info["session"] =  $session;
					
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);
		
		$data["horarios"] = $this->horarios_model->getComboHorario();
		$data["comboPermisos"] = $this->usuarios_model->getComboPermisos();
		
		return $data;
	}
	
}