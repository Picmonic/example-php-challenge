<?php

namespace App\Http\Controllers\Api;

use App\Commit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommitController extends Controller
{
    public function index(){
        return Commit::orderBy('committed_at', 'desc')->limit(25)->with('author')->with('committer')->get();
    }

    public function checkForNew() {
        return Commit::storeLatestNodeJSCommits(true);
    }
}
