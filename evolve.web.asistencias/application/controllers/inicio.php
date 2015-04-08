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
			
			/* get all registers from entradas */
			$query = $this->db->get('entrada');
			$entradas = $query->result();
		}
		else {
			/*get registers from entradas only current Day*/
			$entradas = $this->usuarios_model->genEntradasByCurrentDay();
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
				
				foreach ($geus AS $geu) {
					$register["idEtapa"] = $geu->idEtapa;
					$register["idGrupo"] = $geu->idGrupo;
					$register["idUsuario"] = $geu->idUsuario;
					$register["idHorario"] = $horario->id;
					$register["hrLlegada"] = $entrada->Time;
					
					/*get time from hrllegada*/
					$time = strtotime($entrada->Time);
					$time = date("H:i:s", $time);					
					
					/*check if the user have a permission*/					
					$permisoUsuario = $this->usuarios_model->getPermissionByIdUsuario($geu->idUsuario);
					if (isset($permisoUsuario->id)) { $register["permiso"] = $permisoUsuario->id; } else { $register["permiso"]=0; }													
														
					/*Calculating the fin, this, if the user not have permission*/
					if ($register["permiso"] == 0) {
						/*get value of fin in the table horariosreglas*/																	
						$regla = $this->usuarios_model->getHorarioRegla($register["idHorario"], $time);
						
						/*get minutes of the rest*/
						$time1 = new DateTime($horaEntrada);
						$time2 = new DateTime($time);
						$res = date_diff($time2, $time1);
						$register["diferenciaMin"] = ($res->invert == 1) ? $res->h.":".$res->i.":".$res->s : 0;
						$register["multa"] = ($res->h > 0) ? ((($res->h*60)+$res->i) * $regla->multa) : ($res->i * $regla->multa);																		 
					}
					
					/*Calculating time acomulated from all stage*/
					$register["acumuladoTiempo"]="00:00:00";
					
					/*validar entes de insertar registros duplicados con etapa, grupo y usuario*/					
					$resTmp = $this->usuarios_model->checkRegisterDuplicateLlegadas($register["idEtapa"], $register["idGrupo"], $register["idUsuario"], $register["hrLlegada"]);
					
					if (!$resTmp) {
						$this->db->insert("llegadas", $register);
					}					
				}			
								
			}
			
			//Check if existe registers in all dates, if no records, then insert once in the table to indicate lacks for each stage
			$this->InsertRegistersForAbsence();								
			
			echo "Listo";
		}
		else {
			echo "No hay entradas";
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
		$idEtapa = $this->input->post("idEtapa");
		$usuario = $this->sessionData["user_data"];				
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
				
				$nombresString .= "<tr><td>".$row->nombreGrupo.":</td>";
				foreach ($usuariosPorGrupo AS $nombres) {
					$nombresString .= "<td>".$nombres->nombreUsuario."</td>";
				}
				$nombresString .= "</tr>";
				
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
	
	function general($session) {	
		$info["session"] =  $session;
					
		$data["includes"] = $this->load->view("general/general_includes_view", $info, true);
		$data["header"] = $this->load->view("general/general_header_view", $info, true);
		$data["sidebar"] = $this->load->view("general/general_sidebar_view", $info, true);
		
		$data["comboEtapas"] = $this->grupos_model->getComboEtapas();
		
		return $data;
	}
	
}