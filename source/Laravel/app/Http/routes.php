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

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', 'PagesController@contact');
Route::get('github', 'GithubController@index');
Route::get('commits', 'GithubController@commits');
//Route::get('author', 'GithubController@author');
Route::get('author/{author}', ['uses' =>'GithubController@author']);