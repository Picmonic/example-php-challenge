<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use DB;

class IndexController extends BaseController
{

    public function listCommits() {

        // Fetch latest commits
        $commits = DB::table('commits')->take(25)->get();

        return view('index', ['commits' => $commits]);

    }


    public function listCommitsByAuthor($name) {

        // Fetch latest commits
        $commits = DB::table('commits')->take(25)->get();

        return view('index', ['commits' => $commits]);

    }

}
