<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\App;
use App\Commit;

class GitHubResponseController extends Controller
{
    protected $github;

    public function __construct(GitHubManager $github)
    {
        $this->github = $github;

    }

    public function getCommits()
    {
       $commits = Commit::recent()->orderBy('userName')->take(35)->get();
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




}
