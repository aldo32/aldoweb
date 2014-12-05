<?php
class UsuariosController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {		
		$users = User::where('idrol', '!=', '1')->get();
		$alert = Session::get('alert');
		
		return View::make('usuarios/index')->with('users', $users)->with("alert", $alert);
	}

	function crearusuario() {
		$user="";
		$roleCombo = $this->getComboRole(Role::all());
		$companyCombo = $this->getComboCompany(Company::where('idcompany', '!=', '1')->get());		
		
		return View::make("usuarios/editarusuario")->with("user", $user)->with("roleCombo", $roleCombo)->with("companyCombo", $companyCombo);
	}		
	
	function guardarusuario() {
		$type = Input::get('type');
		$userid = Input::get('usuarioid');

		$user =  ($userid != "") ? User::find($userid) : "";
		
		$messages = array('required'=>'Campo obligatorio', 'not_in'=>'Opción no valida', 'email'=>'Email no valido', 'unique'=>'Este Valor ya existe en la BD', 'confirmed'=>'Las contraseñas no son iguales');
		
		if ($type == "insert")
			$validator = Validator::make(Input::all(), User::$rules, $messages);
		else {
			$rules = array('idrol'=>'required|not_in:0', 'idcompany'=>'required|not_in:0', 'name'=>'required', 'lastname'=>'required', 'address'=>'required');
			$validator = Validator::make(Input::all(), $rules, $messages);
		}
		
		if ($validator->fails()) {				
			return Redirect::to("usuarios/editarusuario/".$userid)->withErrors($validator)->withInput();
		}
		else {
			if ($type == "insert") {
				$user = new User();
				$user->idrol = Input::get("idrol");
				$user->idcompany = Input::get("idcompany");
				$user->name = Input::get("name");
				$user->lastname = Input::get("lastname");
				$user->address = Input::get("address");
				$user->email = Input::get("email");
				
				$user->save();
				
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario <b>'.Input::get("name").'</b> se creo correctamente </div>';
				return Redirect::to('usuarios')->with('alert', $alert);
			}
			else {
				$user->idrol = Input::get("idrol");
				$user->idcompany = Input::get("idcompany");
				$user->name = Input::get("name");
				$user->lastname = Input::get("lastname");
				$user->address = Input::get("address");
				$user->email = Input::get("email");
				
				$user->save();
				
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El usuario <b>'.Input::get("name").'</b> se actualizo correctamente </div>';
				return Redirect::to('usuarios')->with('alert', $alert);
			}
		}
	}
	
	function editarusuario($userid) {
		$roleCombo = $this->getComboRole(Role::all());
		$companyCombo = $this->getComboCompany(Company::where('idcompany', '!=', '1')->get());
		
		if ($userid != "" && $userid != 0) {
			$user = User::find($userid);
			if ($user) {
				return View::make("usuarios/editarusuario")->with('user', $user)->with("roleCombo", $roleCombo)->with("companyCombo", $companyCombo);
			}
			else {
				$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se encontro el registro </div>';
				return Redirect::to('usuarios')->with('alert', $alert);
			}
		}
		else {
			$user = "";
			return View::make("usuarios/editarusuario")->with('user', $user)->with("roleCombo", $roleCombo)->with("companyCombo", $companyCombo);
		}
	}
	
	function cambiarpassword($userid) {
		$user = User::find($userid);
		
		return View::make("usuarios/cambiarpassword")->with("user", $user);
	}
	
	function savePassword() {
		$iduser = Input::get('iduser');
		
		$user =  ($iduser != "") ? User::find($iduser) : "";
		
		$messages = array('required'=>'Campo obligatorio', 'confirmed'=>'Las contraseñas no son iguales');
					
		$rules = array('password'=>'required|confirmed', 'password_confirmation'=>'required');
		$validator = Validator::make(Input::all(), $rules, $messages);	

		if ($validator->fails()) {
			return Redirect::to("usuarios/cambiarpassword/".$iduser)->withErrors($validator)->withInput();
		}
		else {
			$user->password = Hash::make(Input::get('password'));
			$user->save();		

			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> Se cambio la contraseña del usuario <b>'.$user->name.'</b></div>';
			return Redirect::to('usuarios')->with('alert', $alert);
		}
	}
	
	function eliminarusuario($iduser) {
		$user = User::find($iduser);
		if ($user) {
			$user->delete();
			
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> El ususario se elimino correctamente</div>';
			return Redirect::to('usuarios')->with('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se encontro el registro </div>';
			return Redirect::to('usuarios')->with('alert', $alert);
		}	
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
