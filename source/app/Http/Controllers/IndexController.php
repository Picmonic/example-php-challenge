<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use DB;

class IndexController extends BaseController
{

    public function listCommits() {

        // Fetch latest commits
        $commits = DB::table('commits')->take(25)->get();

        return view('commits', ['commits' => $commits]);

    }


    public function listCommitsByAuthor() {

        // Fetch authors
        $authors = DB::table('commits')->orderBy('author_name', 'asc')->lists('author_name');

        // print_r($authors); die(); // Debugging

        // Create empty array
        $commitsByAuthor = array();

        foreach ($authors as $author) {

            // Fetch commits by author
            $commits = DB::table('commits')->where('author_name', '=', $author)->get();

            foreach ($commits as $commit) {

                // Add commits to commitsByAuthor array
                $commitsByAuthor[$author][] = $commit;
            }

        }

        // print_r($commitsByAuthor); die(); // Debugging

        return view('commitsByAuthor', ['commitsByAuthor' => $commitsByAuthor]);

    }

}
