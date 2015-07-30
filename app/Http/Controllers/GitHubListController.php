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
       $commitsCollection = $this->github->pullRequests()->all('joyent', 'node',array('sha'=> 'master'));
       foreach ($commitsCollection as $commitEntry) {
         $commit = Commit::firstOrCreate([
           'number'     => $commitEntry["number"],
           'userName'   => $commitEntry["user"]["login"],
           'title'      => $commitEntry['title'],
           'body'       => $commitEntry['body'],
           'sha'        => $commitEntry['merge_commit_sha'],
           'created_at' => $commitEntry['created_at'],
           'updated_at' => $commitEntry['updated_at'],
           ]);
       }
       unset($commitEntry);
       return $commitsCollection;
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
