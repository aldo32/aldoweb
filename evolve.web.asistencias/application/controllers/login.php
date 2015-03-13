<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();
		$this->load->model("usuarios_model");			
	}
	
	public function index() {		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();
		if ($this->sessionData["user_data"] != "") { redirect("inicio"); }
		
		$this->load->view('login_view');
	}	

	function access() {
		$this->form_validation->set_rules('usuario', '<strong>Usuario</strong>', 'required|trim');
		$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim');
		
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');

		if ($this->form_validation->run()==FALSE) {						
			$this->load->view('login_view');
		}
		else {
			$user = $this->input->post("usuario");
			$password = $this->input->post("password");			
			
			$access = $this->usuarios_model->login($user, $password);
			
			if ($access) {
				$this->session->set_userdata("user_data", $access);				
				redirect("inicio");
			}
			else {
				$data['message'] = '<div style="color: white; font-weight: bold; font-size: 16px;">Usuario o contraseña incorrectos</div>';
				$this->load->view("login_view", $data);
			}
		}
	}
	
	function logout() {
		$this->session->sess_destroy();
		redirect("login");
	}
}