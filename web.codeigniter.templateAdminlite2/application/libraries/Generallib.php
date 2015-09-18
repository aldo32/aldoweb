<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generallib {
	/*library functions*/
	function fechaBDTexto($fecha_bd,$completo=1){
		if($fecha_bd!=""){
			$ano = substr($fecha_bd,0,4);
			$mes = substr($fecha_bd,5,2);
			$dia = substr($fecha_bd,8,2);
			$hr = substr($fecha_bd,11,2);
			$min = substr($fecha_bd,14,2);
			$seg = substr($fecha_bd,17,2);
			if($hr!=""){
				$horario = "am";
				if($hr >= 12) $horario = "pm";
				if($hr > 12) $hr -= 12;
	
				if($completo) $fecha = "$dia de ".$this->sacaMes($mes)." de $ano, a las $hr:$min $horario";
				else $fecha = "$dia/".substr($this->sacaMes($mes),0,3)."/$ano, $hr:$min$horario";
								
			}else{
				if($completo) $fecha = "$dia de ".$this->sacaMes($mes)." de $ano";
				else $fecha = "$dia/".substr($this->sacaMes($mes),0,3)."/$ano";				
			}
		}else{
			$fecha = "Sin fecha";			
		}
	
		return $fecha;
	}
	
	function sacaMes($dato){
		switch($dato){
			case 1: $xx="Enero"; break;
			case 2: $xx="Febrero"; break;
			case 3: $xx="Marzo"; break;
			case 4: $xx="Abril"; break;
			case 5: $xx="Mayo"; break;
			case 6: $xx="Junio"; break;
			case 7: $xx="Julio"; break;
			case 8: $xx="Agosto"; break;
			case 9: $xx="Septiembre"; break;
			case 10: $xx="Octubre"; break;
			case 11: $xx="Noviembre"; break;
			case 12: $xx="Diciembre"; break;
		}		
		return @$xx;
	}
}