<?php
use Illuminate\Support\Facades\View;
class SubirController extends BaseController {	

	public function __construct() {	
		parent::__construct();
		View::share('section', 'upload');
	}
	
	public function index() {	
		$alert = Session::get('alert');
		return View::make("subir/index")->with('alert', $alert);
	}
	
	function uploadFiles() {
		$messages = array('required' => 'Campo obligatorio', 'max'=>'El tamaño del archivo es muy grande', 'mimes'=>'Tipo de archivo incorrecto');
		$validator = Validator::make(Input::all(), Bill::$rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::to("subirarchivos")->withErrors($validator)->withInput();
		}
		else {
			if (Input::hasFile('filepdf') && Input::hasFile('filexml')) {
				$filepdf = Input::file('filepdf');
				$locationpdf = "uploads/pdf";
				$filenamepdf = $filepdf->getClientOriginalName();
				$extensionpdf =$filepdf->getClientOriginalExtension();
				$filenamepdf = uniqid("file_").".".$extensionpdf;
				
				$filexml = Input::file('filexml');
				$locationxml = "uploads/xml";
				$filenamexml = $filexml->getClientOriginalName();
				$extensionxml =$filexml->getClientOriginalExtension();
				$filenamexml = uniqid("file_").".".$extensionxml;
			}
			
			$uploadpdf = Input::file('filepdf')->move($locationpdf, $filenamepdf);
			$uploadxml = Input::file('filexml')->move($locationxml, $filenamexml);
			
			if ($uploadpdf && $uploadxml) {
				$bill = new Bill();
				$bill->iduser = Auth::user()->iduser;
				$bill->idrol = Auth::user()->idrol;
				$bill->idcompany = Auth::user()->idcompany;
				$bill->urlpdf = $locationpdf."/".$filenamepdf;
				$bill->urlxml = $locationxml."/".$filenamexml;
				$bill->message = Input::get("message");
				
				$bill->save();
				
				$alert = '<div style="font-weight: bold; color: orange; font-size: 22px;">Los archivos se guardaron correctamente</div>';
				return Redirect::to('inicio')->with('alert', $alert);
			}
			else {
				$alert = '<div style="font-weight: bold; color: yellow; font-size: 22px;">No se pudieron guardar los archivos. Intentelo más tarde</div>';
				return Redirect::to('inicio')->with('alert', $alert);
			}
		}
	}
}
