<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NuestrasFiestas extends CI_Controller
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

        $this->load->view('nuestrasfiestas/banners_view', $data);
    }

    function guardarBanner() {
        $data = $this->general();

        $this->form_validation->set_rules('titulo', '<strong>Titulo</strong>', 'required|trim');
        if ($_FILES['imagen']['name'] == "")
            $this->form_validation->set_rules('imagen', '<strong>Imagen</strong>', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
            $data["uploadErrors"] = "";

            $this->load->view('nuestrasfiestas/banners_view', $data);
        }
        else {
            $config['upload_path'] = './uploads/banners';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;

            $data["uploadErrors"] = "";

            $this->load->library("upload", $config);

            if (!$this->upload->do_upload('imagen')) {
                $data["uploadErrors"] .= "<b>" . $_FILES['imagen']['name'] . "</b>: " . $this->upload->display_errors("", "") . "<br>";

                $this->load->view('nuestrasfiestas/banners_view', $data);

            } else {
                $register["titulo"] = $this->input->post("titulo");
                $register["archivo"] = "uploads/banners/" . $this->upload->data('file_name');
                $register["tipo"] = "fiestas";

                $this->db->insert("banners", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El banner se creó correctamente"));
                redirect("nuestrasfiestas");
            }
        }
    }

    function eliminar($id) {
        $q = $this->db->get_where("banners", array("id"=>$id));
        $banner = $q->row();

        if ($banner) {
            if (file_exists("./".$banner->archivo))
                unlink("./".$banner->archivo);

            $this->db->delete('banners', array('id' => $banner->id));

            $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El banner se eliminó correctamente"));
            redirect("nuestrasfiestas");
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
            redirect("nuestrasfiestas");
        }
    }



    function general() {
        $config['usuario'] = $this->userSession;
        $config['page'] = "nuestrasfiestas";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);
        $data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

        $q = $this->db->get_where("banners", array("tipo"=>"fiestas"));
        $data["bannersFiestas"] = $q->result();

        return $data;
    }
}