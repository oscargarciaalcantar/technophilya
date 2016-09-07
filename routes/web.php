<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@getIndex');
Route::get('acerca', 'PagesController@getAcerca');
Route::get('contacto', 'PagesController@getContacto');
Route::resource('posts', 'PostController');
