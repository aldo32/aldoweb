<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Model_usuarios", "usuarios");
	}

	public function index() {
		if ($this->session->has_userdata("usuario")) redirect("inicio");
		$data = $this->general();

		//echo sha1(md5("aldoma"));
		$this->load->view('login/login_view', $data);
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

			$usuario = $this->usuarios->login($email, sha1(md5($password)));

			if(!empty($usuario)) {
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

	function restorePassword() {
		$email = $this->input->post("email");

		$this->form_validation->set_rules('email', '<strong>email</strong>', 'required|trim|valid_email');
		$this->form_validation->set_message('valid_email', 'Correo no valido');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('', '');
			echo validation_errors();
		}
		else {
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'isc.aldo@gmail.com',
			    'smtp_pass' => 'aldoma32',
			    'mailtype'  => 'html',
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);

			$this->email->from('isc.aldo@gmail.com', 'Administrador Cortasar CMS');
			$this->email->to($email);

			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');

			$this->email->send();
			$this->email->print_debugger();

			echo "Se envio tu nueva contraseña a tu correo.";
		}
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
