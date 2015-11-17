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
		$sql = "SELECT *, (SELECT nombre FROM categorias WHERE id = tramites.idCategoria) AS nombreCategoria, (SELECT nombre FROM subcategorias WHERE id = tramites.idSubCategoria) AS nombreSubCategoria FROM tramites";
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

	function getArchivosTramites() {
		$sql="
			SELECT
			    ta.id AS id,
			    ta.idTramite AS idTramite,
			    ta.archivo AS archivo,
			    ta.tipo AS tipo,
			    ta.descripcion AS descripcion,
			    ta.creado AS creado,
			    ta.modificado AS modificado,
			    (SELECT nombre FROM tramites WHERE id = ta.idTramite) AS nombreTramite
			FROM
			    tramites_archivos ta
		";
		$q=$this->db->query($sql);
		return $q->result();
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
}
