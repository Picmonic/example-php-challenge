<?php

namespace App\Http\Controllers;

use App\Commit;
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
	    $commits = Commit::all();
	    return view('commits')->with('commits', $commits);
    }
}