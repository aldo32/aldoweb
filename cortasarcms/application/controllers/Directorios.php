<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Directorios extends CI_Controller
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

        $q = $this->db->get("directorio");
        $data["directorios"] = $q->result();

        $this->load->view("directorios/directorios_view", $data);
    }

    function nuevo() {
        $data = $this->general();
        $data["directorio"] = "";
        $this->load->view("directorios/directorios_editar_view", $data);
    }

    function guardar() {
        $data = $this->general();
        $idDirectorio = $this->input->post("idDirectorio");
        $type = $this->input->post("type");
        $directorio = "";
        $uploadErrors = "";

        if ($idDirectorio != "") $directorio = $this->directorios->getDirectoryById($idDirectorio);

        $this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');
        $this->form_validation->set_rules('apellidos', '<strong>Apellidos</strong>', 'required|trim');
        $this->form_validation->set_rules('direccion', '<strong>Dirección</strong>', 'required|trim');
        $this->form_validation->set_rules('telefono', '<strong>Teléfono</strong>', 'required|trim');
        $this->form_validation->set_rules('puesto', '<strong>Puesto</strong>', 'trim');
        $this->form_validation->set_rules('horario', '<strong>Horario</strong>', 'trim');

        if ($type == "insert") {
            $this->form_validation->set_rules('correo', '<strong>Correo</strong>', 'required|trim|valid_email|is_unique[directorio.correo]');
        }

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('is_unique', 'El corre %s ya existe en la bd');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
            $data["directorio"] = $directorio;

            $this->load->view("directorios/directorios_editar_view", $data);
        }
        else {
            $register["nombre"] = $this->input->post("nombre");
            $register["apellidos"] = $this->input->post("apellidos");
            $register["direccion"] = $this->input->post("direccion");
            $register["telefono"] = $this->input->post("telefono");
            $register["correo"] = $this->input->post("correo");
            $register["puesto"] = $this->input->post("puesto");
            $register["horario"] = $this->input->post("horario");

            //upload foto
            if ($_FILES["foto"]["name"] != "") {
                $config['upload_path'] = './uploads/directorio/fotos';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['remove_spaces'] = true;
                $config['overwrite'] = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    $uploadErrors = $this->upload->display_errors("<small><p>", "</p></small>");
                    $data["directorio"] = $directorio;
                    $data["uploadErros"] = $uploadErrors;

                    $this->load->view("directorios/directorios_editar_view", $data);
                }
                else {
                    $register["foto"] = "uploads/directorio/fotos/" . $this->upload->data('file_name');
                }
            }

            if ($type == "insert") {
                $this->db->insert("directorio", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La persona <b>".$register['nombre']." ".$register["apellidos"]."</b> se creó correctamente en el directorio"));
                redirect("directorios");
            }
            else {
                $this->db->where("id", $idDirectorio);
                $this->db->update("directorio", $register);
                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La persona <b>".$register['nombre']." ".$register["apellidos"]."</b> se actualizó correctamente en el directorio"));
                redirect("directorios");
            }
        }
    }

        function editar($id) {
            $directorio = $this->directorios->getDirectoryById($id);
            if ($directorio) {
                $data = $this->general();
                $data["directorio"] = $directorio;

                $this->load->view("directorios/directorios_editar_view", $data);
            }
            else {
                $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro registro en la base de datos"));
                redirect("directorios");
            }
        }

    function eliminar($id) {
        $directorio = $this->directorios->getDirectoryById($id);
        if ($directorio) {
            if (file_exists("./".$directorio->foto))
                unlink("./".$directorio->foto);

            $this->db->delete('directorio', array('id' => $directorio->id));

            $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La persona <b>".$directorio->nombre." ".$directorio->apellidos."</b> se eliminó correctamente del directorio"));
            redirect("directorios");
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro al usuario en la base de datos"));
            redirect("directorios");
        }
    }

    function eliminarImagen() {
        $id = $this->input->post("idDirectorio");

        $directorio = $this->directorios->getDirectoryById($id);

        if (file_exists("./".$directorio->foto))
            unlink("./".$directorio->foto);

        $this->db->where("id", $id);
        $this->db->update("directorio", array("foto"=>""));

        echo "<input type='file' name='foto' id='foto'>";
    }

    function desactivar($id, $value) {
        $directorio = $this->directorios->getDirectoryById($id);
        if ($directorio) {
            $register["activo"] = $value;

            $this->db->where("id", $directorio->id);
            $this->db->update("directorio", $register);

            $msg = ($value == 1) ? "activó" : "desactivó";

            $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La persona <b>".$directorio->nombre." ".$directorio->apellidos."</b> se ".$msg));
            redirect("directorios");
        }
        else {
            $this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
            redirect("directorios");
        }
    }

    function general() {
        $config['usuario'] = $this->userSession;
        $config['page'] = "directorios";

        $data['includes'] = $this->load->view("general/general_includes_view", '', true);
        $data['header'] = $this->load->view("general/general_header_view", $config, true);
        $data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
        $data['footer'] = $this->load->view("general/general_footer_view", '', true);
        $data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

        return $data;
    }
}