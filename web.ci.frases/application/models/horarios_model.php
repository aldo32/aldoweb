<?php 
class horarios_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getComboHorario() {
		$sql="SELECT * FROM horarios";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			$options[-1]="Seleccione un horario";
				
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;
		
			$q->free_result();
			return $options;
		}
	}
	
	function checkHorario($id) {
		$sql="SELECT * FROM horarios WHERE id=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function verifyUsersInHorario($id) {
		$sql="SELECT * FROM usuarios WHERE idHorario=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function verifyLlegadasInHorario($id) {
		$sql="SELECT * FROM llegadas WHERE idHorario=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function verifyReglasInHorario() {
		$sql="SELECT * FROM horariosreglas WHERE idHorario=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	
}	