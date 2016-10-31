<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminaldo extends CI_Controller
{
    function index()
    {
        $this->load->view("admin/login_view");
    }

    function login()
    {
        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|trim');
        $this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');

        if ($this->form_validation->run()==FALSE) {
            $this->form_validation->set_error_delimiters('<small>', '</small><br>');
            $this->load->view("admin/login_view");
        }
        else {
            $email = $this->input->post("email");
            $password = md5($this->input->post("password"));
            $login = $this->db->get_where("users", array("email"=>$email, "password"=>$password))->row();

            if (!$login) {
                $data["message"] = "Usuario o contraseña invalidos";
                $this->load->view("admin/login_view", $data);
            }
            else {
                $this->session->set_userdata((array)$login);
                redirect("adminaldo/inicio");
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
        session_destroy();
        $this->session->unset_userdata();
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

        //get all projects
        $data["projects"] = $this->db->get("projects")->result();

        $this->load->view("admin/proyectos_view", $data);
    }
}