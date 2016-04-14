<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
        $data = $this->general();

        //get remote ip
        $ip = $_SERVER['REMOTE_ADDR'];
        $ip = "189.217.206.151";
        $tmp = file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=b891067734535f410b10170ca70014d33247e483a5ceb35ce358b190d15a0573&format=json&ip=".$ip);
        $countryUser = json_decode($tmp);

        //obteniendo banner del home
        //get noticias
        $url = "http://sicksadworld.com.mx/servicios/banners.php";
        $params = array("latitud"=>$countryUser->latitude, "longitud"=>$countryUser->longitude, "estado"=>$countryUser->regionName);
        $banners = json_decode($this->consumeRest($url, $params), true);

        //get inmubles por categoria
        $url = "http://sicksadworld.com.mx/servicios/inmueblesPorCategoria.php";
        $params = array("categoria"=>1, "estado"=>$countryUser->regionName);
        $inmueblesCasas = json_decode($this->consumeRest($url, $params), true);

        $params = array("categoria"=>3, "estado"=>$countryUser->regionName);
        $inmueblesDepartamentos = json_decode($this->consumeRest($url, $params), true);

        $params = array("categoria"=>6, "estado"=>$countryUser->regionName);
        $inmueblesOficinas = json_decode($this->consumeRest($url, $params), true);

        $data["mensajeError"] = $this->session->flashdata('mensajeError');
        $data["banners"] = $banners;
        $data["inmueblesCasas"] = $inmueblesCasas;
        $data["inmueblesDepartamentos"] = $inmueblesDepartamentos;
        $data["inmueblesOficinas"] = $inmueblesOficinas;
		$this->load->view("inicio_view", $data);
	}

    /*
    function obtenerBanners() {
        //obteniendo banner del home
        //get noticias
        $url = "http://sicksadworld.com.mx/servicios/banners.php";
        $params = array();
        $banners = json_decode($this->consumeRest($url, $params), true);

        if (isset($banners)) {
            foreach($banners["inmuebles"] as $row) {
                ?>
                <div class="slideee">
                    <ul class="grid-posts unstyled">
                        <li class="post post-desarrollo  ">
                            <label class="post-action post-action-check stopPropagation"><input checked="checked" type="checkbox"></label>
                            <div class="post-thumb">
                                <a href="<?php echo base_url() ?>inicio/detalle/<?php echo $row['id_inmueble']."/".$row['tipo_inmueble'] ?>" title="<?php echo $row["descripcion"] ?>">
                                    <img src="<?php  echo base_url()?>resources/pagina/blank.png" data-real-src="<?php echo $row["img_banner"] ?>" class="foto-principal lazyDesarrollos" alt="" height="100%" width="100%">
                                </a>
                            </div>

                            <!--Tag desarrollo-->
                            <div class="post-info">
                                <h4 class="post-title"><a href="<?php echo base_url() ?>inicio/detalle/<?php echo $row['id_inmueble']."/".$row['tipo_inmueble'] ?>" title=""><?php echo $row["descripcion"] ?></a></h4>
                                <span class="post-sub-title"><i class="ticon ticon-pointer"></i>&nbsp; <?php echo $row['direccion_calle'] ?></span>
                                <ul class="post-content">
                                    <li>Tipo <b><?php echo $row['venta_renta'] ?></b></li>
                                    <li><b><?php echo $row['recamaras'] ?></b> Recamaras</li>
                                    <li><b><?php echo $row['banos'] ?></b> Baños</li>
                                    <li><b><?php echo $row['terreno_m2'] ?> metros</b> de terreno</li>
                                </ul>

                                <div class="post-price">
                                    <span class="precio-signo ">Desde</span>&nbsp;<span class="precio-valor ">$<?php echo (is_numeric($row['precio'])) ? number_format($row['precio'], 2) : $row['precio'] ?></span>
                                </div>
                            </div>
                            <div class="post-actions-wrap">
                                <div class="post-actions">
                                    <span class="post-action post-action-fav" title="Agregar a favoritos" data-action="agregarfavorito" data-aviso-id="51246025" data-loading-text="..."><span class="hide">Marcar como favorito</span></span>
                                    <span class="post-action post-action-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51246025" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                    <span class="post-action post-action-x-fav" title="Quitar de favoritos" data-action="removerfavorito" data-aviso-id="51246025" data-loading-text="..."><span class="hide">Quitar de favoritos</span></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php
                break;
            }
        }
    }
    */

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
            $data["nombreTipoInmueble"] = $this->getTipoInmueble($tipoInmueble);
            $this->load->view("detalle_view", $data);
        }
        else {
            redirect("inicio");
        }
    }

    function getTipoInmueble($tipoInmueble) {
        $tipo_inmuble = "";
        switch ($tipoInmueble) {
            case 1: $tipo_inmuble = "Casa"; break;
            case 2: $tipo_inmuble = "Terreno"; break;
            case 3: $tipo_inmuble = "Departamento"; break;
            case 4: $tipo_inmuble = "Bodega"; break;
            case 5: $tipo_inmuble = "Oficina"; break;
            case 6: $tipo_inmuble = "Local"; break;
            case 7: $tipo_inmuble = "Nave"; break;
            case 8: $tipo_inmuble = "Rancho"; break;
            case 9: $tipo_inmuble = "Otros"; break;

            default: $tipo_inmuble = "No definido"; break;
        }

        return $tipo_inmuble;
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
            $precio1 = $this->input->post("precio1");
            $precio2 = $this->input->post("precio2");
            $cp = $this->input->post("cp");
            $inmueble_id = "";
        }
        else {
            $tipoPropiedad = "";
            $ventaRenta = "";
            $precio1 = "";
            $precio2 = "";
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

        //buscar inmueble
        $url = "http://sicksadworld.com.mx/servicios/buscarInmuebles.php";
        //$url = "http://localhost/serviciosprop/buscarInmuebles.php";
        $params = array("tipo_inmueble"=>$tipoPropiedad, "venta_renta"=>$ventaRenta, "precio"=>$precio1.",".$precio2, "codigo_postal"=>$cp, 'id_inmueble'=>$inmueble_id);
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

    function searchLatlong() {
        $search = $this->input->post("search");

        $url = 'http://maps.google.com/maps/api/geocode/json?address='.urlencode($search);
        $result = file_get_contents($url);
        $info = json_decode($result);

        if (count($info->results) > 0) {
            if (count($info->results) > 1) {
                foreach ($info->results AS $result) {
                    $place[] = $result->formatted_address;
                }

                echo json_encode(array("status"=>"places", "places"=>$place));
            }
            else {
                echo json_encode(array(
                    "status"=>"finded",
                    "lat_noreste"=>$info->results[0]->geometry->bounds->northeast->lat,
                    "lon_noreste"=>$info->results[0]->geometry->bounds->northeast->lon,
                    "lat_sureste"=>$info->results[0]->geometry->bounds->southwest->lat,
                    "lon_sureste"=>$info->results[0]->geometry->bounds->southwest->lon,
                ));
            }
        }
        else {
            echo json_encode(array("status"=>"error", "message"=>"No se encontro ningun resultado"));
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
