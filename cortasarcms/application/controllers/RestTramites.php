<?php
require(APPPATH.'libraries/REST_Controller.php');

/**
 * Class RestTramites
 * @Author Aldo Marañon Andrade
 */
class RestTramites extends REST_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model("Model_tramites", "tramites");
	}

    /***
     * REST: Inicia el tramite
     * URL: /RestTramites/iniciarTramite
     * POST: idTramite, file1, file2 ... fileN
     * RETURN ERROR: status, message
     */
    function iniciarTramite_post() {
        $this->load->library("upload");

        $nombre = $this->post("nombre");
        $email = $this->post("correo");
        $idTramite = $this->post("idTramite");
        $latitud = $this->post("latitud");
        $longitud = $this->post("longitud");
        $numFiles = count($_FILES["upload"]["name"]);
        $tramite = $this->tramites->getTramiteById($idTramite);
        $numFilesUpload = 0;
        $estatusCorreo = "";

        //insertando en tramites iniciados
        $q = $this->db->get_where("tramites_documentos", array("idTramite"=>$idTramite));
        $numDocumentos = sizeof($q->result());

        $documentosSubidos=0;
        for ($i = 0; $i < count($_FILES["upload"]["name"]); $i++) {
            if ($_FILES["upload"]["name"][$i] != "")
                $documentosSubidos++;
        }

        $reg["idTramite"] = $idTramite;
        $reg["documentosTramite"] = $numDocumentos;
        $reg["documentosSubidos"] = $documentosSubidos;
        $reg["emailUsuario"] = $email;
        $reg["nombre"] = $nombre;
        $reg["latitud"] = $latitud;
        $reg["longitud"] = $longitud;
        $reg["estatus"] = 0;

        $this->db->insert("tramites_iniciados", $reg);
        $idTramiteIniciado = $this->db->insert_id();

        for ($i = 0; $i < $numFiles; $i++) {
            $_FILES['tramiteFile']['name'] = $_FILES['upload']['name'][$i];
            $_FILES['tramiteFile']['type'] = $_FILES['upload']['type'][$i];
            $_FILES['tramiteFile']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
            $_FILES['tramiteFile']['error'] = $_FILES['upload']['error'][$i];
            $_FILES['tramiteFile']['size'] = $_FILES['upload']['size'][$i];

            //uploading files
            $config['upload_path'] = './uploads/tramites/documentos';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|png|jpeg';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;

            $uploadErrors = "";
            $uploadFiles = "";

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('tramiteFile')) {
                $uploadErrors .= "<b>" . $_FILES['tramiteFile']['name'] . ":</b> " . $this->upload->display_errors("", "") . "<br>";
            } else {
                $numFilesUpload++;

                //guardando en bd
                $register = "";
                $register["idTramite"] = $idTramite;
                $register["archivo"] = "uploads/tramites/documentos/" . $this->upload->data('file_name');
                $register["idTramiteIniciado"] = $idTramiteIniciado;

                //checa si el archivo ya existe para no duplicar registros
                $file = $this->tramites->checkUrlFileDocumento($register["archivo"], $idTramite, $idTramiteIniciado);
                if (!isset($file))
                    $this->db->insert("tramites_documentos_archivos", $register);

                $uploadFiles .= "Archivo <b>" . $this->upload->data('file_name') . "</b> correctamente guardado<br>";
            }
        }

        //comparando cuantos documentos subio y cuentos requiere el tramite
        $numFilesTramite = $this->tramites->getNumDocumentsBytramite($idTramite);

        //Guardando tramite en bd
        /*$regTramite["idTramite"] = $idTramite;
        $regTramite["documentosTramite"] = $numFilesTramite->numFiles;
        $regTramite["documentosSubidos"] = $numFilesUpload;
        $regTramite["emailUsuario"] = $email;*/

        if ($numFilesUpload < $numFilesTramite->numFiles) {
            //Se actualiza el tramite con estatus de cancelado: 2 y se envia correo de aviso
            $estatus = 2; //0: Revicion, 1: Aeptado, 2: Rechasado
            $this->db->update("tramites_iniciados", array("estatus"=>$estatus), array("id"=>$idTramiteIniciado));

            //Enviando el correo de aviso al usuario
            $message = "Sentimos informarle que el tranite qe solicito ha sido cancelado por falta de documentos, por favor vuelva a iniciar el tramite";
            $from = "isc.aldo@gmail.com";
            $fromMessage = "Cancelacion de tramite";
            $to = $email;
            $subject = "Cancelaciòn de tramite";
            $this->generallib->sendEmail($message, $from, $fromMessage, $to, $subject, null);
        }
        else {
            //to do: validar que exista el correo para enviar, si no mandar mensaje de que no existe un correo para enviar

            //Se envia correo que se configuro en el cms para el tramite
            $correo = $this->tramites->getCorreoTramite($idTramite);

            if (isset($correo)) {
                $message = $correo->mensaje;
                $from = "isc.aldo@gmail.com";
                $fromMessage = $correo->titulo;
                $to = $email;
                $subject = $correo->titulo;

                //archivos adjuntos
                $correoArchivos = $this->tramites->getCorreoArchivosTramite($idTramite, $correo->id);

                $this->generallib->sendEmail($message, $from, $fromMessage, $to, $subject, $correoArchivos);

                $estatusCorreo = "success";
            }
            else {
                $estatusCorreo = "error";
            }

        }

        $this->response(array(
            "status"=>"success",
            "message"=>"Tramite iniciado correctamente se subieron $numFilesUpload de $numFilesTramite->numFiles",
            "fileErrors"=>$uploadErrors,
            "fileUploads"=>"$uploadFiles",
            "statusCorreo"=>$estatusCorreo)
        );
    }

    function comboTramites_post() {
        $sql = "SELECT *, (SELECT nombre FROM categorias WHERE id = tramites.idCategoria) AS nombreCategoria, (SELECT nombre FROM subcategorias WHERE id = tramites.idSubCategoria) AS nombreSubCategoria FROM tramites";
        $q = $this->db->query($sql);
        $tramites = $q->result();

        foreach ($tramites AS $row)
            $opciones[$row->id] = $row->nombreCategoria." - ".$row->nombreSubCategoria." - ".$row->nombre;

        $this->response($opciones);
    }

    function getTramiteById_post() {
        $idTramite = $this->post("idTramite");

        $q = $this->db->get_where("tramites", array("id"=>$idTramite));
        $this->response($q->row());
    }

    function documentosTramite_post() {
        $idTramite = $this->post("idTramite");

        $sql = "SELECT *, (SELECT nombre FROM archivos WHERE id = tramites_documentos.idArchivo) AS nombreArchivo FROM tramites_documentos WHERE idTramite = $idTramite";
        $q = $this->db->query($sql);
        $this->response($q->result());
    }

    function reglasTramite_post() {
        $idTramite = $this->post("idTramite");

        $sql = "SELECT * FROM tramites_reglas WHERE idTramite =  $idTramite";
        $q = $this->db->query($sql);
        $this->response($q->result());
    }

    function documentosReglasTramite_post() {
        $idTramite = $this->post("idTramite");
        $idRegla = $this->post("idRegla");

        $sql = "SELECT *, (SELECT nombre FROM archivos WHERE id = tramites_reglas_documentos.idArchivo) AS nombreArchivo FROM tramites_reglas_documentos WHERE idTramite = $idTramite AND idRegla = $idRegla";
        $q = $this->db->query($sql);
        $this->response($q->result());
    }
}
