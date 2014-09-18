<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'LoginController@index');
Route::get('login', 'LoginController@index');
Route::post('login/access', 'LoginController@access');
Route::get('login/logout', 'LoginController@logout');
Route::get('login/restorepassword', 'LoginController@restorepassword');

Route::get('inicio', 'InicioController@index');

Route::get('info', 'InfoController@index');
Route::get('info/editar/{id}', 'InfoController@editar');
Route::post('info/guardar', 'InfoController@guardar');

Route::get('proyectos', 'ProyectsController@index');
Route::get('proyectos/crearproyecto', 'ProyectsController@crearproyecto');
Route::get('proyectos/editarproyecto/{routeid}', 'ProyectsController@editarproyecto');
Route::post('proyectos/guardarproyecto', 'ProyectsController@guardarproyecto');
Route::post('proyectos/eliminarproyecto', 'ProyectsController@eliminarproyecto');
Route::post('proyectos/deleteimage', 'ProyectsController@deleteimage');

Route::get('blog', 'BlogController@index');
Route::get('blog/crearblog', 'BlogController@crearblog');
Route::post('blog/guardarblog', 'BlogController@guardarblog');
Route::get('blog/editarblog/{blogid}', 'BlogController@editarblog');
Route::get('blog/eliminarblog/{blogid}', 'BlogController@eliminarblog');
Route::post('blog/deleteimage', 'BlogController@deleteimage');

Route::get('blog/carrusel', 'BlogController@carrusel');
