<?php

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

}
