<?php 
class permisos_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
			
	function checkPermiso($id) {
		$sql="SELECT * FROM permisos WHERE id=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}		
	
}	