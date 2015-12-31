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
        <br>
        <?php
    }

    function tramitesDocumentos() {
        $data = $this->general();

        $lat = $this->input->post("lat");
        $lng = $this->input->post("lng");
        $idTramite = $this->input->post("idTramite");

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

    public function consumeRest($url, $params) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
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
