<?php 
class usuarios_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function login($user, $password) {
		$sql="SELECT * FROM usuarios WHERE usuario=? AND password=? AND activo=? limit 1";
		$q=$this->db->query($sql, array($user, $password, 1));
		
		return ($q->num_rows() > 0) ? $q->row() : false;		
	}
	
	function getAllUsers() {
		$sql="SELECT *, (SELECT nombre FROM horarios WHERE id=u.idHorario) AS horario FROM usuarios u ORDER BY u.nombre ASC";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
				
			$q->free_result();
			return $data;
		}
	}
	
	function checkUser($id) {
		$sql="SELECT * FROM usuarios WHERE id=?";
		$q=$this->db->query($sql, array($id));
		
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
}	