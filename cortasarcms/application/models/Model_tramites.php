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
}
?>
