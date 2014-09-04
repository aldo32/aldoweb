<?php

class LoginController extends BaseController {	

	public function __construct() {	
		
	}
	
	public function index() {				
		if (Auth::check()) { return Redirect::to('inicio'); }		
		return View::make('login/index');
	}
	
	function access() {
		$messages = array('required' => 'El campo :attribute es obligatorio.', 'email' => 'El campo :attribute no es un email valido.');
		$validator = Validator::make(Input::all(), array('email'=>'required|email', 'password'=>'required'), $messages);
			
		if ($validator->fails()) {
			return Redirect::to('/')->withErrors($validator)->withInput();
		}
		else{
			$userdata = array(
					'email' 	=> Input::get('email'),
					'password' 	=> Input::get('password')
			);
				
			if (Auth::attempt($userdata)) {
				return Redirect::to('inicio');
			}
			else {
				return View::make('login/index')->with('errorAccess', 'Nombre de usuario o contraseña incorrectos')->with('Input', Input::all());
			}
		}
	}
	
	function restorepassword() {
		
	}
	
	function logout() {
		Auth::logout();
		return Redirect::to('login');
	}	
}
