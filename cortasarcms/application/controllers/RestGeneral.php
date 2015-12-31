<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Class RestNoticias
 * @Author Aldo Marañon Andrade
 */
class RestGeneral extends REST_Controller
{

    function __construct() {
        parent::__construct();

        $this->load->model("Model_categorias", "categorias");
    }

    function obtenerAntecedentes_post() {
        $sql = "SELECT * FROM  antecedentes";
        $q = $this->db->query($sql);
        $antecedentes = $q->result();

        $this->response($antecedentes);
    }

    function obtenerFiestas_post() {
        $sql = "SELECT * FROM  banners WHERE tipo = 'fiestas'";
        $q = $this->db->query($sql);
        $antecedentes = $q->result();

        $this->response($antecedentes);
    }

    function obtenerInvertir_post() {
        $sql = "SELECT * FROM  secciones WHERE seccion = 1 LIMIT 1";
        $q = $this->db->query($sql);
        $invertir = $q->row();

        $this->response($invertir);
    }
}