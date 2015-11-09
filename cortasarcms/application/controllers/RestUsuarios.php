<?php
require(APPPATH.'libraries/REST_Controller.php');

class RestUsuarios extends REST_Controller {

    function __construct() {
		parent::__construct();

		$this->load->model("Model_usuarios", "usuarios");
	}

    function usuarios_get() {
        $id = $this->get('id');
        $aldo = $this->get('aldo');

        $usuarios = $this->usuarios->getUserById(1);

        $response = array("status"=>"ok", "value1"=>"1", "id"=>$id, "aldo"=>$aldo);
        //$this->response($response);
        $this->response($usuarios);
    }
}
