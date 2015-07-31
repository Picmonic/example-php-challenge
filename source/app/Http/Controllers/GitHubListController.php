<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\App;
use App\Commit;

class GitHubListController extends Controller
{
    protected $github;

    public function __construct(GitHubManager $github)
    {
        $this->github = $github;

    }

    public function getCommits()
    {
       $commits = Commit::recent()->orderBy('userName')->take(35)->get();
       if($commits->isEmpty()){
         $this->populateDB();
         $commits = Commit::recent()->orderBy('userName')->take(35)->get();
       }
       return $commits;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $issues = $this->getCommits();
        return view('welcome')->with('issues', $issues);

    }



    private function populateDB()
    {
      $commitsCollection = $this->github->pullRequests()->all('joyent', 'node',array('sha'=> 'master'));

      foreach ($commitsCollection as $commitEntry) {
        $commit = new Commit;
        $commit->number = $commitEntry["number"];
        $commit->userName = $commitEntry["user"]["login"];
        $commit->title = $commitEntry['title'];
        $commit->body = $commitEntry['body'];
        $commit->sha = $commitEntry['merge_commit_sha'];
        $commit->setCreatedAtAttribute($commitEntry['created_at']);
        $commit->setUpdatedAtAttribute($commitEntry['updated_at']);
        $commit->save();
      }
      unset($commitEntry);

    }

}
