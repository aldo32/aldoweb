<?php
  class Conexion{

  	private $host;
  	private $user;
  	private $pass;
    private $db;
  	public function __construct() {
  		include 'Config.php';
  		$this->host = $hostname;
  		$this->user = $username;
  		$this->pass = $password;
      $this->db = $dbname;
  	}
 	public function getResult($query){
 		$conn = mysql_connect($this->host,$this->user, $this->pass ) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
		mysql_set_charset('utf8',$conn);
    mysql_select_db($this->db);
		$result = mysql_query($query);
		return $result;
 	}

 }

?>