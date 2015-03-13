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
}	