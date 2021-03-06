<?php
class general_library {
	private $CI;
	
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
	
	/**
	 * General lb - sendMail
	 * Envia un correo con protocolo SMTP al email definido en los parametros
	 *
	 * @param {string} $from_string Email de quien lo envia
	 * @param {string} $mail_string Email destino
	 * @param {string} $message_string Mensaje para el correo
	 * @param {string} $title_string Titulo del mensaje
	 * @param {string} $subjet_string Subjet del mensaje
	 * @param {string} $attach_string Ruta el archivo que se va a djuntar
	 *
	 * @return	Array
	 * @author	Aldo Marañon Andrade
	 * @version	1.0
	 * @since	2013-07-17
	 */
	function sendMail($from_string, $mail_string, $message_string, $title_string, $subjet_string, $attach_string) {
		/*
		 * Se carga la libreria Email
		 * */
		$this->CI =& get_instance();
		$this->CI->load->library('email');
	
		/*
		 * Array de configuracion para inicializar la libreria email
		* */
		$configEmail_array['protocol']    = 'smtp';
		$configEmail_array['smtp_host']    = 'ssl://smtp.gmail.com';
		$configEmail_array['smtp_port']    = '465';
		$configEmail_array['smtp_timeout'] = '7';
		$configEmail_array['smtp_user']    = 'isc.aldo@evolve.com.mx';
		$configEmail_array['smtp_pass']    = 'aldoma32';
		$configEmail_array['charset']    = 'utf-8';
		$configEmail_array['newline']    = "\r\n";
		$configEmail_array['mailtype'] = 'html'; // or html
		$configEmail_array['validation'] = TRUE; // bool whether to validate email or
	
		/*
		 * Inicializando libreria con la configuración anterior
		 * */
		$this->CI->email->initialize($configEmail_array);

		/*
		* Pasando datos de envio
		* */
		$this->CI->email->from('isc.aldo@evolve.com.mx', $title_string);
		$this->CI->email->to($mail_string);
		$this->CI->email->cc('');
		$this->CI->email->bcc('');
		$this->CI->email->subject($subjet_string);
		$this->CI->email->message($message_string);

		/*
		* Si $attach_string no esta vacio se agrega a los datos de envio para el correo
		* */
		if ($attach_string != "") {
			$this->CI->email->attach($attach_string);
		}
			

		/*
		* Enviando correo
		* */
		return $this->CI->email->send();
	}
}
