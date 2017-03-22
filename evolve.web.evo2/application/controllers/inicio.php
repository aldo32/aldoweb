<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {
	
	public function index()
	{
		$this->load->view('inicio_view');
	}
	
	function desarrollo() {
		$this->load->view("desarrollo_view");
	}
	
	function emetrix() {
		$this->load->view("emetrix_view");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */