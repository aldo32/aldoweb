<?php 
class etapas_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function checkEtapa($id) {
		$sql="SELECT * FROM etapas WHERE id=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
}	