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
		
	}
}