<?php
class Model_tramites extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getTramiteById($id) {
		$sql="SELECT * FROM tramites WHERE id=?";
		$q=$this->db->query($sql, array($id));

		return ($q->num_rows() > 0) ? $q->row() : false;
	}

	function getTramites() {
		$sql = "SELECT
					*,
					(SELECT nombre FROM categorias WHERE id = tramites.idCategoria) AS nombreCategoria,
					(SELECT nombre FROM subcategorias WHERE id = tramites.idSubCategoria) AS nombreSubCategoria
				FROM
					tramites";
		$q = $this->db->query($sql);
		return $q->result();
	}

	function getComboTramites() {
		$sql="SELECT * FROM tramites";
		$q=$this->db->query($sql);

		if ($q->num_rows() > 0)
		{
			$options["-1"] = "Seleccione un tramite";
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;

			$q->free_result();
			return $options;
		}
	}

	function getArchivosTramite($idTramite) {
		$sql="SELECT GROUP_CONCAT(idArchivo) AS archivos FROM tramites_documentos td WHERE idTramite = $idTramite";
		$q=$this->db->query($sql);
		return $q->row();
	}

	function getArchivoById($id) {
		$sql = "SELECT * FROM tramites_archivos WHERE id=$id";
		$q=$this->db->query($sql);

		return ($q->num_rows() > 0) ? $q->row() : false;
	}

	function getReglasTramite($idTramite) {
		$sql = "SELECT * FROM tramites_reglas WHERE idTramite = $idTramite";
		$q = $this->db->query($sql);

		return $q->result();
	}

	function getDocumentosTramite($idTramite) {
		$sql = "SELECT * FROM tramites_documentos WHERE idTramite = $idTramite";
		$q = $this->db->query($sql);

		return $q->result();
	}

	function getCorreoTramite($idTramite) {
		$sql = "SELECT * FROM tramites_correos WHERE idTramite = $idTramite LIMIT 1";
		$q = $this->db->query($sql);

		return $q->row();
	}

	function getArchivosCorreoTramite($idTramite, $idCorreo) {
		if ($idCorreo != "") {
			$sql = "SELECT * FROM tramites_correos_archivos WHERE idTramite = $idTramite AND idCorreo = $idCorreo";
			$q = $this->db->query($sql);

			return $q->result();
		}
		else {
			return false;
		}
	}

	function checkUrlFile($archivo, $idCorreo) {
		$sql = "SELECT * FROM tramites_correos_archivos WHERE archivo LIKE '%$archivo%' AND idCorreo = $idCorreo LIMIT 1";
		$q = $this->db->query($sql);

		return $q->row();
	}

	function checkUrlFileDocumento($archivo, $idTramite, $idTramiteIniciado) {
		$sql = "SELECT * FROM tramites_documentos_archivos WHERE archivo LIKE '%$archivo%' AND idTramite = $idTramite AND idTramiteIniciado = $idTramiteIniciado LIMIT 1";
		$q = $this->db->query($sql);

		return $q->row();
	}

	function getFileCorreoById($id) {
		$sql = "SELECT * FROM tramites_correos_archivos WHERE id = $id";
		$q = $this->db->query($sql);

		return $q->row();
	}

	function getNumDocumentsBytramite($idTramite) {
		$sql="SELECT COUNT(*) as numFiles FROM tramites_documentos WHERE idTramite=$idTramite";
		$q = $this->db->query($sql);
		return $q->row();
	}

	function getTramitesIniciados() {
		$sql="
			SELECT
				ti.id AS id,
				t.nombre AS nombre,
				t.id AS idTramite,
				(SELECT nombre FROM categorias WHERE id=t.idCategoria) AS nombreCategoria,
				(SELECT nombre FROM subcategorias WHERE id=t.idSubCategoria) AS nombreSubCategoria,
				ti.documentosTramite AS documentosTramite,
				ti.documentosSubidos AS documentosSubidos,
				ti.emailUsuario AS emailUsuario,
				ti.estatus AS estatus,
				ti.creado AS creado
			FROM
				tramites t,
				tramites_iniciados ti
			WHERE
				t.id=ti.idTramite
		";

		$q = $this->db->query($sql);
		return $q->result();
	}

	function getComboArchivosTramites($tipo) {
		$sql = "SELECT * FROM archivos WHERE tipo=$tipo";
		$q=$this->db->query($sql);

		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;

			$q->free_result();
			return $options;
		}
	}

	function getDocumentosReglas($idTramite, $idRegla) {
		$sql = "SELECT GROUP_CONCAT(idArchivo) AS ids FROM tramites_reglas_documentos WHERE idTramite=$idTramite AND idRegla=$idRegla";
		$q = $this->db->query($sql);
		$ids = $q->row();

		if ($ids->ids != "") {
			$sql = "SELECT GROUP_CONCAT(nombre) AS nombres FROM archivos WHERE id IN (".$ids->ids.")";
			$q = $this->db->query($sql);
			return $q->row();
		}
		else return false;
	}

	function getCorreoArchivosTramite($idTramite, $idCorreo) {
		$q = $this->db->get_where("tramites_correos_archivos", array("idTramite"=>$idTramite, "idCorreo"=>$idCorreo));
		return $q->result();
	}
}
