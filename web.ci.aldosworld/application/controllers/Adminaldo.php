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
        $data["project"] = new stdClass();
        $data["project"]->image = "";

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
        $data["message"] = $this->session->flashdata();

        $data["skills"] = $this->db->get("skills")->result();

        $this->load->view("admin/skills_view", $data);
    }

    function skillsNew()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $data["skill"] = "";

        $this->load->view("admin/skills_edit_view", $data);
    }

    function skillsSave()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $type = $this->input->post("type");
        $skilId = $this->input->post("skillId");
        $skill = "";

        if ($type == "update") {
            $data["skill"] = $this->db->get_where("skills", array("id"=>$skilId))->row();
        }

        $this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<small>', '</small><br>');
            $this->load->view("admin/skills_edit_view", $data);
        }
        else {
            $skill["name"] = $this->input->post("name");
            $skill["porcent"] = $this->input->post("porcent");

            //save data
            if ($type == "insert") {
                $this->db->insert("skills", $skill);
                $flash = array("message"=>"El skill se creó correctamente", "type"=>"success");
                $this->session->set_flashdata($flash);
                redirect("adminaldo/skills");
            }
            else {
                $this->db->where(array("id"=>$skilId));
                $this->db->update("skills", $skill);

                $flash = array("message"=>"El proyecto se actualizó correctamente", "type"=>"success");
                $this->session->set_flashdata($flash);
                redirect("adminaldo/skills");
            }
        }
    }

    function skillsEdit($skillId)
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;

        $skill = $this->db->get_where("skills", array("id"=>$skillId))->row();

        if ($skill) {
            $data["skill"] = $skill;
            $this->load->view("admin/skills_edit_view", $data);
        }
        else {
            $flash = array("message"=>"No se encontro el skil en la base de datos", "type"=>"danger");
            $this->session->set_flashdata($flash);
            redirect("adminaldo/skills");
        }
    }

    function skillsDelete($skillId)
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;

        $skill = $this->db->get_where("skills", array("id"=>$skillId))->row();

        if ($skill) {
            $this->db->where("id", $skill->id);
            $this->db->delete("skills");

            $flash = array("message"=>"El skill se eilimino correctamente", "type"=>"success");
            $this->session->set_flashdata($flash);
            redirect("adminaldo/skills");
        }
        else {
            $flash = array("message"=>"No se encontro el skil en la base de datos", "type"=>"danger");
            $this->session->set_flashdata($flash);
            redirect("adminaldo/skills");
        }
    }

    function blog()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $data["message"] = $this->session->flashdata();

        //get all blogs
        $data["blogs"] = $this->db->get("blog")->result();

        $this->load->view("admin/blogs_view", $data);
    }

    function blogNew()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $data["blog"] = "";

        $this->load->view("admin/blogs_edit_view", $data);
    }

    function blogsSave()
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;
        $type = $this->input->post("type");
        $blogId = $this->input->post("blogId");
        $blog = "";
        $data["blog"] = new stdClass();
        $data["blog"]->image = "";

        if ($type == "update") {
            $data["blog"] = $this->db->get_where("blog", array("id"=>$blogId))->row();
        }

        $this->form_validation->set_rules('name', '<strong>Nombre</strong>', 'required|trim');
        $this->form_validation->set_rules('body', '<strong>body</strong>', 'required|trim');
        if (empty($_FILES['imageBlog']['name']) && $data["blog"]->image == "") {
            $this->form_validation->set_rules('imageBlog', '<strong>Imagen</strong>', 'required');
        }

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('<small>', '</small><br>');
            $this->load->view("admin/blogs_edit_view", $data);
        }
        else {
            $blog["name"] = $this->input->post("name");
            $blog["body"] = $this->input->post("body");
            $blog["source_url"] = $this->input->post("source_url");
            $blog["video_embed"] = $this->input->post("video_embed");

            if ($data["blog"]->image == "") {
                //upload file
                $config['upload_path'] = './resources/uploads/blog/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = uniqid("image_");
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('imageBlog')) {
                    $data["error_upload"] = $this->upload->display_errors();
                    $this->load->view("admin/blogs_edit_view", $data);
                }
                else {
                    $image = $this->upload->data();

                    //create thumb
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './resources/uploads/blog/'.$image["file_name"];
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 450;
                    $config['height'] = 280;

                    $this->load->library('image_lib', $config);

                    if (!$this->image_lib->resize()) {
                        $data["error_thumb"] = $this->image_lib->display_errors();
                        $this->load->view("admin/blogs_edit_view", $data);
                    }
                    else {
                        $blog["image"] = "resources/uploads/blog/".$image["file_name"];
                        $blog["image_thumb"] = "resources/uploads/blog/".$image["raw_name"]."_thumb".$image["file_ext"];
                    }
                }
            }

            //save data
            if ($type == "insert") {
                $this->db->insert("blog", $blog);
                $flash = array("message"=>"La entrada se creó correctamente", "type"=>"success");
                $this->session->set_flashdata($flash);
                redirect("adminaldo/blog");
            }
            else {
                $this->db->where(array("id"=>$blogId));
                $this->db->update("blog", $blog);

                $flash = array("message"=>"La entrada se actualizó correctamente", "type"=>"success");
                $this->session->set_flashdata($flash);
                redirect("adminaldo/blog");
            }
        }
    }

    function blogsEdit($blogId)
    {
        $session = $this->checkSession();
        $data = $this->generalViews();
        $data["session"] = $session;

        $blog = $this->db->get_where("blog", array("id"=>$blogId))->row();

        if ($blog) {
            $data["blog"] = $blog;
            $this->load->view("admin/blogs_edit_view", $data);
        }
        else {
            $flash = array("message"=>"No se encontro la entrada en la base de datos", "type"=>"danger");
            $this->session->set_flashdata($flash);
            redirect("adminaldo/blog");
        }
    }

    function blogDeleteImage()
    {
        $blogId = $this->input->post("blogid");

        //get project
        $blog = $this->db->get_where("blog", array("id"=>$blogId))->row();

        //delete images
        if (file_exists("./".$blog->image) && $blog->image != "") {
            unlink("./".$blog->image);
        }
        if (file_exists("./".$blog->image_thumb) && $blog->image_thumb != "") {
            unlink("./".$blog->image_thumb);
        }

        $this->db->where(array("id"=>$blogId));
        $this->db->update("blog", array("image"=>"", "image_thumb"=>""));

        echo json_encode(array("status"=>"success"));
    }

    function blogDeleteItem()
    {
        $blogId = $this->input->post("blogId");
        $active = ($this->input->post("active") == "false") ? 0 : 1;
        $this->db->where("id", $blogId);
        $this->db->update("blog", array("active"=>$active));
    }

    function sendemail()
    {
        $email = utf8_decode($this->input->post("email"));
        $name = utf8_decode($this->input->post("name"));
        $asunto = utf8_decode($this->input->post("asunto"));

        /*
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '10';
        $config['smtp_user']    = 'isc.aldo@gmail.com';
        $config['smtp_pass']    = 'aldoma32';
        */
        $config['charset']    = 'ISO-8859-1';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html*/

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from($email, $name);
        $this->email->to('isc.aldo@gmail.com');

        $this->email->subject('Informacion de contacto');

        $message = '
            <!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
            </head>

            <body>
                <h2>Informaci&oacute;n de contacto</h2>
                <br><br>
                <p>Nombre: '.$name.'</p>
                <p>Correo: '.$email.'</p>
                <br><br>
                <p>'.nl2br($asunto).'</p>
                <br><br>
                Listo!!
            </body>
            </html>
        ';

        $this->email->message($message);
        $result = $this->email->send();

        if ($result) {
            echo json_encode(array("status"=>"success"));
        } else {
            echo json_encode(array("status"=>"error"));
        }
    }
}