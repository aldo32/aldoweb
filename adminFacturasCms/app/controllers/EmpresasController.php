<?php
class EmpresasController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {		
		$empresas = Company::where('idcompany', '!=', '1')->get();
		$alert = Session::get('alert');
		
		return View::make('empresas/index')->with('empresas', $empresas)->with("alert", $alert);
	}
	
	function crearempresa() {
		$empresa = "";
		
		return View::make("empresas/editarempresa")->with("empresa", $empresa);
	}
	
	function guardarempresa() {
		$type = Input::get('type');
		$idcompany = Input::get('idcompany');
		
		$empresa =  ($idcompany != "") ? Company::find($idcompany) : "";
		
		$messages = array('required'=>'Campo obligatorio');
		$validator = Validator::make(Input::all(), Company::$rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::to("empresas/editarempresa/".$idcompany)->withErrors($validator)->withInput();
		}
		else {
			if ($type == "insert") {
				$empresa = new Company();
				$empresa->name =  Input::get("name");
				$empresa->description =  Input::get("description");
					
				$empresa->save();
					
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> la empresa <b>'.Input::get("name").'</b> se creo correctamente </div>';
				return Redirect::to('empresas')->with('alert', $alert);
			}			
			else {
				$empresa->name =  Input::get("name");
				$empresa->description =  Input::get("description");
				
				$empresa->save();
				
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> la empresa <b>'.Input::get("name").'</b> se actualizo correctamente </div>';
				return Redirect::to('empresas')->with('alert', $alert);
			}
		}
	}
	
	function editarempresa($idcompany) {
	
		if ($idcompany != "" && $idcompany != 0) {
			$empresa = Company::find($idcompany);
			if ($empresa) {
				return View::make("empresas/editarempresa")->with('empresa', $empresa);
			}
			else {
				$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se encontro el registro </div>';
				return Redirect::to('empresas')->with('alert', $alert);
			}
		}
		else {
			$empresa = "";
			return View::make("empresas/editarempresa")->with('empresa', $empresa);
		}
	}
	
	function eliminarempresa($idcompany) {
		$empresa = Company::find($idcompany);
		if ($empresa) {
			$empresa->delete();
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> la empresa se elimino correctamente</div>';
			return Redirect::to('empresas')->with('alert', $alert);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se encontro el registro </div>';
			return Redirect::to('empresas')->with('alert', $alert);
		}	
	}
}