<?php
use Illuminate\Support\Facades\View;
class ProyectsController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}				
	
	public function index() {				
		$proyects = Proyects::orderBy('name', 'asc')->get();
		$alert = Session::get('alert');
	
		return View::make("proyectos/index")->with('proyects', $proyects)->with('alert', $alert);
	}
	
	function crearproyecto() {		
		$proyect="";
		return View::make("proyectos/editarproyecto")->with('proyect', $proyect);
	}
	
	function editarproyecto($proyectid) {
		if ($proyectid != "" && $proyectid != 0) {
			$proyect = Proyects::find($proyectid);
			if ($proyect) {
				return View::make("proyectos/editarproyecto")->with('proyect', $proyect);
			}
			else {
				$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se encontro el registro </div>';
				return Redirect::to('proyectos')->with('alert', $alert);
			}
		}
		else {
			$proyect = "";
			return View::make("proyectos/editarproyecto")->with('proyect', $proyect);
		}
	}
	
	function guardarproyecto() {
		$type = Input::get('type');
		$proyectid = Input::get('proyectid');
		$validFile = Input::get('validFile');
	
		$proyect =  ($proyectid != "") ? Proyects::find($proyectid) : "";
	
		$messages = array('required' => 'Campo obligatorio', 'date'=>'Formato de fecha incorrecto');
	
		if ($validFile == "true") {
			$validator = Validator::make(Input::all(), Proyects::$rules, $messages);
		}
		else {
			$validator = Validator::make(Input::all(), array('name'=>'required', 'description'=>'required'), $messages);
		}
	
		if ($validator->fails()) {
			return Redirect::to("/proyectos/editarproyecto/".$proyectid)->withErrors($validator)->withInput();
		}
		else {
			if (Input::hasFile('file')) {
				$file = Input::file('file');
				$location = "uploads/proyects";
				$filename = $file->getClientOriginalName();
				$extension =$file->getClientOriginalExtension();
				$filename = uniqid("file_").".".$extension;
			}
				
			/*Insertando nuevo registro*/
			if ($type=="insert") {
				$proyect = new Proyects();
				$proyect->name = Input::get("name");
				$proyect->description = Input::get("description");
				$proyect->image = $location."/".$filename;				
	
				$upload = Input::file('file')->move($location, $filename);
	
				if ($upload) {
					$proyect->save();
						
					$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La ruta <b>'.Input::get("name").'</b> se creo correctamente </div>';
					return Redirect::to('proyectos')->with('alert', $alert);
				}
				else {
					$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se pudo crear la ruta. Intente más tarde </div>';
					return Redirect::to('proyectos')->with('alert', $alert);
				}
			}
			/*Actualizando registro*/
			else {
				if (Input::hasFile('file')) {
					$upload = Input::file('file')->move($location, $filename);
						
					if ($upload) {
						$proyect->name = Input::get("name");
						$proyect->description = Input::get("description");
						$proyect->image = $location."/".$filename;						
						$proyect->save();
							
						$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La ruta <b>'.Input::get("name").'</b> se actualizo correctamente </div>';
						return Redirect::to('proyectos')->with('alert', $alert);
					}
					else {
						$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se pudo actualizar la ruta. Intente más tarde </div>';
						return Redirect::to('proyectos')->with('alert', $alert);
					}
				}
				else {
					$proyect->name = Input::get("name");
					$proyect->description = Input::get("description");					
					$proyect->save();
						
					$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La ruta <b>'.Input::get("name").'</b> se actualizo correctamente </div>';
					return Redirect::to('proyectos')->with('alert', $alert);
				}
			}
		}
	}
	
	function eliminarruta() {
		$proyectId = Input::get("proyectid");
		$proyect = Proyects::find($proyectId);
		$proyectName = $proyect->name;
	
		if (file_exists($proyect->image)) {
			unlink($proyect->image);
				
			$proyect->delete();
				
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La ruta <b>'.$proyectName.'</b> se eliminó correctamente </div>';
			return Redirect::to("proyectos")->with('alert', $alert);
		}
		else {
			$proyect->delete();
	
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La ruta <b>'.$proyectName.'</b> se eliminó correctamente </div>';
			return Redirect::to("proyectos")->with('alert', $alert);
		}
	}
	
	function deleteimage() {
		$proyectid = Input::get("proyectid");
		$proyect = Proyects::find($proyectid);
	
		$image =  $proyect->image;
	
		if (file_exists($image)) {
			unlink($image);
			$proyect->image = "";
			$proyect->save();
				
			return json_encode(array('status'=>'success'));
		}
	
		return json_encode(array('status'=>'error'));
	}
}
