<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->session->has_userdata("usuario")) redirect("inicio");
		$data = $this->general();

		//echo sha1(md5("aldoma"));
		$this->load->view('login_view', $data);
	}

	function access() {
		$this->form_validation->set_rules('email', '<strong>email</strong>', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', '<strong>password</strong>', 'required|trim');

		$this->form_validation->set_message('required', 'Campo obligatorio');
		$this->form_validation->set_message('valid_email', 'Correo no valido');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('', '');
			echo json_encode(array("status"=>"error", "message"=>validation_errors()));
		}
		else {
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			$query = $this->db->get_where("usuarios", array("email"=>$email, "password"=>sha1(md5($password))));
			$usuario = $query->row();

			if(isset($usuario)) {
				$this->session->set_userdata("usuario", $usuario);
				//$this->session->has_userdata("usuario");
				echo json_encode(array("status"=>"success"));
			}
			else {
				echo json_encode(array("status"=>"error", "message"=>"Usuario o password incorrectos"));
			}
		}
	}

	function logout() {
		$this->session->unset_userdata('usuario');
		redirect("login");
	}

    function page404() {
        $data = $this->general();
		$this->load->view('errors/page404_view', $data);
	}

	function general() {
		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		return $data;
	}
}
?>
