<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class InicioController extends Controller {	

	public function index() {		
		return view('inicio/index');
	}

	function admin() {
		$data['tasks'] = [
				[
						'name' => 'Design New Dashboard',
						'progress' => '87',
						'color' => 'danger'
				],
				[
						'name' => 'Create Home Page',
						'progress' => '76',
						'color' => 'warning'
				],
				[
						'name' => 'Some Other Task',
						'progress' => '32',
						'color' => 'success'
				],
				[
						'name' => 'Start Building Website',
						'progress' => '56',
						'color' => 'info'
				],
				[
						'name' => 'Develop an Awesome Algorithm',
						'progress' => '10',
						'color' => 'success'
				]
		];
		return view('admin/index')->with($data);		
	}
}
?>