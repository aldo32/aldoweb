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

        }
    }
}