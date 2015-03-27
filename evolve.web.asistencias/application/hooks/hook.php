<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed');

class Hook extends CI_Controller {		
	private $CI;
	public function __construct() {
								
	}
	
	function checkLogin() {
		$this->CI =& get_instance();		
		$privatescontrollers=array('adminegu', 'etapas', 'grupos', 'horarios', 'horariosreglas', 'permisos');
   		 
   		$router =& load_class('Router', 'core');
		$rout = $router->fetch_class();								   		   		   	   		   	   	
   		
		$root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
		$root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);		
		
   		if ($_SESSION['admin'] == 0 && in_array($rout, $privatescontrollers))
   		{    			   			
   			?>
   			<script>location="<?php echo $root."inicio";?>"</script>
   			<?php
   		}
	}
}