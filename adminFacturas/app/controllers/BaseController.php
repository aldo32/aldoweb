<?php

use Illuminate\Support\Facades\Auth;
class BaseController extends Controller {
	
	public function __construct() {
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
		$this->beforeFilter('auth');	
	
		if (Auth::user()) {
			$infoUser = json_decode(Auth::user());
			$companyName = Company::find(Auth::user()->idcompany);
			View::share('infoUser', $infoUser);
			View::share('companyName', $companyName);
								
		}						
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
