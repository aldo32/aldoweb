<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	var $usuarioSession;

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->usuarioSession = $this->session->userdata("usuario");
	}

	public function index() {
		$data = $this->general();
		$this->load->view('inicio/inicio_view', $data);
	}

	function general() {
		$config['usuario'] = $this->usuarioSession;
		$config['page'] = "inicio";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);
		$data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);
		return $data;
	}

	function test() {
		echo json_encode(array("status"=>"success"));
	}
}
