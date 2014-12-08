<?php
use Illuminate\Support\Facades\View;
class InicioController extends BaseController {	

	public function __construct() {	
		parent::__construct();
		View::share('section', 'inicio');
	}
	
	public function index() {	
		$alert = Session::get('alert');
		$bills = Bill::All();
		
		return View::make("inicio/index")->with('alert', $alert)->with('bills', $bills);
	}
}
