<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Commit;

class GithubController extends Controller
{
    public $author = 'chad3814';
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

    public function author($author) {
        //$commits = Commit::table('commits')->where('author', '=', 'orangemocha')->get();
        $commits = Commit::where('author', $author)->get();
        //$commits = Commit::table('commits')->skip(10)->take(5)->get();
        return view('github.authors')->with([
            'commits'=>$commits
        ]);
    }
}
