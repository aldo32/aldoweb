<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($idNoticia) {
        $data = $this->general();

        //get invertir
        $url = URL_CMS."RestNoticias/obtenerNoticia";
        $params = array("idNoticia"=>$idNoticia);
        $noticia = $this->consumeRest($url, $params);

        $data["noticia"] = json_decode($noticia);
        $this->load->view("noticia_view", $data);
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
        $config['page'] = "";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);

        return $data;
    }
}
