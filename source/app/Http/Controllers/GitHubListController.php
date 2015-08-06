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
        $commits = $this->getCommits();
        return view('welcome')->with('commits', $commits);

    }



    private function populateDB()
    {
      $commitsCollection = $this->github->repo()->commits()->all('joyent', 'node',array('sha'=> 'master'));


      foreach ($commitsCollection as $commitEntry) {
          //dd($commitsCollection);
        $commit           = new Commit;
        $commit->userName = $commitEntry["author"]["login"];
        //$commit->title    = $commitEntry['title'];
        $commit->body     = $commitEntry["commit"]['message'];
        $commit->url      = $commitEntry['url'];
        $commit->sha      = $commitEntry['sha'];
        $commit->setCreatedAtAttribute($commitEntry["commit"]["author"]['date']);

        $commit->save();
      }
      unset($commitEntry);

    }

}
