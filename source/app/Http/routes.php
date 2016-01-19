<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {   
    View::make('index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


// API ROUTES ==================================  
Route::group(array('prefix' => 'api'), function() {

	Route::get('commits/getCommits', 'CommitController@getCommits');
   Route::resource('commits', 'CommitController', 
        array('only' => array('index')));
  
});

// CATCH ALL ROUTE =============================  
// all routes that are not home or api will be redirected to the Angular 
Route::any('{path?}', function()
{
    return view("index");
})->where("path", ".+");