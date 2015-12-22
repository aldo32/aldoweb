<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	var $usuarioSession;

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = $this->general();
		$this->load->view("inicio/inicio_view", $data);
	}


	function general() {
		$config['page'] = "home";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);

		return $data;
	}
}
