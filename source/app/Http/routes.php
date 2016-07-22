<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');
Route::get('/pull', 'MainController@pull');
Route::get('/commits', 'MainController@commits');
Route::get('/commits/view/{id}', 'MainController@commitsByAuthor');
Route::get('/authors', 'MainController@authors');

