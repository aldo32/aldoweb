<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	var $session;

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->session = $this->session->userdata("usuario");

		$this->load->model("Model_usuarios", "usuarios");
	}

	public function index() {
		$data = $this->general();

        //get all users actives
        $query = $this->db->get("usuarios");
        $usuarios = $query->result();
        $data["usuarios"] = $usuarios;

		$this->load->view('usuarios_view', $data);
	}

    function nuevo() {
        $data = $this->general();
		$data["user"] = "";
        $this->load->view("usuarios_editar_view", $data);
    }

	function guardar() {
		$data = $this->general();
		$idUsuario = $this->input->post("idUsuario");
		$type = $this->input->post("type");
		$user="";

		if ($idUsuario != "") $user = $this->usuarios->getUserById($idUsuario);

		$this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');
		$this->form_validation->set_rules('apellidos', '<strong>Apellidos</strong>', 'required|trim');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|trim|valid_email');
		$this->form_validation->set_rules('idPerfil', '<strong>Perfil</strong>', 'required|trim|valid_combo');
		$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim|matches[cpassword]');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'El email no es valido');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción para el campo %s');
		$this->form_validation->set_message('matches', 'Los passwords no son iguales');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
			$data["user"] = $user;

			$this->load->view("usuarios_editar_view", $data);
		}
		else {
		}
	}




	function general() {
		$config['usuario'] = $this->session;
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