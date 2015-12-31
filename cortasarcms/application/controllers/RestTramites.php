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

        $idTramite = $this->post("idTramite");
        $email = $this->post("email");
        $numFiles = count($_FILES["upload"]["name"]);
        $tramite = $this->tramites->getTramiteById($idTramite);
        $numFilesUpload = 0;

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
                $uploadErrors .= "Archivo <b>" . $_FILES['emailFile']['name'] . "</b> " . $this->upload->display_errors("", "") . "<br>";
            } else {
                $numFilesUpload++;
                //guardando en bd

                $register = "";
                $register["idTramite"] = $idTramite;
                $register["archivo"] = "uploads/tramites/documentos/" . $this->upload->data('file_name');

                //checa si el archivo ya existe para no duplicar registros
                $file = $this->tramites->checkUrlFileDocumento($register["archivo"], $idTramite);
                if (!isset($file))
                    $this->db->insert("tramites_documentos_archivos", $register);

                $uploadFiles .= "Archivo <b>" . $this->upload->data('file_name') . "</b> correctamente guardado<br>";
            }
        }

        //comparando cuantos documentos subio y cuentos requiere el tramite
        $numFilesTramite = $this->tramites->getNumDocumentsBytramite($idTramite);

        //Guardando tramite en bd
        $regTramite["idTramite"] = $idTramite;
        $regTramite["documentosTramite"] = $numFilesTramite->numFiles;
        $regTramite["documentosSubidos"] = $numFilesUpload;
        $regTramite["emailUsuario"] = $email;

        if ($numFilesUpload < $numFilesTramite->numFiles) {
            //Se guarda el tramite con estatus de cancelado: 4 y se envia correo de aviso
            $regTramite["estatus"] = 4; //0: iniciado, 1: Revición, 2: Proceso, 3: Finalizado, 4: Cancelado
            $this->db->insert("tramites_iniciados", $regTramite);

            //Enviando el correo de aviso al usuario
            $message = "Sentimos informarle que el tranite qe solicito ha sido cancelado por falta de documentos, por favor vuelva a iniiar el tramite";
            $from = "isc.aldo@cortasar.com";
            $fromMessage = "Cancelacion de tramite";
            $to = $email;
            $subject = "Cancelaciòn de tramite";
            $this->generallib->sendEmail($message, $from, $fromMessage, $to, $subject);
        }
        else {
            //Guardando el tramite con estatus de iniciado
            $regTramite["estatus"] = 0;
            $this->db->insert("tramites_iniciados", $regTramite);

            //Se envia correo que se copnfiguro en el cms para el tramite
            $correo = $this->tramites->getCorreoTramite($idTramite);

            $message = $correo->mensaje;
            $from = "isc.aldo@cortasar.com";
            $fromMessage = $correo->titulo;;
            $to = $email;
            $subject = $correo->titulo;
            $this->generallib->sendEmail($message, $from, $fromMessage, $to, $subject);
        }

        $this->response(array(
            "status"=>"success",
            "message"=>"Tramite iniciado correctamente se subieron $numFilesUpload de $numFilesTramite->numFiles",
            "fileErrors"=>$uploadErrors,
            "fileUploads"=>"$uploadFiles")
        );

        /*
         * Cuando el numero de archivos subidos no es igual al numero de documentos que ecesita el traite,
         * esta pasa a estar con estatus cancelado, se envia correo para avisar al usuario
         * que debe realizar el tramite nuevamente.
         * */
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
