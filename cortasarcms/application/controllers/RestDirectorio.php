<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Class RestDirectorio
 * @Author Aldo Marañon Andrade
 */
class RestDirectorio extends REST_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Model_categorias", "categorias");
    }

    /***
     * REST: Obtener directorio
     * URL: /RestDirectorio/obtenerDirectorio
     * RETURN SUCCESS: directorio[]
     * RETURN ERROR: status, message
     */
    function obtenerDirectorio_get()
    {
        $q = $this->db->get_where("directorio", array("activo"=>1));
        $directorio = $q->result();

        $this->response($directorio);
    }

    /***
     * REST: Obtener persona de directorio
     * URL: /RestDirectorio/obtenerDirectorioPersona?idDirectorio=1
     * RETURN SUCCESS: directorio persona[]
     * RETURN ERROR: status, message
     */
    function obtenerDirectorioPersona_get()
    {
        $idDirectorio = $this->get("idDirectorio");
        $q = $this->db->get_where("directorio", array("id"=>$idDirectorio, "activo"=>1));
        $directorio = $q->row();

        $this->response($directorio);
    }
}