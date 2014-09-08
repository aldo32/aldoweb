<?php

use Illuminate\Support\Facades\Input;
class HomeController extends BaseController {	

	public function index()
	{
		$about = Info::find(1);
		$sport = Info::find(2);
		$hobbie = Info::find(3);
		$exp = Info::find(4);
		$proyectos = Proyects::orderBy('name', 'asc')->get();
		
		return View::make('home/index')->with('about', $about)->with('sport', $sport)->with('hobbie', $hobbie)->with('exp', $exp)->with('proyectos', $proyectos);
	}
	
	function getProyectDescription() {
		$proyectId = Input::get('id');
		
		$proyect = Proyects::find($proyectId);
		
		?>
		<h3><?php echo $proyect->name?></h3>
		<p><?php echo $proyect->description?></p>
		<?php 
	}

}
