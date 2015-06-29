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


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
$client = new \Github\Client;

//Find store and count joyent Commits, doesnt paginate
$commits = $client->api('repo')->commits()->all('joyent', 'node', array('sha' => 'master'));
$commitsLength = count ($commits);

$thisContent = '<table class="table table-striped table-hover table-condensed"><thead><tr><th>Name</th><th>Commit ID</th></tr>';

//loops over commits array and prints table row
for($i=0; $i<$commitsLength; $i++){
    //sets bg color of row if SHA ends in numeric char
    $colorChar = is_numeric(substr($commits[$i]["sha"], -1));
    $color = "";

    if($colorChar == 1){
        $color="blue";
    }//ends if
    //prints table row
    $thisContent .= '<tr class="clickable-row '. $color . '">';
    $thisContent .= '<td>' . $commits[$i]["commit"]['committer']['name'] . '</td>';
    $thisContent .= '<td>' . $commits[$i]["sha"] . '</td>';
    $thisContent .= '</tr>';
}//ends for loop
$thisContent .=  '</thead></table>';

return view('welcome', ['content' => $thisContent]);

});