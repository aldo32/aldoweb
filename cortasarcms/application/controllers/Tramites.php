<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tramites extends CI_Controller {

	var $userSession;

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->userSession = $this->session->userdata("usuario");

		$this->load->model("Model_tramites", "tramites");
        $this->load->model("Model_categorias", "categorias");
	}

	public function index() {
		$data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');

        $this->load->view("tramites/tramites_view", $data);
    }

    function nuevo() {
        $data = $this->general();
        $data["tramite"] = "";

        $this->load->view("tramites/tramites_editar_view", $data);
    }

    function editar($id) {
		$tramite = $this->tramites->getTramiteById($id);
		if ($tramite) {
			$data = $this->general();
			$data["tramite"] = $tramite;

			$this->load->view("tramites/tramites_editar_view", $data);
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el tramite en la base de datos"));
			redirect("tramites");
		}
	}

    function guardar() {
        $id = $this->input->post("id");
		$type = $this->input->post("type");

		$tramite = $this->tramites->getTramiteById($id);

		if ($type == "sub") $this->form_validation->set_rules('idCategoria', '<strong>Categoria</strong>', 'trim|valid_combo');
		$this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción para el campo %s');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('<small><p>', '</p></small>');

			$data = $this->general();
			$data["type"] = $type;
			$data["categoria"] = $categoria;

			$this->load->view("categorias/categorias_editar_view", $data);
		}
		else {
    }

    function general() {
		$config['usuario'] = $this->userSession;
		$config['page'] = "tramites";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);
		$data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

		$data["comboCategorias"] = $this->categorias->getComboCategorias();
        $data["comboSubCategorias"] = $this->categorias->getComboSubCategorias();
		return $data;
	}
}
?>
