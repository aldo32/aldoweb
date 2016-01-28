<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = $this->general();

        //get banners home
        $url = URL_CMS."RestNoticias/obtenerNoticiasBanners";
        $params = array();
        $banners = $this->consumeRest($url, $params);

        //get noticias
        $url = URL_CMS."RestNoticias/obtenerNoticias";
        $params = array();
        $noticias = $this->consumeRest($url, $params);

        $data["banners"] = json_decode($banners);
        $data["noticias"] = json_decode($noticias);
		$this->load->view("inicio/inicio_view", $data);
	}

    function consumeRest($url, $params) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    function terminos() {
        $data = $this->general();

        //get terminos
        $url = URL_CMS."RestGeneral/obtenerTerminos";
        $params = array();
        $terminos = json_decode($this->consumeRest($url, $params));


        $data["opcion"] = "terminos";
        $data["terminos"] = $terminos;
        $this->load->view("footer_view", $data);
    }

    function directorio() {
        $data = $this->general();

        //get directorio
        $url = URL_CMS."RestGeneral/obtenerDirectorio";
        $params = array();
        $directorio = json_decode($this->consumeRest($url, $params));


        $data["opcion"] = "directorio";
        $data["directorio"] = $directorio;
        $this->load->view("footer_view", $data);
    }

    function contacto() {
        $data = $this->general();
        $data["opcion"] = "contacto";
        $this->load->view("footer_view", $data);
    }

    function politicas() {
        $data = $this->general();

        //get terminos
        $url = URL_CMS."RestGeneral/obtenerPoliticas";
        $params = array();
        $politicas = json_decode($this->consumeRest($url, $params));


        $data["opcion"] = "politicas";
        $data["politicas"] = $politicas;
        $this->load->view("footer_view", $data);
    }

    function enviarContacto() {
        $this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');
        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|trim|valid_email');
        $this->form_validation->set_rules('telefono', '<strong>Teléfono</strong>', 'required|trim');
        $this->form_validation->set_rules('ciudad', '<strong>Ciudad</strong>', 'required|trim');
        $this->form_validation->set_rules('comentarios', '<strong>Comentarios</strong>', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_email', 'El email no es valido');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small><div>', '</div></small>');

            $data["opcion"] = "contacto";
            $this->load->view("footer_view", $data);
        }
        else {
            $nombre = $this->input->post("nombre");
            $email = $this->input->post("email");
            $telefono = $this->input->post("telefono");
            $ciudad = $this->input->post("ciudad");
            $comentarios = $this->input->post("comentarios");

            //get terminos
            $url = "http://www.sicksadworld.com.mx/cortazar/servicios/contactUs.php";
            $params = array("nombre"=>$nombre, "email"=>$email, "telefono"=>$telefono, "ciudad"=>$ciudad, "comentarios"=>$comentarios);
            $res = json_decode($this->consumeRest($url, $params));

            $message = "";
            if ($res->idError == 0) {
                $message="El correo se envio correctamente, pronto nos contactaremos con usted";
            }
            else {
                $message = "No se pudo enviar el correo, por favor intente más tarde";
            }

            ?>
            <style>
                #modal-wraper {
                    border-radius: 10px 10px 10px 10px;
                    -moz-border-radius: 10px 10px 10px 10px;
                    -webkit-border-radius: 10px 10px 10px 10px;
                    border: 0px solid #000000;
                    background: #fccf3a;
                    color: #fff;
                    position: relative;
                    padding: 15px;
                }
                #modal-content { padding-left: 10px; padding-right: 10px; padding-bottom: 10px; text-align: justify }
            </style>

            <div id="modal-wraper">
                <div id="modal-content">
                    <h3><?php echo $message ?></h3>
                </div>
            </div>
            <?php
        }
    }


	function general() {
		$config['page'] = "home";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);

		return $data;
	}
}
