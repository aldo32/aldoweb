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
        $data["tramitesIniciados"] = $this->tramites->getTramitesIniciados();

        $this->load->view("tramites/tramites_view", $data);
    }

    function nuevo() {
        $data = $this->general();
        $data["tramite"] = "";
        $data["archivosTramite"] = "";

        $this->load->view("tramites/tramites_editar_view", $data);
    }

    function editar($id) {
		$tramite = $this->tramites->getTramiteById($id);
		$archivosTramite = $this->tramites->getArchivosTramite($tramite->id);

		if ($tramite) {
			$data = $this->general();
			$data["tramite"] = $tramite;
			$data["archivosTramite"] = $archivosTramite->archivos;

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
        $this->form_validation->set_rules('idArchivo', '<strong>Archivos</strong>', 'required|valid_combo');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_combo', 'Seleccione una opción para el campo %s');

		if ($this->form_validation->run()==FALSE) {
			$this->form_validation->set_error_delimiters('<small><p>', '</p></small>');

			$data = $this->general();
			$data["type"] = $type;
			$data["tramite"] = $tramite;
            $data["archivosTramite"] = "";

			$this->load->view("tramites/tramites_editar_view", $data);
		}
		else {
			$register["nombre"] = $this->input->post("nombre");
			$register["descripcion"] = $this->input->post("descripcion", false);
			$register["idCategoria"] = $this->input->post("idCategoria");
			$register["idSubCategoria"] = $this->input->post("idSubCategoria");
			$archivos = $this->input->post("archivos");

			if ($type == "insert") {
				$this->db->insert("tramites", $register);
				$id = $this->db->insert_id();

                $archivos = explode(",", $archivos);
                foreach ($archivos AS $row) {
                    $docs="";
                    $docs["idtramite"] = $id;
                    $docs["idArchivo"] = $row;

                    $this->db->insert("tramites_documentos", $docs);
                }

                $this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"El tramite <b>".$register['nombre']."</b> se creó correctamente"));
				redirect("tramites");
			}
			else {
			    $this->db->delete("tramites_documentos", array("idTramite"=>$tramite->id));

                $archivos = explode(",", $archivos);
                foreach ($archivos AS $row) {
                    $docs="";
                    $docs["idtramite"] = $id;
                    $docs["idArchivo"] = $row;

                    $this->db->insert("tramites_documentos", $docs);
                }

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
            $this->db->delete('tramites_reglas', array('idTramite' => $tramite->id));
            $this->db->delete('tramites_iniciados', array('idTramite' => $tramite->id));
            $this->db->delete('tramites_correos_archivos', array('idTramite' => $tramite->id));
            $this->db->delete('tramites_correos', array('idTramite' => $tramite->id));
            $this->db->delete('tramites_documentos', array('idTramite' => $tramite->id));
			$this->db->delete('tramites', array('id' => $tramite->id));

			$this->session->set_flashdata("alert", array("type"=>"alert-success", "image"=>"fa-check", "message"=>"Se eliminó el tramite correctamente"));
			redirect("tramites");
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el tramite en la base de datos"));
			redirect("tramites");
		}
	}

	function RDC($id) {
		$data = $this->general();
		$data["tramite"] = $this->tramites->getTramiteById($id);
		$data["alert"]="";

		if ($data["tramite"]) {
			$data["reglas"] = $this->tramites->getReglasTramite($data["tramite"]->id);
            $data["comboArchivosReglas"] = $this->tramites->getComboArchivosTramites(2);

            $data["documentos"] = $this->tramites->getDocumentosTramite($data["tramite"]->id);
            $data["correo"] = $this->tramites->getCorreoTramite($data["tramite"]->id);

			$this->load->view("tramites/tramites_rdc_view", $data);
		}
		else {
			$this->session->set_flashdata("alert", array("type"=>"alert-danger", "image"=>"fa-ban", "message"=>"No se encontro el tramite en la base de datos"));
			redirect("tramites");
		}
	}

	function RDCaddRule() {
		$idTramite = $this->input->post("idTramite");
		$regla = $this->input->post("regla");
        $archivos = $this->input->post("archivos");

		$register["idTramite"] = $idTramite;
		$register["regla"] = $regla;

        $this->db->insert("tramites_reglas", $register);
        $idRegla = $this->db->insert_id();

        if ($archivos != "") {
            $archivos = explode(",", $archivos);
            foreach ($archivos AS $row) {
                $docs="";
                $docs["idtramite"] = $idTramite;
                $docs["idArchivo"] = $row;
                $docs["idRegla"] = $idRegla;

                $this->db->insert("tramites_reglas_documentos", $docs);
            }
        }

		$reglas = $this->tramites->getReglasTramite($idTramite);

		?>
		<!-- DataTables -->
		<link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

		<!-- DataTables -->
		<script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
			$("#tablaReglas").DataTable({
				stateSave: true,
			});
		});
		</script>
		<table id="tablaReglas" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
                <th>Documentos</th>
				<th>Creado</th>
				<th width="50">Operaciones</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if ($reglas) {
				foreach($reglas AS $row) {
					?>
					<tr>
						<td><?php echo $row->id ?></td>
						<td><?php echo $row->regla ?></td>
						<td>
                            <?php
                            $documentos = $this->tramites->getDocumentosReglas($idTramite, $row->id);
                            echo ($documentos) ? $documentos->nombres : "";
                            ?>
                        </td>
						<td><?php echo $row->creado ?></td>
						<td><a href="javascript:void(0);" class="eliminarRegla" id="<?php echo $row->id ?>"><button class="btn btn-block btn-danger btn-xs">Eliminar</button></a></td>
					</tr>
					<?php
				}
			}
			?>
			</tbody>
		</table>
		<?php
	}

	function RDCdeleteRule() {
		$idTramite = $this->input->post("idTramite");
		$idRegla = $this->input->post("idRegla");

        $this->db->delete('tramites_reglas_documentos', array('idRegla' => $idRegla, "idTramite"=>$idTramite));
        $this->db->delete('tramites_reglas', array('id' => $idRegla));

		$reglas = $this->tramites->getReglasTramite($idTramite);

		?>
		<!-- DataTables -->
		<link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

		<!-- DataTables -->
		<script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#tablaReglas").DataTable({
					stateSave: true,
				});
			});
		</script>
		<table id="tablaReglas" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
                <th>Documentos</th>
				<th>Creado</th>
				<th width="50">Operaciones</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if ($reglas) {
				foreach($reglas AS $row) {
					?>
					<tr>
						<td><?php echo $row->id ?></td>
						<td><?php echo $row->regla ?></td>
                        <td>
                            <?php
                            $documentos = $this->tramites->getDocumentosReglas($idTramite, $row->id);
                            echo ($documentos) ? $documentos->nombres : "";
                            ?>
                        </td>
						<td><?php echo $row->creado ?></td>
						<td><a href="javascript:void(0);" class="eliminarRegla" id="<?php echo $row->id ?>"><button class="btn btn-block btn-danger btn-xs">Eliminar</button></a></td>
					</tr>
					<?php
				}
			}
			?>
			</tbody>
		</table>
		<?php
	}

    function RDCaddDocument()
    {
        $idTramite = $this->input->post("idTramite");
        $documento = $this->input->post("documento");
        $descripcion = $this->input->post("descripcion");

        $register["idTramite"] = $idTramite;
        $register["archivo"] = $documento;
        $register["descripcion"] = $descripcion;

        $this->db->insert("tramites_documentos", $register);

        $documentos = $this->tramites->getDocumentosTramite($idTramite);

        ?>
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#tablaDocumentos").DataTable({
                    stateSave: true,
                });
            });
        </script>

        <table id="tablaDocumentos" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Documento</th>
                <th>Descripción</th>
                <th>Creado</th>
                <th width="50">Operaciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($documentos) {
                foreach($documentos AS $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->archivo ?></td>
                        <td><?php echo $row->descripcion ?></td>
                        <td><?php echo $row->creado ?></td>
                        <td><a href="javascript:void(0);" class="eliminarDocumento" id="<?php echo $row->id ?>"><button class="btn btn-block btn-danger btn-xs">Eliminar</button></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <?php
    }

    function RDCdeleteDocument() {
        $idTramite = $this->input->post("idTramite");
        $idDocumento = $this->input->post("idDocumento");

        $this->db->delete('tramites_documentos', array('id' => $idDocumento));

        $documentos = $this->tramites->getDocumentosTramite($idTramite);

        ?>
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#tablaDocumentos").DataTable({
                    stateSave: true,
                });
            });
        </script>

        <table id="tablaDocumentos" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Documento</th>
                <th>Descripción</th>
                <th>Creado</th>
                <th width="50">Operaciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($documentos) {
                foreach($documentos AS $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td><?php echo $row->archivo ?></td>
                        <td><?php echo $row->descripcion ?></td>
                        <td><?php echo $row->creado ?></td>
                        <td><a href="javascript:void(0);" class="eliminarDocumento" id="<?php echo $row->id ?>"><button class="btn btn-block btn-danger btn-xs">Eliminar</button></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <?php
    }

    function RDCaddEmail() {
        //guardando el correo en bd
        $idTramite = $this->input->post("idTramite");
        $titulo = $this->input->post("titulo");
        $correo = $this->input->post("correo");
        $idCorreo = $this->input->post("idCorreo");

        $register["idTramite"] = $idTramite;
        $register["titulo"] = $titulo;
        $register["mensaje"] = $correo;

        if ($idCorreo == "") {
            $this->db->insert("tramites_correos", $register);
            $idCorreo = $this->db->insert_id();
        }
        else {
            $this->db->where(array("id"=>$idCorreo));
            $this->db->update("tramites_correos", $register);
        }

        //subiendo archivos y guardando la relacion de estos con el correo en la bd
        $this->load->library('upload');

        $uploadErrors = "";
        $uploadFiles = "";

        if (isset($_FILES["archivoAdjunto"]["name"])) {
            for ($i = 0; $i < count($_FILES["archivoAdjunto"]["name"]); $i++) {
                $_FILES['emailFile']['name'] = $_FILES['archivoAdjunto']['name'][$i];
                $_FILES['emailFile']['type'] = $_FILES['archivoAdjunto']['type'][$i];
                $_FILES['emailFile']['tmp_name'] = $_FILES['archivoAdjunto']['tmp_name'][$i];
                $_FILES['emailFile']['error'] = $_FILES['archivoAdjunto']['error'][$i];
                $_FILES['emailFile']['size'] = $_FILES['archivoAdjunto']['size'][$i];

                //uploading files
                $config['upload_path'] = './uploads/tramites/correos';
                $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg';
                $config['max_size'] = 0;
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['remove_spaces'] = true;
                $config['overwrite'] = true;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('emailFile')) {
                    $uploadErrors .= "Archivo <b>" . $_FILES['emailFile']['name'] . "</b> " . $this->upload->display_errors("", "") . "<br>";
                } else {
                    //guardando en bd
                    $register = "";
                    $register["idTramite"] = $idTramite;
                    $register["idCorreo"] = $idCorreo;
                    $register["archivo"] = "uploads/tramites/correos/" . $this->upload->data('file_name');
                    $register["descripcion"] = "";

                    //checa si el archivo ya existe para no duplicar registros
                    $file = $this->tramites->checkUrlFile($register["archivo"], $idCorreo);

                    if (!isset($file))
                        $this->db->insert("tramites_correos_archivos", $register);

                    $uploadFiles .= "Archivo <b>" . $this->upload->data('file_name') . "</b> correctamente guardado<br>";
                }
            }
            echo json_encode(array("status" => "success", "message"=>"Se actualizo correctamente el correo", "errors" => $uploadErrors, "files" => $uploadFiles, "idCorreo" => $idCorreo));
        }
        else {
            echo json_encode(array("status" => "success", "message" => "Se actualizo correctamente el correo", "errors"=>"", "files"=>"", "idCorreo"=>$idCorreo));
        }
    }

    function RDCgetFilesEmail() {
        $idTramite = $this->input->post("idTramite");
        $idCorreo = $this->input->post("idCorreo");

        $archivosCorreo = $this->tramites->getArchivosCorreoTramite($idTramite, $idCorreo);

        ?>
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.css">

        <!-- DataTables -->
        <script src="<?php echo base_url()?>/resources/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url()?>/resources/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#tablaFilesEmail").DataTable({
                    stateSave: true,
                });

                $(".nyroModal").nyroModal({
                    closeOnEscape: true,
                    closeOnClick: true,
                    showCloseButton: true,
                    callbacks: {
                        afterClose: function() {
                        }
                    }
                });
            });
        </script>

        <table id="tablaFilesEmail" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Archivo</th>
                <th>Creado</th>
                <th width="50">Operaciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($archivosCorreo) {
                foreach($archivosCorreo AS $row) {
                    $tmp = explode("/", $row->archivo);
                    ?>
                    <tr>
                        <td><?php echo $row->id ?></td>
                        <td><a href="<?php echo base_url().$row->archivo?>" target="_blank" class="nyroModal"><?php echo $tmp[3]; ?></a></td>
                        <td><?php echo $row->creado ?></td>
                        <td><a href="javascript:void(0);" class="eliminarArchivoEmail" id="<?php echo $row->id."-".$idCorreo ?>"><button class="btn btn-block btn-danger btn-xs">Eliminar</button></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
        <?php
    }

    function RDCdeleteFileMail() {
        $id = $this->input->post("id");

        $file = $this->tramites->getFileCorreoById($id);

        if (file_exists("./".$file->archivo))
            unlink("./".$file->archivo);

        $this->db->delete("tramites_correos_archivos", array("id"=>$id));

        echo json_encode(array("status"=>"success"));
    }

    function changeStatusTramite() {
        $idTramiteIniciado = $this->input->post("id");
        $estatus = $this->input->post("estatus");

        $this->db->where(array("id"=>$idTramiteIniciado));
        $this->db->update("tramites_iniciados", array("estatus"=>$estatus));
    }

    function viewDownloadDocsTramite($idTramiteIniciado, $idTramite) {
        $sql = "SELECT *, (SELECT nombre FROM archivos WHERE id = tramites_documentos.idArchivo) AS nombreArchivo, (SELECT descripcion FROM archivos WHERE id = tramites_documentos.idArchivo) AS descripcionArchivo FROM tramites_documentos WHERE idTramite = $idTramite";
        $q = $this->db->query($sql);
        $tramitesDocumentos = $q->result();

        $tramiteIniciado = $this->db->get_where("tramites_iniciados", array("id"=>$idTramiteIniciado));
        $tramiteIniciado = $tramiteIniciado->result();

        $tramitesDocumentosArchivos = $this->db->get_where("tramites_documentos_archivos", array("idTramite"=>$idTramite));
        $tramitesDocumentosArchivos = $tramitesDocumentosArchivos->result();

        ?>
        <div class="box box-primary" style="width: 700px; height:350px; overflow: auto;">
            <div class="">
                <h4 class="box-title" style="margin: 18px;">Documentos necesarios para el tramite</h4>
            </div>
            <div class="box-body">
                <div class="row" style="margin: 0px; padding: 0px;">
                    <div class="">
                        <?php
                        if (isset($tramitesDocumentos)) {
                            foreach ($tramitesDocumentos AS $row) {
                                ?>
                                <ul style="margin: 0px;">
                                    <li><?php echo $row->nombreArchivo?></li>
                                </ul>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="">
                <h4 class="box-title" style="margin: 8px;">Documentos subidos por el usuario</h4>
            </div>
            <div class="box-body">
                <div class="row" style="margin: 0px; padding: 0px;">
                    <div class="">
                        <?php
                        if (isset($tramitesDocumentosArchivos)) {
                            foreach ($tramitesDocumentosArchivos AS $row) {
                                $tmp = explode("/", $row->archivo);
                                ?>
                                <ul style="margin: 0px;">
                                    <li><a href="<?php echo base_url().$row->archivo?>" target="_blank">[Descargar]</a> <?php echo $tmp[3]; ?></li>
                                </ul>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    function comboSubCategoria() {
        $idCategoria =  $this->input->post("idCategoria");
        $comboSubCategorias = $this->categorias->getComboSubCategoriasByCategoria($idCategoria);

        ?>
        <label>Sub Categoria</label>
        <?php
        echo form_dropdown("idSubCategoria", $comboSubCategorias, set_value("idSubCategoria"), "class='form-control input-sm' id='idSubCategoria'");
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
        $data["comboArchivosTramites"] = $this->tramites->getComboArchivosTramites(1);

		return $data;
	}
}
