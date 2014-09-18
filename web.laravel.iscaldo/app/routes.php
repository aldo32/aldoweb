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

Route::get('/', 'HomeController@index');
Route::post('/home/getProyectDescription', 'HomeController@getProyectDescription');
Route::get('/home/viewEntry/{blogid}', 'HomeController@viewEntry');
Route::get('/home/konami', 'HomeController@konami');