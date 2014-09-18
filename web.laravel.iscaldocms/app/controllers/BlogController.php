<?php
use Illuminate\Support\Facades\Input;
class BlogController extends BaseController {	

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$blog = Blog::all();		
		$alert = Session::get('alert');
		
		return View::make('blog/index')->with('blog', $blog)->with('alert', $alert);
	}			
	
	function crearblog() {
		$blog = "";
		return View::make("blog/editarblog")->with('blog', $blog);
	}
	
	function editarblog($blogid) {
		if ($blogid != "" && $blogid != 0) {
			$blog = Blog::find($blogid);
			if ($blog) {
				return View::make("blog/editarblog")->with('blog', $blog);
			}
			else {
				$alert = '<div class="alert alert-danger danger-dismissable"> <i class="fa fa-ban"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> <b></b> No se encontro el registro </div>';
				return Redirect::to('blog')->with('alert', $alert);
			}
		}
		else {
			$blog = "";
			return View::make("blog/editarblog")->with('blog', $blog);
		}
	}
	
	function guardarblog() {
		$type = Input::get('type');
		$blogid = Input::get('blogid');		
		
		$blog =  ($blogid != "") ? Blog::find($blogid) : "";
		
		$messages = array('required' => 'Campo obligatorio');
		
		$validator = Validator::make(Input::all(), Blog::$rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::to("/blog/editarblog/".$blogid)->withErrors($validator)->withInput();
		}
		else {
			$filename = "";
			$urlFile = "";
			if (Input::hasFile('file')) {
				$file = Input::file('file');
				$location = "uploads/blog";
				$filename = $file->getClientOriginalName();
				$extension =$file->getClientOriginalExtension();
				$filename = uniqid("file_").".".$extension;
				
				$upload = Input::file('file')->move($location, $filename);
				
				$urlFile = $location."/".$filename;
			}
			
			if ($type == "insert") {
				$blog = new Blog();
				$blog->title = Input::get("title");
				$blog->description = Input::get("description");
				$blog->image = $urlFile;
				
				$blog->save();
				
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La entrada <b>'.Input::get("title").'</b> se creo correctamente </div>';
				return Redirect::to('blog')->with('alert', $alert);
			}
			else {
				$blog->title = Input::get("title");
				$blog->description = Input::get("description");
				if ($urlFile != "") { $blog->image = $urlFile; }
				
				$blog->save();
				
				$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La entrada <b>'.Input::get("title").'</b> se modificó correctamente </div>';
				return Redirect::to('blog')->with('alert', $alert);
			}
		}
	}
	
	function eliminarblog($blogid) {		
		$blog = Blog::find($blogid);
		$blogName = $blog->title;
	
		if (file_exists($blog->image)) {
			unlink($blog->image);
	
			$blog->delete();
	
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La entrada <b>'.$blogName.'</b> se eliminó correctamente </div>';
			return Redirect::to("blog")->with('alert', $alert);
		}
		else {
			$blog->delete();
	
			$alert = '<div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> La entrada <b>'.$blogName.'</b> se eliminó correctamente </div>';
			return Redirect::to("proyectos")->with('alert', $alert);
		}
	}
	
	function deleteimage() {
		$blogid = Input::get("blogid");
		$blog = Blog::find($blogid);
	
		$image =  $blog->image;
	
		if (file_exists($image)) {
			unlink($image);
			$blog->image = "";
			$blog->save();
	
			return json_encode(array('status'=>'success'));
		}
	
		return json_encode(array('status'=>'error'));
	}
	
	function carrusel() {
		return View::make('blog/carrusel');
	}
}
