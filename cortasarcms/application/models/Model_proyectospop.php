<?php 
class Model_proyectospop extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getProyectoPop($id) {
		$sql="SELECT * FROM proyectospop WHERE id=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function getPopProyectoPop ($idProyectoPop) {
		$sql="
			SELECT 
	       		*,
	       		(SELECT nombre FROM cadenascat WHERE id = p.idCadena LIMIT 1) AS nombreCadena,
	       		(SELECT estado FROM ciudades WHERE idEstado = p.idEstado LIMIT 1) AS nombreEstado,
	       		(SELECT ciudad FROM ciudades WHERE idCiudad = p.idCiudad LIMIT 1) AS nombreCiudad,
	       		(SELECT nombre FROM gruposcat WHERE id = p.idGrupo LIMIT 1) AS nombreGrupo,
	       		(SELECT nombre FROM cadenascat WHERE id = p.idCadena LIMIT 1) AS nombrecadena,
	       		(SELECT nombre FROM formatoscat WHERE id = p.idFormato LIMIT 1) AS nombreFormato, 
	       		(SELECT nombre FROM regiones WHERE id = pp.idRegion LIMIT 1) AS nombreRegion,
	       		(SELECT nombre FROM canalescat WHERE id = pp.idCanal LIMIT 1) AS nombrecanal
       		FROM 
       			pop p, proyectospop pp 
       		WHERE 
            	p.determinanteGSP = pp.determinanteGSP AND 
            	pp.id = $idProyectoPop	
		";
		
		$q=$this->db->query($sql, array($idProyectoPop));
		
		return ($q->num_rows() > 0) ? $q->row() : false;
	}	
}	