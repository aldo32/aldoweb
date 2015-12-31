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


	function general() {
		$config['page'] = "home";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);

		return $data;
	}
}
