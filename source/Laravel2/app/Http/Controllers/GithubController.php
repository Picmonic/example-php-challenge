<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Commit;

class GithubController extends Controller
{
    private $client;

    /*
     * Github username
     *
     * @var string
     * */
    private $username;

    public function __construct(\Github\Client $client) {
        $this->client = $client;
        $this->username = env('GITHUB_USERNAME');
    }

    //
    public function index() {
        $name = 'Steve';

        $commits[0] = array('author'=>'steveturri', 'date'=>'2015-08-03', 'message'=>'Updated template');
        $commits[1] = array('author'=>'thedoctor', 'date'=>'2015-08-04', 'message'=>'fixed the timey wimey stuff');
        $commits[2] = array('author'=>'steveturri', 'date'=>'2015-08-08', 'message'=>'Made it awesome');
        return view('github.index')->with([
            'name'=>$name,
            'title'=>'Boss',
            'commits'=>$commits
            ]);
    }

    public function commits() {
        //$repos = $this->client->api('repo')->find('joyent/node');
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
        //$commits = Commit::table('commits')->skip(10)->take(5)->get();
        return view('github.commits')->with([
            'commits'=>$commits
        ]);
    }
}
