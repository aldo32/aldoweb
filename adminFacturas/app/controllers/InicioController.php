<?php
use Illuminate\Support\Facades\View;
class InicioController extends BaseController {	

	public function __construct() {	
		parent::__construct();
		View::share('section', 'inicio');
	}
	
	public function index() {						
		return View::make("inicio/index");
	}
}
