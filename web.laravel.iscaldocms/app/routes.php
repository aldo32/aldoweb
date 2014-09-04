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

Route::get('banners', 'BannersController@index');
Route::get('banners/crearbanner', 'BannersController@crearbanner');
Route::post('banners/guardarbanner', 'BannersController@guardarbanner');
Route::get('banners/borrarbanner/{id}', 'BannersController@borrarbanner');

Route::get('info', 'InfoController@index');
Route::get('info/editar/{id}', 'InfoController@editar');
Route::post('info/guardar', 'InfoController@guardar');

Route::get('rutas', 'RutasController@index');
Route::get('rutas/crearruta', 'RutasController@crearruta');
Route::get('rutas/editarruta/{routeid}', 'RutasController@editarruta');
Route::post('rutas/guardarruta', 'RutasController@guardarruta');
Route::post('rutas/eliminarruta', 'RutasController@eliminarruta');
Route::post('rutas/deleteimage', 'RutasController@deleteimage');

Route::get('galerias', 'GaleriasController@index');
Route::get('galerias/crear', 'GaleriasController@crear');
Route::post('galerias/guardar', 'GaleriasController@guardar');
Route::get('galerias/eliminar/{id}', 'GaleriasController@eliminar');

Route::get('mailing', 'MailingController@index');
Route::get('mailing/eliminar/{id}', 'MailingController@eliminar');
Route::get('mailing/enviar', 'MailingController@enviar');
Route::post('mailing/enviarCorreos', 'MailingController@enviarCorreos');
Route::get('mailing/testemail', 'MailingController@testemail');
