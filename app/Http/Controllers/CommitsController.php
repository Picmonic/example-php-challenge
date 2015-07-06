<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Commit;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommitsController extends Controller
{

    public function index()
    {
        $commits = Commit::all();
        return \View::make('commits.index')->with('commits', $commits);
    }
    
    public function commitsByAuthor($author)
    {
        $commits = Commit::all()->where('login', $author);
        return \View::make('commits.author')->with('author', $author)->with('commits', $commits);
    }

}
