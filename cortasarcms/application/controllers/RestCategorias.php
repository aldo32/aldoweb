<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Class RestTramites
 * @Author Aldo Marañon Andrade
 */
class RestCategorias extends REST_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("Model_categorias", "categorias");
    }

    /***
     * REST: Nueva categoria
     * URL: /RestCategorias/nuevaCategoria?nombre=aldo
     * RETURN SUCCESS: status, message, idCategoria
     * RETURN ERROR: status, message
     */
    function nuevaCategoria_get() {
        $reg["nombre"] = $this->get("nombre");

        $this->db->insert("categorias", $reg);
        $idCategoria = $this->db->insert_id();

        $response = array("status" => "success", "message"=>"Categoria creada correctamente", "idCategoria"=>$idCategoria);
        $this->response($response);
    }

    /***
     * REST: Obtener categoria
     * URL: /RestCategorias/obtenerCategoria?idCategoria=1
     * RETURN SUCCESS: status, categoria[],
     * RETURN ERROR: status, message
     */
    function obtenerCategoria_get() {
        $idCategoria = $this->get("idCategoria");

        $q = $this->db->get_where("categorias", array("id"=>$idCategoria));
        $categoria = $q->row();

        if (isset($categoria))
            $response = array("status" => "success", "categoria"=>$categoria);
        else
            $response = array("status"=>"error", "message"=>"No se encontro la categoria");

        $this->response($response);
    }

    /***
     * REST: Obtener categorias
     * URL: /RestCategorias/obtenerCategorias
     * RETURN SUCCESS: status, categorias[],
     * RETURN ERROR: status, message
     */
    function obtenerCategorias_get() {
        $q = $this->db->get("categorias");
        $categorias = $q->result();

        if (isset($categorias))
            $response = array("status" => "success", "categoria"=>$categorias);
        else
            $response = array("status"=>"error", "message"=>"No se encontro la categoria");

        $this->response($response);
    }

    /***
     * REST: Eliminar categoria
     * URL: /RestCategorias/eliminarCategoria?idCategoria=1
     * RETURN SUCCESS: status, message
     * RETURN ERROR: status, message
     */
    function eliminarCategoria_get() {
        $idCategoria = $this->get("idCategoria");

        $this->db->db_debug = FALSE;
        $this->db->delete("categorias", array("id"=>$idCategoria));

        $error = $this->db->error();
        if ($error["code"] == 0)
            $response = array("status"=>"success", "message"=>"Categoria eliminada correctamente");
        else
            $response = array("status"=>"error", "message"=>$error);

        $this->db->db_debug = TRUE;
        $this->response($response);
    }
}
