<?php 
class Model_pop extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getPop($id) {
		$sql="
			SELECT 
				*, 
				(SELECT nombre FROM cadenascat WHERE id = pop.idCadena) AS nombreCadena 
			FROM 
				pop 
			WHERE 
				determinanteGSP=?";
		$q=$this->db->query($sql, array($id));
	
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function getVisitasDeterminanteGSP($determinanteGSP, $idProyecto) {
		$sql="
			SELECT 
				*, 
				(SELECT CONCAT(nombre,' ',apat,' ',amat) FROM usuarios WHERE id=visitas.idUsuario) AS nombreUsuario 
			FROM 
				visitas 
			WHERE 
				determinanteGSP = ? AND
				idProyecto = ?
				ORDER BY fecha DESC LIMIT 5;
		";		
		$q=$this->db->query($sql, array($determinanteGSP, $idProyecto));
		
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
	
	function getRespuestasPreguntas($idProyecto, $determinanteGSP, $fecha, $idUsuario) {						
		$sql = "
			SELECT 
				r.Determinante AS determinanteGSP,
				r.Fecha AS fecha,
				r.idPregunta AS idPregunta,
				r.idRespuesta AS idrespuesta,
				r.idUsuario AS idUsuario,
				GROUP_CONCAT(r.RespuestaAbi SEPARATOR ',') AS respuestas,
				m.tipo AS tipoPregunta,
				m.nombre AS pregunta				
			FROM 
				respuestaspocofreq r,
				movilformulariospreguntas m
			WHERE 
				r.idProyecto = m.idProyecto AND
				r.idPregunta = m.id AND
				r.idProyecto = $idProyecto AND 
				r.Determinante = $determinanteGSP AND
				DATE(r.fecha) = DATE('$fecha') AND
				r.idUsuario = $idUsuario
				GROUP BY r.idPregunta		
		";		
		$q=$this->db->query($sql);
		
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
	
	function getFotosvisita($idProyecto, $determinanteGSP, $fecha, $idUsuario) {
		$sql="
			SELECT 
				* 
			FROM 
				fotos 
			WHERE 
				idProyecto=$idProyecto AND 
				idUsuario=$idUsuario AND 
				determinanteGSP=$determinanteGSP AND 
				DATE(fecha)=DATE('$fecha') 
				ORDER BY fecha DESC
		";
		
		$q=$this->db->query($sql);		
		if ($q->num_rows() > 0) {
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
	
	function getVisitaById($idVisita) {
		$sql="SELECT * FROM visitas WHERE id = $idVisita";
		$q=$this->db->query($sql);
		
		return ($q->num_rows() > 0) ? $q->row() : false;
	}
	
	function getFotosTienda($idProyecto, $determinanteGSP) {
		$sql = "SELECT * FROM fotos WHERE idProyecto=$idProyecto AND determinanteGSP=$determinanteGSP ORDER BY fecha DESC LIMIT 12";
		$q=$this->db->query($sql);
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}		
	}
	
	function getSondeostienda($idProyecto, $determinanteGSP) {
	$sql = "
			SELECT 
				r.Determinante AS determinanteGSP,
				r.Fecha AS fecha,
				r.idPregunta AS idPregunta,
				r.idRespuesta AS idrespuesta,
				r.idUsuario AS idUsuario,
				GROUP_CONCAT(r.RespuestaAbi SEPARATOR ',') AS respuestas,
				m.tipo AS tipoPregunta,
				m.nombre AS pregunta				
			FROM 
				respuestaspocofreq r,
				movilformulariospreguntas m
			WHERE 
				r.idProyecto = m.idProyecto AND
				r.idPregunta = m.id AND
				r.idProyecto = $idProyecto AND 
				r.Determinante = $determinanteGSP				
				GROUP BY r.idPregunta		
		";		
		$q=$this->db->query($sql);
		
		if ($q->num_rows() > 0)
		{
			foreach ($q->result() AS $row)
				$data[]=$row;
		
			$q->free_result();
			return $data;
		}
	}
}	