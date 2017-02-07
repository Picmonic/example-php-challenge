<?php

namespace App\Http\Controllers;

use App\Commit;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommitController extends Controller
{
    /**
     * Show the commits page.
     *
     * @return Response
     */
    public function getCommits()
    {
        //Find out when it was last updated by checking the settings table
        $settings = Settings::first();
        $update = false;
        $since = "";
        if(count($settings) == 1){
            //update once every 5 minutes (5 min == 300 sec)
            $since = strtotime($settings->last_updated);
            if(( time() - strtotime($settings->last_updated)) > 300 ) {
                $update = true;
            }
        } else {
            $update = true;
        }

        //If it needs to be updated, fets the new commits
        if ($update){
            $commit_url = "https://api.github.com/repos/joyent/node/commits";
            //Limit to commits since last fetch
            if ($since != ""){
                $commit_url .= "?since=" . date("Y-M-DTH:M:SZ", $since);
            }
            //$json contains the string data from the server
            $client = new \Guzzle\Service\Client($commit_url);
            $json = $client->get()->send()->json();

            foreach($json as $entry){
                $commit = Commit::firstOrCreate(
                    array(
                        'sha' =>        $entry['sha'], 
                        'committer' =>  $entry['commit']['committer']['name'], 
                        'message' =>    substr($entry['commit']['message'],0,5000), 
                        'date' =>       $entry['commit']['committer']['date']
                    )
                );
                $commit->save();
            }

            //Save the last_updated
            $timestamp = date("Y-m-d H:i:s", time());
            $settings = Settings::first();
            if ($settings == null){
                $user = Settings::create(array('last_updated' => $timestamp));
            } else {
                $settings->last_updated = $timestamp;
                $settings->save();
            }
            
        }

	    $commits = Commit::all();
	    return view('commits')->with('commits', $commits);
    }
}