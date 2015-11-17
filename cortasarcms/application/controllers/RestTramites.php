<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Class RestTramites
 * @Author Aldo Marañon Andrade
 */
class RestUsuarios extends REST_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model("Model_tramites", "tramites");
	}

	/***
	 * REST: Alta de tramite
	 * URL: /RestUsuarios/nuevoUsuario?nombre=aldo&apellidos=marañon andradé&telefono=5531224198&email=isc.aldo@hotmail.com&password=aldoma&idPerfil=1
	 * RETURN SUCCESS: status, message, idUsuario
	 * RETURN ERROR: status, message
	 */
	function nuevoUsuario_get() {

	}
}
