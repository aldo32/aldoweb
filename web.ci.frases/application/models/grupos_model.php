<?php 
class grupos_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function checkGrupo($id) {
		$sql="SELECT * FROM grupos WHERE id=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function getAll() {
		$sql="SELECT *, (SELECT nombre FROM etapas WHERE id=g.idEtapa) AS etapa FROM grupos g ORDER BY g.nombre DESC";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
	
	function getComboEtapas() {
		$sql="SELECT * FROM etapas";
		$q=$this->db->query($sql);
			
		if ($q->num_rows() > 0)
		{
			$options[-1]="Seleccione una etapa";
	
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;
	
			$q->free_result();
			return $options;
		}
	}
	
	function getComboGruposByIdEtapa($idEtapa) {
		$sql="SELECT * FROM grupos WHERE idEtapa = ?";
		$q=$this->db->query($sql, array($idEtapa));
			
		if ($q->num_rows() > 0)
		{
			//$options[-1]="Seleccione una etapa";
	
			foreach ($q->result() AS $row)
				$options[$row->id]=$row->nombre;
	
			$q->free_result();
			return $options;
		}
	}
}	