<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	var $userSession;

	function __construct() {
		parent::__construct();
		if (!$this->session->has_userdata("usuario")) redirect("login"); else $this->userSession = $this->session->userdata("usuario");

		$this->load->model("Model_categorias", "categorias");
	}

	public function index() {
		$data = $this->general();

		$type = ($this->input->post("type") == "") ? "cat" : $this->input->post("type");

		$registers = "";
		if ($type == "cat")
			$registers = $this->categorias->getCategorias();
		else
			$registers = $this->categorias->getSubCategorias();


		$data["alert"] = $this->session->flashdata('alert');
		$data["type"] = $type;
		$data["registers"] = $registers;

		$this->load->view('categorias/categorias_view', $data);
	}

	function nuevo($type) {
		if ($type == "cat" || $type == "sub") {
			$data = $this->general();
			$data["type"] = $type;
			$data["categoria"] = "";

			$this->load->view("categorias/categorias_editar_view", $data);
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se puede crear la categoria, elemento no identificado"));
			redirect("categorias");
		}

	}

	function editar($id, $type) {
		if ($type == "cat" || $type == "sub") {
			$categoria = $this->categorias->getCategoriaById($id, $type);

			if ($categoria) {
				$data = $this->general();
				$data["type"] = $type;
				$data["categoria"] = $categoria;

				$this->load->view("categorias/categorias_editar_view", $data);
			}
			else {
				$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
				redirect("categorias");
			}
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se puede editar la categoria, elemento no identificado"));
			redirect("categorias");
		}
	}

	function guardar() {
		$id = $this->input->post("id");
		$type = $this->input->post("type");
		$operation = $this->input->post("operation");

		$categoria = $this->categorias->getCategoriaById($id, $type);

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
			if ($type == "sub") $register["idCategoria"] = $this->input->post("idCategoria");
			$register["nombre"] = $this->input->post("nombre");

			if ($operation == "insert") {
				if ($type == "cat")
					$this->db->insert("categorias", $register);
				else
					$this->db->insert("subcategorias", $register);
			}
			else {
				$this->db->where("id", $categoria->id);

				if ($type == "cat")
					$this->db->update("categorias", $register);
				else
					$this->db->insert("subcategorias", $register);
			}

			$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El creó/modifico la categoria/subcategoria <b>".$register["nombre"]."</b>"));
			redirect("categorias");
		}
	}

	function eliminar($id, $type) {
		if ($type == "cat" || $type == "sub") {
			$categoria = $this->categorias->getCategoriaById($id, $type);

			if ($categoria) {
				$this->categorias->deleteCategory($id, $type);

				$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"La categoria/subcategoria con id: $id se eliminó correctamente"));
				redirect("categorias");
			}
			else {
				$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el registro en la base de datos"));
				redirect("categorias");
			}
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se puede editar la categoria, elemento no identificado"));
			redirect("categorias");
		}
	}





	function general() {
		$config['usuario'] = $this->userSession;
		$config['page'] = "categorias";

		$data['includes'] = $this->load->view("general/general_includes_view", '', true);
		$data['header'] = $this->load->view("general/general_header_view", $config, true);
		$data['sidebar'] = $this->load->view("general/general_sidebar_view", $config, true);
		$data['footer'] = $this->load->view("general/general_footer_view", '', true);
		$data['control_sidebar'] = $this->load->view("general/general_control_sidebar_view", '', true);

		$data["comboCategorias"] = $this->categorias->getComboCategorias();
		return $data;
	}
}
