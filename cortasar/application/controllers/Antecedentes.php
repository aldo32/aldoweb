<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antecedentes extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = $this->general();

        //get antecedentes
        $url = URL_CMS."RestGeneral/obtenerAntecedentes";
        $params = array();
        $antecedentes = $this->consumeRest($url, $params);

        //get nuestras fiestas
        $url = URL_CMS."RestGeneral/obtenerFiestas";
        $params = array();
        $fiestas = $this->consumeRest($url, $params);

        $data["antecedentes"] = json_decode($antecedentes);
        $data["fiestas"] = json_decode($fiestas);
        $this->load->view("antecedentes_view", $data);
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


    function general() {
        $config['page'] = "antecedentes";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);

        return $data;
    }
}
