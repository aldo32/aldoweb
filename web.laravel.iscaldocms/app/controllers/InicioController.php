<?php

class InicioController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {		
		return View::make('inicio/index');
	}	
}
