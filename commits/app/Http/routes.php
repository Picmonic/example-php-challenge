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

Route::get('/', function () {
//    return view('welcome');
    /***
     *
     * For this quick demo let's just return a php file tht will hold all of
     * our angular content.
     *
     * This should return resources/views/index.php
     *
     */
    return View::make('index');
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
    // API routes
    Route::group(array('prefix' => 'api'), function() {
       Route::resource('commits', 'CommitsController');
    });
});

/***
 *
 * Catch all. Though usually NOT the way to do things, we're just using index to do
 * everything for this small demo. Let's keep it restful and keep separation of church
 * and state... uh wait.... separation of rest service and frontend very well split up ;-)
 *
 */
// Let's see if this will work in place of good 'ol App::missing... Seems like it should.
// Only one way to find out!!
Route::any('api/{all}', function($exception) {
    return View::make('index');
})->where(['all' => '.*']);


/***
 * Well that stinks. In Laravel 5 and cannot use App::missing anymore. Try something
 * new above this comment block >:-|
 */
//App::missing(function($exception) {
//    return View::make('index');
//});

