<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
        $data = $this->general();
		$this->load->view("inicio_view", $data);
	}

    function buscar() {
        $data = $this->general();
        $this->load->view("buscar_view", $data);
    }

    function detalle() {
        $data = $this->general();
        $this->load->view("detalle_view", $data);
    }

	function general() {
        $config['page'] = "home";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);

        return $data;
	}
}
