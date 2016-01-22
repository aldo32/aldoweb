<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antecedentes extends CI_Controller
{

    var $userSession;

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->userSession = $this->session->userdata("usuario");

        $this->load->model("Model_categorias", "categorias");
    }

    public function index() {
        $data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');

        $q = $this->db->get("antecedentes");
        $data["antecedentes"] = $q->result();

        $q = $this->db->get_where("banners", array("tipo"=>"fiestas"));
        $data["bannersFiestas"] = $q->result();

        $this->load->view('antecedentes/antecedentes_view', $data);
    }

    function nuevo() {
        $data = $this->general();
        $data["antecedente"] = "";
        $this->load->view('antecedentes/antecedentes_editar_view', $data);
    }

    function guardar() {
        $data = $this->general();
        $id = $this->input->post("id");
        $type = $this->input->post("type");
        $antecedente = "";

        if ($id != "") {
            $q = $this->db->get_where("antecedentes", array("id"=>$id));
            $antecedente = $q->row();
        }

        $this->form_validation->set_rules('descripcion', '<strong>Descripción</strong>', 'required|trim');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
            $data["antecedente"] = $antecedente;

            $this->load->view('antecedentes/antecedentes_editar_view', $data);
        }
        else {
            $register["descripcion"] = $this->input->post("descripcion", false);

            if ($type == "insert") {
                $this->db->insert("antecedentes", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El antecedente se creó correctamente"));
                redirect("antecedentes");
            }
            else {
                $this->db->where("id", $id);
                $this->db->update("antecedentes", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El antecedente se actualizó correctamente"));
                redirect("antecedentes");
            }
        }
    }

    function eliminar($id) {
        $q = $this->db->get_where("antecedentes", array("id"=>$id));
        $antecedente = $q->row();

        if ($antecedente) {
            $this->db->delete('antecedentes', array('id' => $antecedente->id));

            $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El antecedente se eliminó correctamente"));
            redirect("antecedentes");
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
            redirect("antecedentes");
        }
    }

    function editar($id) {
        $q = $this->db->get_where("antecedentes", array("id"=>$id));
        $antecedente = $q->row();

        if ($antecedente) {
            $data = $this->general();
            $data["antecedente"] = $antecedente;

            $this->load->view('antecedentes/antecedentes_editar_view', $data);
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro registro en la base de datos"));
            redirect("antecedentes");
        }
    }


    function general() {
        $config['usuario'] = $this->userSession;
        $config['page'] = "antecedentes";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);
        $data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

        return $data;
    }
}