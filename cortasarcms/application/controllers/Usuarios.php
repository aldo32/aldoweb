<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	var $session;

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->session = $this->session->userdata("usuario");
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
        $this->load->view("usuarios_editar_view", $data);
    }

	function general() {
		$config['usuario'] = $this->session;
		$config['page'] = "usuarios";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);
		$data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);
		return $data;
	}
}
