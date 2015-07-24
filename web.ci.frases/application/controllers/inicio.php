<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {
	
	var $sessionData;
	
	function __construct() {
		parent::__construct();
		
		$this->load->model("usuarios_model");
		$this->load->model("horarios_model");
		$this->load->model("grupos_model");
		$this->load->library("general_library");					
	}
	
	public function index() {		
		/*check session*/
		$this->sessionData = $this->session->all_userdata();
		if ($this->sessionData["user_data"] == "") { redirect("login"); }
		
		$usuario = $this->sessionData["user_data"];
		$data = $this->general($usuario);																			
		
		/*Get stages by User*/
		$llegadasUsuario = $this->usuarios_model->getLlegadasUsuario($usuario->id);
		$data["llegadasUsuario"] = $llegadasUsuario;				
		$data["usuario"] = $usuario;
		
		$this->load->view('inicio_view', $data);
	}
	
	//Type 0: only current day		1: All data
	function loadDataAssists($type=0) {		
		if ($type == 1) {
			/*delete all registers form table llegadas*/
			$this->db->truncate("llegadas");
			$this->db->truncate("retardos");
			
			/* get all registers from entradas */
			$query = $this->db->get('entrada');
			$entradas = $query->result();			
		}
		else {
			/*get registers from entradas only current Day*/
			$maxDate = $this->usuarios_model->getLastDateEntrada();			
			$entradas = $this->usuarios_model->genEntradasByCurrentDay($maxDate->fecha);			
		}					
		
		/*remove registers duplicates in the same date*/
		$dataRegisters = array();		
		
		if (isset($entradas)) {
			$i=0;
			foreach ($entradas AS $row) {
				$tmp = strtotime($row->Time);
				$date = date("Y-m-d", $tmp);
				
				if (!in_array($date."_".$row->No, $dataRegisters)) {										
					array_push($dataRegisters, $date."_".$row->No);						
				} else {
					unset($entradas[$i]);
				}
				
				$i++;
			}
		}
		
		$entradas = (isset($entradas)) ? array_values($entradas) : null;					
		
		if (isset($entradas)) {
			foreach ($entradas AS $entrada) {
				/*get info from user*/
				$usuario = $this->usuarios_model->checkUser($entrada->No);								
				
				/*get info from horario*/				
				$horario = $this->horarios_model->checkHorario($usuario->idHorario);						

				/*get hour of checkin*/
				$tmp = explode(" ", $horario->nombre);				
				$tmp = strtotime($tmp[1]);
				$horaEntrada = date("H:i:s", $tmp); 
				
				/*get stages and groups which the user belong */						
				$query = $this->db->get_where("gruposetapasusuarios", array('idUsuario'=>$entrada->No));
				$geus = $query->result();

				/*check if the user have a permission*/							
				$permisoUsuario = $this->usuarios_model->getPermissionByIdUsuario($usuario->id, strtok($entrada->Time, " "));
				if ($permisoUsuario) { $register["permiso"] = $permisoUsuario->id; } else { $register["permiso"]=0; }
				
				//echo $usuario->id." - ".$entrada->Time." - ".$register["permiso"]."<br>";
				$invert = "";
				$diffTime = "";
				$permisoRetardo = "";
				
				foreach ($geus AS $geu) {
					//echo $geu->idUsuario." - ".$register["permiso"]."<br>";
					$register["idEtapa"] = $geu->idEtapa;
					$register["idGrupo"] = $geu->idGrupo;
					$register["idUsuario"] = $geu->idUsuario;
					$register["idHorario"] = $horario->id;
					$register["hrLlegada"] = $entrada->Time;
					
					//get time from hrllegada7
					$time = strtotime($entrada->Time);
					$time = date("H:i:s", $time);																																								
					
					/*initialize diferenciaMin y multa*/
					$register["diferenciaMin"] = "";
					$register["multa"] = "";
					
					
					//Calculating the fin, this, if the user not have permission					
					if ($register["permiso"] === 0) {								
						//echo "calcula multa para:".$geu->idUsuario." para fecha ".$entrada->Time."<br>";		
						//get value of fin in the table horariosreglas																	
						$regla = $this->usuarios_model->getHorarioRegla($register["idHorario"], $time);
						
						//get minutes of the rest¿						
						$time = date('H:i:s', round(strtotime($time)/60)*60);						
						$time1 = new DateTime($horaEntrada);						
						$time2 = new DateTime($time);
						$res = date_diff($time2, $time1);		
										
						$register["diferenciaMin"] = ($res->invert == 1) ? $res->h.":".$res->i.":".$res->s : 0;											
						$register["multa"] = ($res->h > 0) ? ((($res->h*60)+$res->i) * $regla->multa) : ($res->i * $regla->multa);

						$invert = $res->invert;
						$diffTime = $res;
						$permisoRetardo = $register["permiso"];
					}
					
					//Calculating time acomulated from all stage
					$register["acumuladoTiempo"]="00:00:00";										
					
					//validar entes de insertar registros duplicados con etapa, grupo y usuario									
					$resTmp = $this->usuarios_model->checkRegisterDuplicateLlegadas($register["idEtapa"], $register["idGrupo"], $register["idUsuario"], $register["hrLlegada"]);														
					
					if (!$resTmp) {
						$this->db->insert("llegadas", $register);
					}	
									
				}										
			}													
			
			echo "Listo, se insertaron los registros en la tabla llegadas<br><br>";						
		}
		else {
			echo "No hay entradas <br><br>";
		}
				
		/*Insert register empty with fin for not check in the date*/
		$this->insertRegisterBlankInLlegadas();
		
		/*Insert delay in the BD*/
		$this->insertRegisterInDelays();
	}
	
	function insertRegisterBlankInLlegadas() {
		$register = array();
		
		/*get all active users*/		
		$query = $this->db->get_where("usuarios", array("activo"=>1));
		$usuarios = $query->result();				
		
		/*get dates checks*/
		$dates = $this->usuarios_model->getDatesFromEntradas();				
		
		foreach ($usuarios AS $usuario) {								
			foreach ($dates AS $date) {								
				$llegada = $this->usuarios_model->checkLlegadaUsuario($usuario->id, $date->fecha);				
				
				if (!$llegada) {
					//echo "<br>inserter registro multa a ".$usuario->id." con fecha ".$date->fecha;
					/*get stages and groups which the user belong */
					$query = $this->db->get_where("gruposetapasusuarios", array('idUsuario'=>$usuario->id));
					$geus = $query->result();
					
					/*get info from horario*/
					$horario = $this->horarios_model->checkHorario($usuario->idHorario);
					
					/*check if the user have a permission*/									
					$permisoUsuario = $this->usuarios_model->getPermissionByIdUsuario($usuario->id, $date->fecha);					
										
					if (isset($permisoUsuario->id)) { $register["permiso"] = $permisoUsuario->id; } else { $register["permiso"]=0; }														
					
					foreach ($geus AS $geu) {
						//add 3 hours to time 
						$tmp = strtotime($horario->hora);
						$horaEntrada = date("H:i:s", $tmp);
						
						$time = date('H:i:s', strtotime($horaEntrada. ' + 3 Hours'));	

						$register["idEtapa"] = $geu->idEtapa;
						$register["idGrupo"] = $geu->idGrupo;
						$register["idUsuario"] = $geu->idUsuario;
						$register["idHorario"] = $horario->id;
						$register["hrLlegada"] = $date->fecha." ".$time;
						
						/*initialize diferenciaMin y multa*/
						$register["diferenciaMin"] = "";
						$register["multa"] = "";
						
						if ($register["permiso"] === 0) {
							/*get value of fin in the table horariosreglas*/
							$regla = $this->usuarios_model->getHorarioRegla($register["idHorario"], $time);
							
							/*get minutes of the rest*/
							$time1 = new DateTime($horaEntrada);
							$time2 = new DateTime($time);
							$res = date_diff($time2, $time1);						
							$register["diferenciaMin"] = ($res->invert == 1) ? $res->h.":".$res->i.":".$res->s : 0;
							$register["multa"] = ($res->h > 0) ? ((($res->h*60)+$res->i) * $regla->multa) : ($res->i * $regla->multa);
						}												
						
						$register["acumuladoTiempo"]="00:00:00";
						
						$this->db->insert("llegadas", $register);
					}					
				}
			}			
						
		}		
	}
	
	function insertRegisterInDelays() {
		//Insert in retardos
		$usuarios = $this->usuarios_model->getLlegadasAll();
		$usuariosCorreo = array();
		$i=0;
		
		if (isset($usuarios)) {
			foreach ($usuarios AS $row) {
				if ($row->permiso == 0 && $row->minutosTarde >= 1) {									
					
					$retardos = "";
					if ($row->minutosTarde >= 1 && $row->minutosTarde <= 10) {
						$retardos['tipo'] = 1;
					}
					if ($row->minutosTarde >= 11) {
						$retardos['tipo'] = 2;
					}
			
					$retardos['idUsuario'] = $row->idUsuario; 
					$retardos['idHorario'] = $row->idHorario;
					$retardos['fecha'] = $row->hrLlegada;
			
					$this->db->insert("retardos", $retardos);

					$usuario = $this->usuarios_model->checkUser($row->idUsuario);
					$usuariosCorreo[$i]["nombre"] = $usuario->nombre;
					$usuariosCorreo[$i]["fecha"] = $row->hrLlegada;
					$usuariosCorreo[$i]["tipo"] = ($retardos["tipo"] == 1) ? "Retardo" : "Falta";
					
					$i++;
				}		
			}						
		}		
	}
	
	
	
	function showChartDataUser() {
		$idUsuario = $this->input->post("idUsuario");
		$idEtapa = $this->input->post("idEtapa");
		$type = $this->input->post("type");		
		
		switch ($type) {
			case '1':
				/*last week*/				
				$llegadasSemana = $this->usuarios_model->llegadasUltimaSemana($idEtapa);
				$dataSemana = "";
				$x="";
				
				if (isset($llegadasSemana)) {
					$dataSemana = "[";
					$x="";
					$i=0;
					foreach ($llegadasSemana AS $row) {
						$dataSemana .= "{name: '".strtok($row->nombreUsuario, " ")."', minutos: ".$row->minutosTarde."},";
						if ($row->idUsuario == $idUsuario) { $x=$i; }
						$i++;
					}
					$dataSemana .= "]";
				}
				
				?>
					// BAR CHART
			        var lastWeek = Morris.Bar({
						element: 'lastWeek',
						data: <?php echo $dataSemana?>,
					  	xkey: 'name',
					  	ykeys: ['minutos'],
					  	labels: ['Minutos'],			  	
					  	gridTextSize: 8, 
					  	barRatio: 0.4,
					  	xLabelAngle: 90,
					  	hideHover: 'auto',
					  	 barColors: function (row, series, type) {
						 	if (row.x == <?php echo $x;?>) {
							 	return '#000000';
						 	}
						 	else { return '#A4A687'; }
					  		
					  	 }
					});
				<?php 
				break;
				
			case '2':
				/*Grafica ultimo mes*/
				$llegadasMes = $this->usuarios_model->llegadasUltimoMes($idEtapa);
				$dataMes = "";
				$m="";
				
				if (isset($llegadasMes)) {
					$dataMes = "[";
					$m="";
					$i=0;
					foreach ($llegadasMes AS $row) {
						$dataMes .= "{name: '".strtok($row->nombreUsuario, " ")."', minutos: ".$row->minutosTarde."},";
						if ($row->idUsuario == $idUsuario) { $m=$i; }
						$i++;
					}
					$dataMes .= "]";
				}
				
				?>
				// BAR CHART
		        var lastMonth = Morris.Bar({
					element: 'lastMonth',
					data: <?php echo $dataMes?>,
				  	xkey: 'name',
				  	ykeys: ['minutos'],
				  	labels: ['Minutos'],			  	
				  	gridTextSize: 8, 
				  	barRatio: 0.4,
				  	xLabelAngle: 90,
				  	hideHover: 'auto',
				  	 barColors: function (row, series, type) {
					 	if (row.x == <?php echo $m;?>) {
						 	return '#000000';
					 	}
					 	else { return '#E6D1A1'; }
				  		
				  	 }
				});
				<?php 
				break;
				
			case '3':
				/*Grafica ultimo año*/
				$llegadasAño = $this->usuarios_model->llegadasUltimoAño($idEtapa);
				$dataAño = "";
				$y="";
				
				if (isset($llegadasAño)) {
					$dataAño = "[";
					$y="";
					$i=0;
					foreach ($llegadasAño AS $row) {
						$dataAño .= "{name: '".strtok($row->nombreUsuario, " ")."', minutos: ".$row->minutosTarde."},";
						if ($row->idUsuario == $idUsuario) { $y=$i; }
						$i++;
					}
					$dataAño .= "]";
				}
				
				?>
				// BAR CHART
		        var lastYear = Morris.Bar({
					element: 'lastYear',
					data: <?php echo $dataAño?>,
				  	xkey: 'name',
				  	ykeys: ['minutos'],
				  	labels: ['Minutos'],			  	
				  	gridTextSize: 8, 
				  	barRatio: 0.4,
				  	xLabelAngle: 90,
				  	hideHover: 'auto',
				  	 barColors: function (row, series, type) {
					 	if (row.x == <?php echo $y;?>) {
						 	return '#000000';
					 	}
					 	else { return '#FF5B64'; }
				  		
				  	 }
				});
				<?php 
				break;
		}
	}
		

	function getChartByStage() {
		$session = $this->session->all_userdata();				
		$idEtapa = $this->input->post("idEtapa");
		$usuario = $session["user_data"];				
		$entradas = $this->usuarios_model->getLlegadasEtapasGrupos($idEtapa);				
		$g="'xx'";
		$data="";
		$nombresString = "";
		
		if (isset($entradas)) {						
			$data = "[";			
			$i=0;
			$n=0;
			foreach ($entradas AS $row) {								
				//echo "idEntapa: ".$idEtapa."  -  idGrupo: ".$row->idGrupo."  -  idUsuario: ".$usuario->id;								
				$etapaGrupoUsuario = $this->usuarios_model->chekUserInGruposEtapasUsuarios($idEtapa, $row->idGrupo, $usuario->id);	
				$usuariosPorGrupo = $this->usuarios_model->usuariosPorGrupo($row->idGrupo, $idEtapa);															
				
				if (isset($usuariosPorGrupo)) {
					$nombresString .= "<tr><td>".$row->nombreGrupo.":</td>";
					foreach ($usuariosPorGrupo AS $nombres) {
						$nombresString .= "<td>".$nombres->nombreUsuario."</td>";
					}
					$nombresString .= "</tr>";
				}
				
				$data .= "{name: '".$row->nombreGrupo."', minutos: ".$row->minutosTarde."},";
				if ($etapaGrupoUsuario) { $g=$i; }
				$i++;
				$n++;
			}
			$data .= "]";			
		}
		
		if ($data != "") {			
			?>
			$("#nombresGrupos").html("<table width='550'><?php echo $nombresString?></table>");
			
			var lastYear = Morris.Bar({
				element: 'etapaGrupos',
				data: <?php echo $data?>,
			  	xkey: 'name',
			  	ykeys: ['minutos'],
			  	labels: ['Minutos'],			  	
			  	gridTextSize: 8, 
			  	barRatio: 0.4,
			  	xLabelAngle: 90,
			  	hideHover: 'auto',
			  	 barColors: function (row, series, type) {
				 	if (row.x == <?php echo $g;?>) {
					 	return '#000000';
				 	}
				 	else { return '#A7527F'; }
			  		
			  	 }
			});
			<?php 
		} else {
			?>
			alert("No hay datos para mostrar la grafica");		
			<?php
		}		
	}

	function test() {
		$textCorreoRetardo = "
		<html>
			<head>
				<title>Avisos Evolve</title>
			</head>
			
			<style>
				#logo { width: 200px; height: 100px; margin: 0 auto;  }
				#content { width: 500px; height: 250px; margin: 0 auto; font-family: arial;  }
			</style>
		
			<body>
				<div id='logo'><img src='http://checador.evolve.com.mx/resources/img/logo-evo.png' width='200' height='100' /></div>
				<br><br>
				<div id='content'>
					Hola <strong>xxxxx</strong> <br><br>
					Te recordamos que realices tu registro de entrada, ya que si no lo haces seras acreedor a un retardo, 
					recuerda que tres retardos equivalen a una falta y si llegas 10 minutas despu&eacute;s de la tolerancia se tomar&aacute; como falta.
		 			<br><br>
				<strong>Gracias</strong>
				</div>
			</body>	
		</html>
		";
		
		$this->general_library->sendMail("isc.aldo@evolve.com.mx", "isc.aldo@gmail.com, isc.aldo@hotmail.com", $textCorreoRetardo, "Titulo de prueba", "Subject de prueba", "");
	}	
	
	function insert() {
		$user["userid"] = rand(1, 100);
		$user["name"] = "aldo".rand(101, 200);
		
		$this->db->insert("odbc_users", $user);
		
		if (rand(1,2) == 1) {
			echo json_encode(array("status"=>"ok"));
		}
		else {
			echo json_encode(array("status"=>"error"));
		}
	}

	function json() {
		$tmp = array(
			array("nombre"=>"Nombre 1", "empresa"=>"Nintendo1", "fecha"=>"2015-04-04"),
			array("nombre"=>"Nombre 2", "empresa"=>"Xbox1", "fecha"=>"2015-04-05"),
			array("nombre"=>"Nombre 3", "empresa"=>"Nintendo2", "fecha"=>"2015-04-06"),
			array("nombre"=>"Nombre 4", "empresa"=>"Xbox2", "fecha"=>"2015-04-07"),
			array("nombre"=>"Nombre 5", "empresa"=>"Nintendo3", "fecha"=>"2015-04-08"),
			array("nombre"=>"Nombre 6", "empresa"=>"Xbox3", "fecha"=>"2015-04-09"),		
		);

		echo json_encode($tmp);
	}
	
	function general($session) {	
		$info["session"] =  $session;		
					
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);
		
		$data["comboEtapas"] = $this->grupos_model->getComboEtapas();
		
		return $data;
	}
	
}
