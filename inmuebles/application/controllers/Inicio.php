<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
        $data = $this->general();

        //obteniendo banner del home
        //get noticias
        $url = "http://sicksadworld.com.mx/servicios/banners.php";
        $params = array();
        $banners = json_decode($this->consumeRest($url, $params), true);

        //get inmubles por categoria
        $url = "http://sicksadworld.com.mx/servicios/inmueblesPorCategoria.php";
        $params = array("categoria"=>1);
        $inmueblesCasas = json_decode($this->consumeRest($url, $params), true);
        //print_r($inmueblesCasas);
        //exit();

        $params = array("categoria"=>3);
        $inmueblesDepartamentos = json_decode($this->consumeRest($url, $params), true);

        $params = array("categoria"=>6);
        $inmueblesOficinas = json_decode($this->consumeRest($url, $params), true);

        $data["mensajeError"] = $this->session->flashdata('mensajeError');
        $data["banners"] = $banners;
        $data["inmueblesCasas"] = $inmueblesCasas;
        $data["inmueblesDepartamentos"] = $inmueblesDepartamentos;
        $data["inmueblesOficinas"] = $inmueblesOficinas;
		$this->load->view("inicio_view", $data);
	}

    function detalle($idInmueble = "", $tipoInmueble="") {
        $data = $this->general();

        //obtener detalle del inmueble
        $url = "http://sicksadworld.com.mx/servicios/getInmueble.php";
        $params = array("id_inmueble"=>$idInmueble, "tipo_inmueble"=>$tipoInmueble);
        $detalle = json_decode($this->consumeRest($url, $params), true);

        if ($detalle['idError'] == 0 && sizeof($detalle['detalle_inmueble']) > 1) {
            $data["detalle"] = $detalle;
            $data["idInmueble"] = $idInmueble;
            $data["tipoInmueble"] = $tipoInmueble;
            $this->load->view("detalle_view", $data);
        }
        else {
            redirect("inicio");
        }
    }

    function contacto() {
        $data = $this->general();
        $data["opcion"] = "contacto";
        $this->load->view("modal_view", $data);
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
            $this->load->view("modal_view", $data);
        }
        else {
            $nombre = $this->input->post("nombre");
            $email = $this->input->post("email");
            $telefono = $this->input->post("telefono");
            $ciudad = $this->input->post("ciudad");
            $comentarios = $this->input->post("comentarios");

            $message = '
                <style>
                #modal-wraper {
                    border-radius: 10px 10px 10px 10px;
                    -moz-border-radius: 10px 10px 10px 10px;
                    -webkit-border-radius: 10px 10px 10px 10px;
                    border: 0px solid #000000;
                    background: #64aee3;
                    color: #000;
                    position: relative;
                    padding: 15px;
                }
                #modal-content { padding-left: 10px; padding-right: 10px; padding-bottom: 10px; text-align: justify }
            </style>

            <div id="modal-wraper">
                <div id="modal-content">
                    <h3>Comentarios del cliente</h3>
                    <br><br>

                    <div><b>Nombre:</b> '.$email.'</div>
                    <div><b>Email:</b> '.$nombre.'</div>
                    <div><b>Teléfono:</b> '.$telefono.'</div>
                    <div><b>Ciudad:</b> '.$ciudad.'</div>
                    <br><br>
                    <div><b>Comentarios:</b><br> '.$comentarios.'</div>
                </div>
            </div>
            ';

            $this->generallib->sendEmail($message, $email, $email, "isc.aldo@hotmail.com", "Mensaje de posible cliente", null);

            ?>
            <style>
                #modal-wraper {
                    border-radius: 10px 10px 10px 10px;
                    -moz-border-radius: 10px 10px 10px 10px;
                    -webkit-border-radius: 10px 10px 10px 10px;
                    border: 0px solid #000000;
                    background: #64aee3;
                    color: #000;
                    position: relative;
                    padding: 15px;
                }
                #modal-content { padding-left: 10px; padding-right: 10px; padding-bottom: 10px; text-align: justify }
            </style>

            <div id="modal-wraper">
                <div id="modal-content">
                    <h4>Sus comentarios se han enviado con éxito. Gracias</h4>
                </div>
            </div>
            <?php
        }
    }

    function quienessomos() {
        $data = $this->general();
        $data["opcion"] = "quienessomos";
        $this->load->view("modal_view", $data);
    }

    function terminos() {
        $data = $this->general();
        $data["opcion"] = "terminos";
        $this->load->view("modal_view", $data);
    }

    function politicas() {
        $data = $this->general();
        $data["opcion"] = "politicas";
        $this->load->view("modal_view", $data);
    }

	function general() {
        $config['page'] = "home";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);

        return $data;
	}

	function enviarInformacionInmueble() {
	    $idInmueble = $this->input->post("idInmueble");
	    $tipoInmueble = $this->input->post("tipoInmueble");
        $mensaje = $this->input->post("mensaje");
        $nombre = $this->input->post("nombre");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");

        $inmueble = "";
        switch ($tipoInmueble) {
            case 1: $inmueble = "casas"; break;
            case 2: $inmueble = "bodegas"; break;
            case 3: $inmueble = "departamentos"; break;
            case 4: $inmueble = "locales"; break;
            case 5: $inmueble = "nave_industrial"; break;
            case 6: $inmueble = "oficinas"; break;
            case 7: $inmueble = "rancho"; break;
            case 8: $inmueble = "terrenos"; break;
        }

        $this->form_validation->set_rules('mensaje', '<strong>Mensaje</strong>', 'required|trim');
        $this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');
        $this->form_validation->set_rules('telefono', '<strong>Teléfono</strong>', 'required|trim|numeric');
        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|trim|valid_email');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('numeric', 'Campo %s solo numerico');
        $this->form_validation->set_message('valid_email', 'El email no es valido');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('', '<br>');

            echo "<p class='valError'>".validation_errors()."</p>";
        }
        else {
            $message = '
                <style>
                #modal-wraper {
                    border-radius: 10px 10px 10px 10px;
                    -moz-border-radius: 10px 10px 10px 10px;
                    -webkit-border-radius: 10px 10px 10px 10px;
                    border: 0px solid #000000;
                    background: #64aee3;
                    color: #000;
                    position: relative;
                    padding: 15px;
                }
                #modal-content { padding-left: 10px; padding-right: 10px; padding-bottom: 10px; text-align: justify }
                </style>

                <div id="modal-wraper">
                    <div id="modal-content">
                        <h3>Comentarios sobre el inmueble</h3>
                        <br>
                        <div>Tipo inmueble: '.$inmueble.' </div>
                        <div>Inmueble: '.$idInmueble.' </div>
                        <br><br>

                        <div><b>Nombre:</b> '.$nombre.'</div>
                        <div><b>Telefono:</b> '.$telefono.'</div>
                        <div><b>Email:</b> '.$email.'</div>
                        <br><br>
                        <div><b>Mensaje:</b><br> '.$mensaje.'</div>
                    </div>
                </div>
            ';

            $this->generallib->sendEmail($message, $email, $email, "isc.aldo@hotmail.com", "Mensaje de posible cliente", null);
            echo "<b>Tu mensaje se a enviado con éxito. Gracias</b>";
        }
	}

    function buscar() {
        $data = $this->general();

        if ($_POST) {
            $tipoPropiedad = $this->input->post("tipoPropiedad");
            $ventaRenta = $this->input->post("ventaRenta");
            $precio = $this->input->post("precio");
            $cp = $this->input->post("cp");
            $inmueble_id = "";
        }
        else {
            $tipoPropiedad = "";
            $ventaRenta = "";
            $precio = "";
            $cp = "";
            $inmueble_id = "";
        }

        /*
        $tipoPropiedad = "1";
        $ventaRenta = "Venta";
        $precio = "";
        $cp = "76800";
        $inmueble_id = "";
        */

        //obtener detalle del inmueble
        $url = "http://sicksadworld.com.mx/servicios/buscarInmuebles.php";
        $params = array("tipo_inmueble"=>$tipoPropiedad, "venta_renta"=>$ventaRenta, "precio"=>$precio, "codigo_postal"=>$cp, 'id_inmueble'=>$inmueble_id);
        $resultado = json_decode($this->consumeRest($url, $params), true);

        if ($resultado["idError"] != 0) {
            $this->session->set_flashdata("mensajeError", array("mensaje"=>$resultado["mensajeError"]));
            redirect("inicio");
        }
        else {
            //print_r($resultado); exit();
            $data["resultado"] = $resultado;
            $this->load->view("buscar_view", $data);
        }
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
}
