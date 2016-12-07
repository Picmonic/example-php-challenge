<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Commit;

class GithubController extends Controller
{
    private $client;

    private $username;

    public function __construct(\Github\Client $client) {
        $this->client = $client;
        $this->username = env('GITHUB_USERNAME');
    }

    public function commits() {
     
        $commits = $this->client->api('repo')->commits()->all('joyent', 'node', array('sha' => 'master'));
        foreach ($commits as $commit) {            
            $commit = Commit::createOrUpdate(array(
                'commit_hash' => $commit['sha'],
                'url' => $commit['html_url'],
                'author' => $commit['author']['login'],
                'message' => $commit['commit']['message']
                ), array(
                'commit_hash' => $commit['sha']
                )
            );            
        }

        $commits = Commit::orderBy('created_at', 'id')->limit(25)->get();
     
        return view('github.commits')->with([
            'commits'=>$commits
        ]);
    }
}
