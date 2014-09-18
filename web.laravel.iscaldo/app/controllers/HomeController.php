<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
class HomeController extends BaseController {	

	public function index()
	{
		$info1 = Info::find(1);
		$info2 = Info::find(2);
		$info3 = Info::find(3);
		$info4 = Info::find(4);
		$proyectos = Proyects::orderBy('name', 'asc')->get();
		$blogs = Blog::all();
		
		return View::make('home/index')->with('info1', $info1)->with('info2', $info2)->with('info3', $info3)->with('info4', $info4)->with('proyectos', $proyectos)->with('blogs', $blogs);
	}
	
	function getProyectDescription() {
		$proyectId = Input::get('id');
		
		$proyect = Proyects::find($proyectId);
		
		?>			
		<script>
		$('.nyroModalProyect').nyroModal();
		</script>
		
		<h3><?php echo $proyect->name?></h3>
		<br>
		<center><a href="<?php echo URL::to('/')."/".$proyect->image;?>" class="nyroModalProyect"><img src="<?php echo Croppa::url($proyect->image, 450, 280);?>" width="450" height="280"></a></center>
		<p><?php echo $proyect->description?></p>
		<?php 
	}
	
	function viewEntry($blogid) {
		$blog = Blog::find($blogid);
		
		if (count($blog) > 0) {
			return View::make('home/viewEntry')->with('blog', $blog); 
		}
		else {
			echo "No existe la entrada solicitada";
		}
	}
	
	function konami() {
		return View::make('home/konami');
	}	

}
