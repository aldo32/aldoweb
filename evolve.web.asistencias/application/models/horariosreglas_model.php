<?php 
class horariosreglas_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getAll() {
		$sql="SELECT *, (SELECT nombre FROM horarios WHERE id=u.idHorario) AS nombreHorario FROM horariosreglas u";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
			
	function checkHorariosregla($id) {
		$sql="SELECT *, (SELECT nombre FROM horarios WHERE id=h.idHorario) AS nombreHorario FROM horariosreglas h WHERE h.id=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}		
	
}	