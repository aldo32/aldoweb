<?php
class general_library {
	function dateFormat($FechaStamp)
	{
		$FechaStamp=strtok($FechaStamp, " ");
		$temp=explode("-", $FechaStamp);
		$year=$temp[0]; $month=$temp[1]; $day=$temp[2];
			
		if ($year=="0000")
			return "-";
	
		$day=date("w", mktime(0, 0, 0, $month, $day, $year));
		switch($day)
		{
			case 0: $dialetra="Domingo"; break;
			case 1: $dialetra="Lunes"; break;
			case 2: $dialetra="Martes"; break;
			case 3: $dialetra="Miércoles"; break;
			case 4: $dialetra="Jueves"; break;
			case 5: $dialetra="Viernes"; break;
			case 6: $dialetra="Sábado"; break;
		}
		switch($month)
		{
			case '01': $mesletra="Enero"; break;
			case '02': $mesletra="Febrero"; break;
			case '03': $mesletra="Marzo"; break;
			case '04': $mesletra="Abril"; break;
			case '05': $mesletra="Mayo"; break;
			case '06': $mesletra="Junio"; break;
			case '07': $mesletra="Julio"; break;
			case '08': $mesletra="Agosto"; break;
			case '09': $mesletra="Septiembre"; break;
			case '10': $mesletra="Octubre"; break;
			case '11': $mesletra="Noviembre"; break;
			case '12': $mesletra="Diciembre"; break;
		}
		return "$temp[2] de $mesletra, $year";
	}
}