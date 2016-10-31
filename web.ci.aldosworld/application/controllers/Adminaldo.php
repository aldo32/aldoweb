<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminaldo extends CI_Controller
{
    function index()
    {
        /*$this->load->library('encryption');
        echo $this->encryption->encrypt("aldoma32");
        exit();*/
        $this->load->view("admin/login_view");
    }

    function login()
    {
        $this->load->library('encryption');

        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|trim');
        $this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small>', '</small><br>');
            $this->load->view("admin/login_view");
        }
        else {
            $email = $this->input->post("email");
            $login = $this->db->get_where("users", array("email"=>$email))->row();

            if (!$login) {
                $data["message"] = "Usuario no válido";
                $this->load->view("admin/login_view", $data);
            }
            else {
                $passwordDb = $this->encryption->decrypt($login->password);
                $password = $this->input->post("password");

                if ($passwordDb === $password) {
                    $this->session->set_userdata((array)$login);
                    redirect("adminaldo/inicio");
                }
                else {
                    $data["message"] = "Password no válido";
                    $this->load->view("admin/login_view", $data);
                }
            }
        }
    }

    function inicio()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;

        $this->load->view("admin/inicio_view", $data);
    }

    function checkSession()
    {
        $session = $this->session->userdata();
        if (!isset($session["id"])) {
            redirect("adminaldo/login");
        }

        return $session;
    }

    function logout()
    {
        $this->session->unset_userdata('');
        session_destroy();
        redirect("adminaldo/login");
    }

    function generalViews()
    {
        $data = "";
        $data["header"] = $this->load->view("admin/general_header_view", $data, true);
        $data["menu"] = $this->load->view("admin/general_menu_view", $data, true);

        return $data;
    }

    function projects()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $data["message"] = $this->session->flashdata();

        //get all projects
        $data["projects"] = $this->db->get("projects")->result();

        $this->load->view("admin/proyectos_view", $data);
    }

    function projectsNew()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $data["project"] = "";

        $this->load->view("admin/proyectos_edit_view", $data);
    }

    function projectsSave()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $type = $this->input->post("type");
        $projectId = $this->input->post("projectId");
        $project = "";

        if ($type == "update") {
            $data["project"] = $this->db->get_where("projects", array("id"=>$projectId))->row();
        }

        $this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'required|trim');
        $this->form_validation->set_rules('url', '<strong>Url</strong>', 'valid_url|trim');
        if (empty($_FILES['imageProject']['name']) && $data["project"]->image == "") {
            $this->form_validation->set_rules('imageProject', '<strong>Imagen</strong>', 'required');
        }

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('valid_url', 'Url no valida');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<small>', '</small><br>');
            $this->load->view("admin/proyectos_edit_view", $data);
        }
        else {
            $project["name"] = $this->input->post("name");
            $project["description"] = $this->input->post("description");
            $project["url"] = $this->input->post("url");

            if ($data["project"]->image == "") {
                //upload file
                $config['upload_path'] = './resources/uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = uniqid("image_");
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('imageProject')) {
                    $data["error_upload"] = $this->upload->display_errors();
                    $this->load->view("admin/proyectos_edit_view", $data);
                }
                else {
                    $image = $this->upload->data();

                    //create thumb
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './resources/uploads/'.$image["file_name"];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 300;
                    $config['height'] = 400;

                    $this->load->library('image_lib', $config);

                    if (!$this->image_lib->resize()) {
                        $data["error_thumb"] = $this->image_lib->display_errors();
                        $this->load->view("admin/proyectos_edit_view", $data);
                    }
                    else {
                        $project["image"] = "resources/uploads/".$image["file_name"];
                        $project["image_thumb"] = "resources/uploads/".$image["raw_name"]."_thumb".$image["file_ext"];
                    }
                }
            }

            //save data
            if ($type == "insert") {
                $this->db->insert("projects", $project);
                $flash = array("message"=>"El proyecto se creó correctamente", "type"=>"success");
                $this->session->set_flashdata($flash);
                redirect("adminaldo/projects");
            }
            else {
                $this->db->where(array("id"=>$projectId));
                $this->db->update("projects", $project);

                $flash = array("message"=>"El proyecto se actualizó correctamente", "type"=>"success");
                $this->session->set_flashdata($flash);
                redirect("adminaldo/projects");
            }
        }
    }

    function projectsEdit($idProject)
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;

        $project = $this->db->get_where("projects", array("id"=>$idProject))->row();

        if ($project) {
            $data["project"] = $project;
            $this->load->view("admin/proyectos_edit_view", $data);
        }
        else {
            $flash = array("message"=>"No se encontro el proyecto en la base de datos", "type"=>"danger");
            $this->session->set_flashdata($flash);
            redirect("adminaldo/projects");
        }
    }

    function projectDeleteImage()
    {
        $projectId = $this->input->post("projectid");

        //get project
        $project = $this->db->get_where("projects", array("id"=>$projectId))->row();

        //delete images
        if (file_exists("./".$project->image) && $project->image != "") {
            unlink("./".$project->image);
        }
        if (file_exists("./".$project->image_thumb) && $project->image_thumb != "") {
            unlink("./".$project->image_thumb);
        }

        $this->db->where(array("id"=>$projectId));
        $this->db->update("projects", array("image"=>"", "image_thumb"=>""));

        echo json_encode(array("status"=>"success"));
    }

    function projectDeleteItem()
    {
        $projectId = $this->input->post("projectid");
        $active = ($this->input->post("active") == "false") ? 0 : 1;
        $this->db->where("id", $projectId);
        $this->db->update("projects", array("active"=>$active));
    }

    function skills()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $data["skills"] = $this->db->get("skills")->result();

        $this->load->view("admin/skills_view", $data);
    }
}