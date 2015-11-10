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
		$data["tramites"] = $this->tramites->getTramites();

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

		$this->form_validation->set_rules('nombre', '<strong>Nombre</strong>', 'required|trim');
		$this->form_validation->set_rules('descripcion', '<strong>Descripcion</strong>', 'required|trim');
		$this->form_validation->set_rules('idCategoria', '<strong>Categoria</strong>', 'required|valid_combo');
		$this->form_validation->set_rules('idSubCategoria', '<strong>Subcategoria</strong>', 'required|valid_combo');
	    $this->form_validation->set_rules('reglas', '<strong>Reglas</strong>', 'required|trim');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción para el campo %s');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('<small><p>', '</p></small>');

			$data = $this->general();
			$data["type"] = $type;
			$data["tramite"] = $tramite;

			$this->load->view("tramites/tramites_editar_view", $data);
		}
		else {
			$register["nombre"] = $this->input->post("nombre");
			$register["descripcion"] = $this->input->post("descripcion");
			$register["idCategoria"] = $this->input->post("idCategoria");
			$register["idSubCategoria"] = $this->input->post("idSubCategoria");
			$register["reglas"] = $this->input->post("reglas");

			if ($type == "insert") {
				$this->db->insert("tramites", $register);
				$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El tramite <b>".$register['nombre']."</b> se creó correctamente"));
				redirect("tramites");
			}
			else {
				$this->db->where("id", $tramite->id);
				$this->db->update("tramites", $register);
				$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El tramite <b>".$register['nombre']."</b> se actualizó correctamente"));
				redirect("tramites");
			}
		}
    }

	function eliminar($id) {
		$tramite = $this->tramites->getTramiteById($id);
		if ($tramite) {
			$this->db->delete('tramites', array('id' => $tramite->id));

			$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"Se eliminó el tramite correctamente"));
			redirect("tramites");
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el tramite en la base de datos"));
			redirect("tramites");
		}
	}

	function archivos() {
		$data = $this->general();
        $data["alert"] = $this->session->flashdata('alert');
		$data["tramites"] = $this->tramites->getComboTramites();
        $data["archivosTramites"] = $this->tramites->getArchivosTramites();

		$this->load->view("tramites/tramites_archivos_view", $data);
	}

	function guardararchivos() {
        $data = $this->general();
        $data["alert"]="";
        $data["tramites"] = $this->tramites->getComboTramites();

		$this->form_validation->set_rules('idTramite', '<strong>Tramite</strong>', 'trim|valid_combo');
		$this->form_validation->set_rules('tipo', '<strong>Tipo</strong>', 'valid_combo|trim');

		if (isset($_FILES['tramitesFiles'])) {
			if ($_FILES['tramitesFiles']["name"][0] == "")
			{
				$this->form_validation->set_rules('tramitesFiles', '<strong>Archivos</strong>', 'required');
			}
		}

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción para el campo %s');

		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<small><p>', '</p></small>');
            $this->load->view("tramites/tramites_archivos_view", $data);
		}
		else {
            $this->load->library('upload');

		    $tipo = $this->input->post("tipo");
            $uploadErrors = "";
            $uploadFiles = "";

            for ($i=0; $i<count($_FILES["tramitesFiles"]["name"]); $i++) {
                $_FILES['userfile']['name']     = $_FILES['tramitesFiles']['name'][$i];
                $_FILES['userfile']['type']     = $_FILES['tramitesFiles']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['tramitesFiles']['tmp_name'][$i];
                $_FILES['userfile']['error']    = $_FILES['tramitesFiles']['error'][$i];
                $_FILES['userfile']['size']     = $_FILES['tramitesFiles']['size'][$i];

                //uploading files
                $config['upload_path']          = './uploads/tramites/'.$tipo;
                $config['allowed_types']        = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['remove_spaces']        = true;
                $config['overwrite']            = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('userfile')) {
                    $uploadErrors .= "Archivo: <b>".$_FILES['userfile']['name']."</b> ".$this->upload->display_errors("", "")."<br>";
                    $this->load->view("tramites/tramites_archivos_view", $data);
                }
                else {
                    //guardando en bd
                    $register["idTramite"] = $this->input->post("idTramite");
	                $register["archivo"] = "uploads/tramites/".$tipo."/".$this->upload->data('file_name');
                    $register["tipo"] = $tipo;
                    $register["descripcion"] = $this->input->post("descripcion");

					$this->db->insert("tramites_archivos", $register);

                    $uploadFiles .= "Archivo: <b>".$this->upload->data('file_name')."</b> correctamente guardado<br>";
                }
            }

            $this->session->set_flashdata("alert", array("type"=>"alert-warning", "image"=>"fa-warning", "message"=>$uploadErrors."<br><br>".$uploadFiles));
            redirect("tramites/archivos");
		}
	}

	function eliminararchivo($id) {
		$archivo = $this->tramites->getArchivoById($id);
		if ($archivo) {
			$this->db->delete('tramites_archivos', array('id' => $archivo->id));

			$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"Se eliminó el archivo correctamente"));
			redirect("tramites/archivos");
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el archivo en la base de datos"));
			redirect("tramites/archivos");
		}
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
