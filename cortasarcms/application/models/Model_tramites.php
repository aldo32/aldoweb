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
}
