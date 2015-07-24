
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "inicio.php";

class loadData extends CI_Controller {

	var $sessionData;

	function __construct() {
		parent::__construct();

		$this->load->model("usuarios_model");
		$this->load->model("horarios_model");
		$this->load->model("grupos_model");
		$this->load->library("general_library");
	}

	public function index($type=0) {				
		//process that configure all registers in of employers			
		$users = $this->connectODBC("select * from userinfo");			
		$registers = $this->connectODBC("select * from checkinout");			
		
		$this->db->truncate("odbc_users");
		$this->db->truncate("odbc_checks");
		
		//Insert in to odb_users
		$registersUsers="";
		for($i=0; $i<sizeof($users); $i++) {
			$registersUsers[$i]["userid"] = $users[$i]["USERID"];
			$registersUsers[$i]["name"] = $users[$i]["Name"];			
		}				
		$this->db->insert_batch("odbc_users", $registersUsers);
		
		//Insert in to odb_checks
		$registersChecks="";
		for($i=0; $i<sizeof($registers); $i++) {
			$timestamp = strtotime($registers[$i]["CHECKTIME"]);
			$fecha = date("Y-m-d h:i:s", $timestamp);
			
			$registersChecks[$i]["userid"] = $registers[$i]["USERID"];
			$registersChecks[$i]["checktime"] = $fecha;			
		}				
		$this->db->insert_batch("odbc_checks", $registersChecks);
		
		//deleting current date in table entrada
		$sql="DELETE FROM entrada WHERE DATE(Time) = CURRENT_DATE;";
		$q=$this->db->query($sql);
		
		//get last date from entrada
		$lastDate = $this->usuarios_model->getLastDateEntrada();					
		
		//Select checks only in > that last date for entrada
		$sql="
			SELECT 
				u.userid AS id, 
				u.name AS name, 
				c.checktime AS checktime 
			FROM 
				odbc_checks c, 
				odbc_users u 
			WHERE 
				c.userid=u.userid AND 
				DATE(checktime) > '".$lastDate->fecha."'
		";		
		$q=$this->db->query($sql);		
		$currentChecks = $q->result();						
					
		if (sizeof($currentChecks) > 0) {
			$registersEntradas = "";
			$i=0;		
			foreach ($currentChecks AS $row) {
				$registersEntradas[$i]["No"] = $row->name;
				$registersEntradas[$i]["Name"] = $row->name;
				$registersEntradas[$i]["Time"] = $row->checktime;
				
				$i++;
			}									
			
			//Insert new registers in entrada
			$this->db->insert_batch("entrada", $registersEntradas);
		}
		else {
			echo "No hay registros nuevos para la tabla entradas<br><br>";
		}

		
		echo "Listo, se insertaron en las tablas temporales y los nuevos registros (En caso de haber) en la tabla de entradas <br><br>";				
		//echo "<script>setTimeout(location.href = '".base_url("inicio/loadDataAssists/1")."',1500);</script>";

		//refactoring table llegadas
		$inicio = new inicio();
		$inicio->loadDataAssists(1);
		
		//if type is 1 check delay and faltas for send email
		if ($type == 1) {
			$this->checkDelaysSendMail();
		}
	}
	
	function checkDelaysSendMail() {
		$sql="SELECT * FROM usuarios WHERE activo=1 AND id NOT IN (SELECT Name FROM entrada WHERE DATE(Time) = CURRENT_DATE)";
		$q=$this->db->query($sql);
		$usersDelays = $q->result();		
		
		if (sizeof($usersDelays)) {
			echo "<br><br>";
			foreach ($usersDelays AS $row) {				
				
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
							Hola <strong>".$row->nombre."</strong> <br><br>
							Te recordamos que realices tu registro de entrada, ya que si no lo haces seras acreedor a un retardo,
							recuerda que tres retardos equivalen a una falta y si llegas 10 minutos despu&eacute;s de la tolerancia se tomar&aacute; como falta.									
				 			<br><br>
							Si ya te regitraste has caso omiso de este correo.
							<br><br>
						<strong>Gracias</strong>
						</div>
					</body>
				</html>
				";
				
				
				if ($row->correo != "" && ($row->id != "6101" && $row->id != "6102" && $row->id != "6103")) {
					echo "<br>Se envio correo a: ".$row->nombre;
					$this->general_library->sendMail("isc.aldo@evolve.com.mx", $row->correo, $textCorreoRetardo, "Asistencias Evolve", "Evolve", "");					
				}
			}
		}
		else {
			echo "<br><br>No se envio correos";
		}				
	}
	
	function connectODBC($sql) {
	
		$dbNameLinux = "/home/aldo/Documentos/evolve-web/evolve.web.asistencias/Data/att2000.mdb";
		//$dbNameWindows = "C:/Users/ISC Aldo/Documents/GitHub/evolve-web/evolve.web.asistencias/Data/att2000.mdb";
		$dbNameWindows = "C:/Program Files/ZKTeco/att2000.mdb";
		
	
		$dbName = "";
	
		$query = $sql;
		$uname = explode(" ",php_uname());
		$os = $uname[0];
		switch ($os){
			case 'Windows':
				$dbName = $dbNameWindows;
				$driver = '{Microsoft Access Driver (*.mdb, *.accdb)}';
				break;
			case 'Linux':
				$dbName = $dbNameLinux;
				$driver = 'MDBTools';
				break;
			default:
				exit("Don't know about this OS");
		}
	
		$dataSourceName = "odbc:Driver=$driver;DBQ=$dbName;";
		$connection = new \PDO($dataSourceName);
		$result = $connection->query($query)->fetchAll(\PDO::FETCH_ASSOC);
	
		return $result;
	}
}