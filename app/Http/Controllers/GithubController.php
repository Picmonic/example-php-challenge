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

        //how many commits total
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


        //$dbDump = DB::select('select * from commits');
        $dbDump = DB::table('commits')->get();

        $table_maker = '<table class="table table-striped table-hover table-condensed"><thead><tr><th>Name</th><th>Commit ID</th></tr>';
        foreach ($dbDump as $line) {
            $colorChar = is_numeric(substr($line->commit_id, -1));

            $color = "";

            if($colorChar == 1){
                $color="blue";
            }

            $table_maker .= '<tr class="'. $color . '">';
            $table_maker .= '<td>' . $line->committer_name . '</td>';
            $table_maker .= '<td>' . $line->commit_id . '</td>';
        }

        $table_maker .= '</table>';


        return view('pages.home', ['dump' => $table_maker]);

    }
}