<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Commit;

class CommitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Response::json(Commit::limit(25)->get());
    }
    
     /**
     * Grab the latest 25 commits for nodejs/node and save to commits table
     *
     * @return \Illuminate\Http\Response
     */
    public function getCommits()
    {
        //get the latest 25 commits for nodejs/node
        $client = new Client();
        $res = $client->get('https://api.github.com/repos/nodejs/node/commits');
        $commits = json_decode($res->getBody()->getContents());
        
        //loop through first 25 and save
        $i = 0;
	     foreach ($commits as $commit) {
	        $insert = Commit::firstOrCreate(['sha' => $commit->sha]);
	        $insert->user = $commit->author->login;
	        $insert->message = $commit->commit->message;
	        $insert->sha = $commit->sha;
	        $insert->url = $commit->url;
	        $insert->save();
	        $i++;
	        if ($i>=25) { break; } //only worry about first 25
	     }
        
        return \Response::json($commits);
        //return $commits;
        //print_r($commits); exit();

        
    }

}
