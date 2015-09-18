<?php
class Model_graficas extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getGroupsKpi ($idProyecto) {
		$sql="SELECT kpiGrupo FROM movilformulariospreguntas WHERE idProyecto=? ANd kpiGrupo != ' ' GROUP BY kpiGrupo";
        $q=$this->db->query($sql, array($idProyecto));

		if ($q->num_rows() > 0)
		{
			$options[""] = "Seleccione un grupo";
			foreach ($q->result() AS $row)
				$options[$row->kpiGrupo]=$row->kpiGrupo;

			$q->free_result();
			return $options;
		}
	}

	function getQuestionsData($idProyecto, $determinanteGSP, $fechaInicio, $fechaFin, $idGrupoKpi) {
		//checar respuestas para preguntas compuestas
		echo $sql="
			SELECT
				p.id AS idPregunta,
				p.idProyecto AS idProyecto,
				p.nombre AS pregunta,
				r.idRespuesta AS idRespuesta,
				SUM(r.RespuestaNum) AS respuestaNum,
				SUM(r.RespuestaBool) AS respuestaBool
			FROM
				respuestaspocofreq r,
				movilformulariospreguntas p
			WHERE
				r.idPregunta = p.id AND
				r.idProyecto = p.idProyecto AND
				p.kpi = 1 AND
				p.idProyecto=$idProyecto AND
				r.Determinante=$determinanteGSP AND
				r.Fecha >= '$fechaInicio' AND r.Fecha <= '$fechaFin' AND
				p.kpiGrupo = '$idGrupoKpi'
				GROUP BY p.nombre
		";
	}
}
