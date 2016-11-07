<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
        //get proyects
        $data["projects"] = $this->db->get_where("projects", array("active"=>1))->result();
        //get skills
        $data["skills"] = $this->db->get("skills")->result();
        //get blog
        $data["blogs"] = $this->db->get_where("blog", array("active"=>1))->result();

		$this->load->view('inicio_view', $data);
	}

    function showProject($id)
    {
        $data["project"] = $this->db->get_where("projects", array("id"=>$id, "active"=>1))->row();
        $this->load->view("modals/project_view", $data);
    }
}
