<?php
class InfoController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$info = Info::all();	
		$alert = Session::get('alert');
		
		return View::make('info/index')->with('info', $info)->with('alert', $alert);
	}	
	
	function editar($id) {
		$info = Info::find($id);
		
		if ($info) {
			return View::make('info/editar')->with('info', $info);
		}
		else {
			$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> No se encontro el registro a editar </div>';
			return Redirect::to('info')->with('alert', $alert);
		}
	}
	
	function guardar() {
		$infoid = Input::get('infoid');
		$info = Info::find($infoid);
		
		$messages = array('required' => 'El campo :attribute es obligatorio');
		$validator = Validator::make(Input::all(), Info::$rules, $messages);
		
		if ($validator->fails()) {
			return View::make('info/editar')->with('info', $info)->withErrors($validator);
		}
		else {
			$info->title=Input::get('title');
			$info->description=Input::get('description');
			
			$info->save();
			
			$alert = '<div class="alert alert-success danger-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La información <b>'.$info->title.'</b> se actualizo correctamente. </div>';
			return Redirect::to('info')->with('alert', $alert);
		}
	}
}
