<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->view('inicio_view');
	}

    function showProject($id)
    {
        $data["id"] = $id;
        $this->load->view("modals/project_view", $data);
    }

    function blog($id)
    {
        echo "Próximamente";
    }
}
