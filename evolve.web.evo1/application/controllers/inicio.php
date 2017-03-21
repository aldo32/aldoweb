<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {
	
	public function index()
	{
		$data = $this->general();
		$this->load->view('principal_view', $data);
	}
	
	function general() {
		$data="";
		
		$data['includes'] = $this->load->view("general_includes_view", '', true);
		$data['inicio'] = $this->load->view("inicio_view", '', true);
		$data['servicios'] = $this->load->view("servicios_view", '', true);
		$data['soluciones'] = $this->load->view("soluciones_view", '', true);
		$data['proyectos'] = $this->load->view("proyectos_view", '', true);
		$data['contacto'] = $this->load->view("contacto_view", '', true);
		
		return $data;
	}
	
	function showService() {
		$id = $this->uri->segment(3);
		
		$this->load->view("servicios_info_view");
	}
}

