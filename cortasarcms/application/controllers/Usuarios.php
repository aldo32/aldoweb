<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	var $sessionUser;

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->sessionUser = $this->session->userdata("usuario");

		$this->load->model("Model_usuarios", "usuarios");
	}

	public function index() {
		$data = $this->general();
		$data["alert"] = $this->session->flashdata('alert');

        //get all users actives
        $query = $this->db->get("usuarios");
        $usuarios = $query->result();
        $data["usuarios"] = $usuarios;

		$this->load->view('usuarios/usuarios_view', $data);
	}

    function nuevo() {
        $data = $this->general();
		$data["user"] = "";
        $this->load->view("usuarios/usuarios_editar_view", $data);
    }

	function editar($idUsuario) {
		$user = $this->usuarios->getUserById($idUsuario);
		if ($user) {
			$data = $this->general();
			$data["user"] = $user;

			$this->load->view("usuarios/usuarios_editar_view", $data);
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro al usuario en la base de datos"));
			redirect("usuarios");
		}
	}

	function guardar() {
		$data = $this->general();
		$idUsuario = $this->input->post("idUsuario");
		$type = $this->input->post("type");
		$user="";

		if ($idUsuario != "") $user = $this->usuarios->getUserById($idUsuario);

		$this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');
		$this->form_validation->set_rules('apellidos', '<strong>Apellidos</strong>', 'required|trim');
		$this->form_validation->set_rules('idPerfil', '<strong>Perfil</strong>', 'required|trim|valid_combo');
		if ($type == "insert") {
			$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim|matches[cpassword]');
			$this->form_validation->set_rules('cpassword', '<strong>Password</strong>', 'trim');
			$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|trim|valid_email|is_unique[usuarios.email]');
		}

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'El email no es valido');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción para el campo %s');
		$this->form_validation->set_message('matches', 'Los passwords no son iguales');
		$this->form_validation->set_message('is_unique', 'El %s ya existe en la base de datos');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
			$data["user"] = $user;

			$this->load->view("usuarios/usuarios_editar_view", $data);
		}
		else {
			$register["nombre"] = $this->input->post("nombre");
			$register["apellidos"] = $this->input->post("apellidos");
			$register["telefono"] = $this->input->post("telefono");
			$register["email"] = $this->input->post("email");
			if ($type == "insert") $register["password"] = sha1(md5($this->input->post("password")));
			$register["idPerfil"] = $this->input->post("idPerfil");
			$register["activo"] = $this->input->post("activo");

			if ($type == "insert") {
				$this->db->insert("usuarios", $register);
				$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El usuario <b>".$register['nombre']." ".$register["apellidos"]."</b> se creó correctamente"));
				redirect("usuarios");
			}
			else {
				$this->db->where("id", $user->id);
				$this->db->update("usuarios", $register);
				$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El usuario <b>".$register['nombre']." ".$register["apellidos"]."</b> se actualizó correctamente"));
				redirect("usuarios");
			}
		}
	}

	function password($idUsuario) {
		$user = $this->usuarios->getUserById($idUsuario);
		if ($user) {
			$data["user"] = $user;
			$data["message"]="";

			$this->load->view("usuarios/usuarios_password_view", $data);
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro al usuario en la base de datos"));
			redirect("usuarios");
		}
	}

	function guardarPassword() {
		$idUsuario = $this->input->post("idUsuario");
		$user = $this->usuarios->getUserById($idUsuario);

		$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', '<strong>Password</strong>', 'trim');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('matches', 'Los passwords no son iguales');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
			$data["user"] = $user;
			$data["message"]="";

			$this->load->view("usuarios/usuarios_password_view", $data);
		}
		else {
			$register["password"] = sha1(md5($this->input->post("password")));

			$this->db->where("id", $user->id);
			$this->db->update("usuarios", $register);

			$data["user"] = $user;
			$data["message"] = "El password se cambió correctamente";

			$this->load->view("usuarios/usuarios_password_view", $data);
		}
	}

	function desactivar($idUsuario, $value) {
		$user = $this->usuarios->getUserById($idUsuario);
		if ($user) {
			$register["activo"] = $value;

			$this->db->where("id", $user->id);
			$this->db->update("usuarios", $register);

			$msg = ($value == 1) ? "activó" : "desactivó";

			$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El usuario <b>".$user->nombre." ".$user->apellidos."</b> se ".$msg));
			redirect("usuarios");
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro al usuario en la base de datos"));
			redirect("usuarios");
		}
	}

	function eliminar($idUsuario) {
		$user = $this->usuarios->getUserById($idUsuario);
		if ($user) {
			$this->db->delete('usuarios', array('id' => $user->id));

			$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El usuario <b>".$user->nombre." ".$user->apellidos."</b> se eliminó correctamente"));
			redirect("usuarios");
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro al usuario en la base de datos"));
			redirect("usuarios");
		}
	}




	function general() {
		$config['usuario'] = $this->sessionUser;
		$config['page'] = "usuarios";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);
		$data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

		$data["comboPerfiles"] = $this->usuarios->getComboPerfiles();
		return $data;
	}
}
