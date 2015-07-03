<?php

/*
|Get Route to display index.php
|
|Resource route for API call for controller
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('/api/1/commits', 'GithubApiController@index');
