<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {
	
	public function index()
	{		
		$this->load->view('inicio_view');
	}
}
?>