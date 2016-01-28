<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tramites extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->general();

        //get combo tramites categoria
        $url = URL_CMS."RestTramites/comboTramites";
        $params = array();
        $comboTramites = $this->consumeRest($url, $params);

        $data["comboTramites"] = json_decode($comboTramites, true);
        $data["alert"] = $this->session->flashdata('alert');

        $this->load->view("tramites_view", $data);
    }

    function getTramite() {
        $idTramite = $this->input->post("idTramite");

        //get tramite
        $url = URL_CMS."RestTramites/getTramiteById";
        $params = array("idTramite"=>$idTramite);
        $res = $this->consumeRest($url, $params);

        $tramite = json_decode($res);
        ?>
        <h2><?php echo $tramite->nombre ?></h2>
        <br>
        <div><?php echo nl2br($tramite->descripcion) ?></div><br>
        <div>Seleccione la ubicación del terreno y precione el boton siguiente para continuar con el tramite</div>
        <br>
        <button class="btn btn-default" type="button" id="nextTramite">Siguiente</button>
        <?php
    }

    function tramitesDocumentos($idTramiteGet="", $latGet="", $lngGet="") {
        $data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');

        $lat = ($this->input->post("lat") == "") ? $latGet : $this->input->post("lat");
        $lng = ($this->input->post("lng") == "") ? $lngGet : $this->input->post("lng");
        $idTramite = ($this->input->post("idTramite") == "") ? $idTramiteGet : $this->input->post("idTramite");

        //get tramite
        $url = URL_CMS."RestTramites/getTramiteById";
        $params = array("idTramite"=>$idTramite);
        $resT = $this->consumeRest($url, $params);

        //get documentos para tramite
        $url = URL_CMS."RestTramites/documentosTramite";
        $params = array("idTramite"=>$idTramite);
        $resD = $this->consumeRest($url, $params);

        //get reglas para tramite
        $url = URL_CMS."RestTramites/reglasTramite";
        $params = array("idTramite"=>$idTramite);
        $resR = $this->consumeRest($url, $params);

        $data["documentos"] = json_decode($resD);
        $data["reglas"] = json_decode($resR);
        $data["idTramite"] = $idTramite;
        $data["tramite"] = json_decode($resT);
        $data["lat"] = $lat;
        $data["lng"] = $lng;
        $data["controller"] = $this;
        $this->load->view("tramites_documentos_view", $data);
    }

    function guardarTramite() {
        $data = $this->general();

        $nombre = $this->input->post("nombre");
        $correo = $this->input->post("correo");
        $idTramite = $this->input->post("idTramite");
        $lat = $this->input->post("lat");
        $lng = $this->input->post("lng");

        //save tramite
        $url = URL_CMS."RestTramites/iniciarTramite";
        $params = array("nombre"=>$nombre, "correo"=>$correo, "idTramite"=>$idTramite, "latitud"=>$lat, "longitud"=>$lng);
        $j=0;
        for ($i = 0; $i < count($_FILES["documentos"]["name"]); $i++) {
            if ($_FILES["documentos"]["name"][$i] != "") {
                $params["upload[$j]"] = new CurlFile($_FILES["documentos"]["tmp_name"][$i], $_FILES["documentos"]["type"][$i], $_FILES["documentos"]["name"][$i]);
                $j++;
            }
        }
        $res = $this->consumeRest($url, $params);
        $res = json_decode($res);

        if ($res->status == "success") {
            $this->session->set_flashdata("alert", array("message"=>"Tu tramite ha iniciado, nosotros nos comunicamos contigo para darte seguimiento"));
            redirect("tramites");
        }
        if ($res->status == "archivos") {
            $this->session->set_flashdata("alert", array("message"=>"Debe seleccionar un archivo antes de continuar"));
            redirect("tramites/tramitesDocumentos/".$idTramite."/".$lat."/".$lng);
        }
    }

    public function consumeRest($url, $params) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }


    function general() {
        $config['page'] = "tramites";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);

        return $data;
    }
}
