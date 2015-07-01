<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 6/29/15
 * Time: 11:00 AM
 */

namespace App\Http\Controllers;
use DB;


class GithubController extends Controller{

    public function joyent()
    {
        $client = new \Github\Client;

        //Find store and count joyent Commits, doesnt paginate
        $gh_commits = $client->api('repo')->commits()->all('joyent', 'node', array('sha' => 'master'));
        $commitsLength = count($gh_commits);

        $thisContent = '<table class="table table-striped table-hover table-condensed"><thead><tr><th>Name</th><th>Commit ID</th></tr>';

        //loops over commits array and prints table row
        for ($i = 0; $i < $commitsLength; $i++) {
            //sets bg color of row if SHA ends in numeric char
        $colorChar = is_numeric(substr($gh_commits[$i]["sha"], -1));
        $color = "";

        if ($colorChar == 1) {
        $color = "blue";
        }//ends if
        //prints table row
        $thisContent .= '<tr class="clickable-row ' . $color . '">';
        $thisContent .= '<td>' . $gh_commits[$i]["commit"]['committer']['name'] . '</td>';
        $thisContent .= '<td>' . $gh_commits[$i]["sha"] . '</td>';
        $thisContent .= '</tr>';
        }//ends for loop

<<<<<<< HEAD
        //$dbDump = DB::select('select * from commits where id = 1');
        //'dump' => $dbDump
        return view('welcome', ['content' => $thisContent]);
=======
        $dbDump = DB::select('select * from commits');

        $dbPrint =  json_encode($dbDump);

        return view('welcome', ['content' => $thisContent, 'dump' => $dbPrint]);
>>>>>>> picmonic
    }
}