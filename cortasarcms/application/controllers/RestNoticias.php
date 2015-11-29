<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Class RestNoticias
 * @Author Aldo Marañon Andrade
 */
class RestNoticias extends REST_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model("Model_categorias", "categorias");
    }

    /***
     * REST: Obtener noticias
     * URL: /RestNoticias/obtenerNoticias
     * RETURN SUCCESS: noticias[]
     * RETURN ERROR: status, message
     */
    function obtenerNoticias_get()
    {
        $q = $this->db->get_where("noticias", array("activo"=>1));
        $noticias = $q->result();

        $this->response($noticias);
    }

    /***
     * REST: Obtener una noticia
     * URL: /RestNoticias/obtenerNoticia?idNoticia=1
     * RETURN SUCCESS: noticia[]
     * RETURN ERROR: status, message
     */
    function obtenerNoticia_get()
    {
        $idNoticia = $this->get("idNoticia");
        $q = $this->db->get_where("noticias", array("id"=>$idNoticia, "activo"=>1));
        $noticia = $q->row();

        $this->response($noticia);
    }

    /***
     * REST: Obtener multimedia de noticia
     * URL: /RestNoticias/obtenerMultimediaNoticia?idNoticia=1
     * RETURN SUCCESS: noticia[]
     * RETURN ERROR: status, message
     */
    function obtenerMultimediaNoticia_get()
    {
        $idNoticia = $this->get("idNoticia");
        $q = $this->db->get_where("noticias_archivos", array("idNoticia"=>$idNoticia));
        $archivos = $q->row();

        $this->response($archivos);
    }
}