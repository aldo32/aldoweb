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
			$password ="cortasar".rand(1000, 9000);
			$newPassword = sha1(md5($password));

			$this->db->where('email', $email);
			$this->db->update('usuarios', array("password"=>$newPassword));

			$message = "<b>CORTASAR CMS</b><br><br>Usuario: $email<br><br>Su nueva contraseña es: $password<br><br>Cualquier duda acerca de su cuanta contacte al administrador.";

			$config['protocol']    = 'smtp';
	        $config['smtp_host']    = 'ssl://smtp.gmail.com';
	        $config['smtp_port']    = '465';
	        $config['smtp_timeout'] = '7';
	        $config['smtp_user']    = 'isc.aldo@gmail.com';
	        $config['smtp_pass']    = 'aldoma32';
	        $config['charset']    = 'utf-8';
	        $config['newline']    = "\r\n";
	        $config['mailtype'] = 'html'; // or html
	        $config['validation'] = TRUE; // bool whether to validate email or

			$this->load->library('email', $config);

			$this->email->from('isc.aldo@gmail.com', 'Administrador Cortasar CMS');
			$this->email->to($email);

			$this->email->subject('Restaurar password, Cortasar CMS');
			$this->email->message($message);

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
