<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/hello', function()
{
	return View::make('hello');
});

Route::get('/', function()
{
	return View::make('index');
});
