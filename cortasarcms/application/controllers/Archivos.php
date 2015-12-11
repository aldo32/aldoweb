<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller
{

    var $userSession;

    function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->userSession = $this->session->userdata("usuario");

        $this->load->model("Model_categorias", "categorias");
    }

    public function index()
    {
        $data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');
        $data["uploadErrors"] = "";

        $this->load->view('archivos/archivos_view', $data);
    }

    function guardarArchivos() {
        $data = $this->general();
        $data["uploadErrors"] = "";

        $this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');
        if ($_FILES['archivo']['name'] == "")
            $this->form_validation->set_rules('archivo', '<strong>Archivo</strong>', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
            $data["uploadErrors"] = "";
            $data["alert"] = "";

            $this->load->view('archivos/archivos_view', $data);
        }
        else {
            $config['upload_path'] = './uploads/archivos';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;

            $data["uploadErrors"] = "";

            $this->load->library("upload", $config);

            if (!$this->upload->do_upload('archivo')) {
                $data["uploadErrors"] .= "<b>" . $_FILES['archivo']['name'] . "</b>: " . $this->upload->display_errors("", "") . "<br>";
                $data["alert"] = "";

                $this->load->view('archivos/archivos_view', $data);
            } else {
                $register["nombre"] = $this->input->post("nombre");
                $register["descripcion"] = $this->input->post("descripcion");
                $register["archivo"] = "uploads/archivos/" . $this->upload->data('file_name');

                $this->db->insert("archivos", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El archivo se creó correctamente"));
                redirect("archivos");
            }
        }
    }

    function eliminar($id) {
        $q = $this->db->get_where("archivos", array("id"=>$id));
        $archivo = $q->row();

        if ($archivo) {
            if (file_exists("./".$archivo->archivo))
                unlink("./".$archivo->archivo);

            $this->db->delete('archivos', array('id' => $archivo->id));

            $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El archivo <b>".$archivo->nombre."</b> se eliminó correctamente"));
            redirect("archivos");
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
            redirect("archivos");
        }
    }


    function general() {
        $config['usuario'] = $this->userSession;
        $config['page'] = "archivos";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);
        $data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

        $q = $this->db->get("archivos");
        $data["archivos"] = $q->result();

        return $data;
    }
}