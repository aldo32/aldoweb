<?php
use Illuminate\Support\Facades\View;
class SubirController extends BaseController {	

	public function __construct() {	
		parent::__construct();
		View::share('section', 'upload');
	}
	
	public function index() {						
		return View::make("subir/index");
	}
}
