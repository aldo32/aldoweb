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

Route::get('inicio', 'InicioController@index');
Route::get('inicio/eliminarFactura/{idbill}', 'InicioController@eliminarFactura');

Route::get('subirarchivos', 'SubirController@index');
Route::post('subirarchivos/uploadFiles', 'SubirController@uploadFiles');
