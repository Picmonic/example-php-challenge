<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\App;

class GitHubListController extends Controller
{
    protected $github;

    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
    }

    public function getCommits()
    {
       $commits = $this->github->pullRequests()->all('joyent', 'node',array('sha'=> 'master'));
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
