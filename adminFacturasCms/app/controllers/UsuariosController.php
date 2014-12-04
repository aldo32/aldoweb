<?php
class UsuariosController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {		
		$users = User::where('idrol', '!=', '1');				
		return View::make('usuarios/index')->with('users', $users);
	}

	function crearusuario() {
		$usuario="";
		$roleCombo = $this->getComboRole(Role::all());
		$companyCombo = $this->getComboCompany(Company::where('idcompany', '!=', '1')->get());		
		
		return View::make("usuarios/editarusuario")->with("usuario", $usuario)->with("roleCombo", $roleCombo)->with("companyCombo", $companyCombo);
	}
	
	function getComboRole($data) {					
		$combo = array();
		
		$combo[0] = "Selecciona una opción";
		foreach ($data AS $row) {
			$combo[$row->idrol] = $row->name;
		}
		
		return $combo;
	}
	
	function getComboCompany($data) {
		$combo = array();
	
		$combo[0] = "Selecciona una opción";
		foreach ($data AS $row) {
			$combo[$row->idcompany] = $row->name;
		}
	
		return $combo;
	}
}
