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

        //loops over commits array and inserts into database
        for ($i = 0; $i < $commitsLength; $i++) {

            //insert committer name
            $gh_committer_name = $gh_commits[$i]["commit"]['committer']['name'];

            //begin database transaction
            DB::beginTransaction();
            try {
                //assign commit id to var
                $gh_commit_id = $gh_commits[$i]["sha"];

                //insert value into db
                DB::insert('insert into commits (committer_name, commit_id) values(?, ?)', [$gh_committer_name, $gh_commit_id]);

                //if no errors commit
                DB::commit();
            } catch (\Exception $e) {

                //if theres an exception just undo it and carry on
                DB::rollback();

            }

        }//ends for loop

        $dbDump = DB::select('select * from commits');
        $dbPrint =  json_encode($dbDump);

        return view('welcome', ['content' => "github", 'dump' => $dbPrint]);

    }
}