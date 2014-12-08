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

Route::get('usuarios', 'UsuariosController@index');
Route::get('usuarios/crearusuario', 'UsuariosController@crearusuario');
Route::post('usuarios/guardarusuario', 'UsuariosController@guardarusuario');
Route::get('usuarios/editarusuario/{userid}', 'UsuariosController@editarusuario');
Route::get('usuarios/cambiarpassword/{userid}', 'UsuariosController@cambiarpassword');
Route::post('usuarios/savePassword', 'UsuariosController@savePassword');
Route::get('usuarios/eliminarusuario/{iduser}', 'UsuariosController@eliminarusuario');

Route::get('empresas', 'EmpresasController@index');
Route::get('empresas/crearempresa', 'EmpresasController@crearempresa');
Route::post('empresas/guardarempresa', 'EmpresasController@guardarempresa');
Route::get('empresas/editarempresa/{idcompany}', 'EmpresasController@editarempresa');
Route::get('empresas/eliminarempresa/{idcompany}', 'EmpresasController@eliminarempresa');