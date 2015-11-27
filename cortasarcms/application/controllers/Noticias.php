<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller
{
    var $userSession;

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->userSession = $this->session->userdata("usuario");

        $this->load->model("Model_directorios", "directorios");
    }

    public function index()
    {
        $data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');

        $q = $this->db->get("noticias");
        $data["noticias"] = $q->result();

        $this->load->view("noticias/noticias_view", $data);
    }

    function nuevo() {
        $data = $this->general();
        $data["noticia"] = "";
        $this->load->view("noticias/noticias_editar_view", $data);
    }

    function guardar() {
        $data = $this->general();
        $idNoticia = $this->input->post("idNoticia");
        $type = $this->input->post("type");
        $noticia = "";

        if ($idNoticia != "") {
            $q = $this->db->get_where("noticias", array("id"=>$idNoticia));
            $noticia = $q->row();
        }

        $this->form_validation->set_rules('titulo', '<strong>Titulo</strong>', 'required|trim');
        $this->form_validation->set_rules('nota', '<strong>Nota</strong>', 'required|trim');
        $this->form_validation->set_rules('descripcion', '<strong>Descripción</strong>', 'trim');
        $this->form_validation->set_rules('autor', '<strong>Autor</strong>', 'required|trim');
        $this->form_validation->set_rules('formato', '<strong>Formato</strong>', 'trim|valid_combo');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_combo', 'Seleccione una opción para el campo %s');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
            $data["noticia"] = $noticia;

            $this->load->view("noticias/noticias_editar_view", $data);
        }
        else {
            $register["titulo"] = $this->input->post("titulo");
            $register["nota"] = $this->input->post("nota");
            $register["descripcion"] = $this->input->post("descripcion");
            $register["autor"] = $this->input->post("autor");
            $register["formato"] = $this->input->post("formato");

            if ($type == "insert") {
                $this->db->insert("noticias", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La noticia <b>".$register['titulo']."</b> se creó correctamente"));
                redirect("noticias");
            }
            else {
                $this->db->where("id", $idNoticia);
                $this->db->update("noticias", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La noticia <b>".$register['titulo']."</b> se actualizó correctamente"));
                redirect("noticias");
            }
        }
    }

    function editar($id) {
        $q = $this->db->get_where("noticias", array("id"=>$id));
        $noticia = $q->row();

        if ($noticia) {
            $data = $this->general();
            $data["noticia"] = $noticia;

            $this->load->view("noticias/noticias_editar_view", $data);
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro registro en la base de datos"));
            redirect("noticias");
        }
    }

    function desactivar($id, $value) {
        $q = $this->db->get_where("noticias", array("id"=>$id));
        $noticia = $q->row();

        if ($noticia) {
            $register["activo"] = $value;

            $this->db->where("id", $noticia->id);
            $this->db->update("noticias", $register);

            $msg = ($value == 1) ? "activó" : "desactivó";

            $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La noticia <b>".$noticia->titulo."</b> se ".$msg));
            redirect("noticias");
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
            redirect("noticias");
        }
    }

    function eliminar($id) {
        $q = $this->db->get_where("noticias", array("id"=>$id));
        $noticia = $q->row();

        if ($noticia) {
            $this->db->delete('noticias', array('id' => $noticia->id));

            $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La noticia <b>".$noticia->titulo."</b> se eliminó correctamente"));
            redirect("noticias");
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
            redirect("noticias");
        }
    }

    function multimedia($id) {
        $q = $this->db->get_where("noticias", array("id"=>$id));
        $noticia = $q->row();

        if ($noticia) {
            $data = $this->general();

            $q = $this->db->get_where("noticias_archivos", array("idNoticia"=>$noticia->id));
            $data["archivos"] = $q->result();
            $data["noticia"] = $noticia;
            $data["alert"] = "";

            $this->load->view("noticias/noticias_archivos_view", $data);
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
            redirect("noticias");
        }
    }

    function general()
    {
        $config['usuario'] = $this->userSession;
        $config['page'] = "noticias";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);
        $data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

        return $data;
    }
}