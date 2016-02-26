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

        $data["banners"] = $banners;
		$this->load->view("inicio_view", $data);
	}

    function buscar() {
        $data = $this->general();
        $this->load->view("buscar_view", $data);
    }

    function detalle() {
        $data = $this->general();
        $this->load->view("detalle_view", $data);
    }

	function general() {
        $config['page'] = "home";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);

        return $data;
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
