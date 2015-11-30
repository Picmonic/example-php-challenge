<?php

namespace App\Http\Controllers;

use App\GithubChallenge;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    /**
     * builds the commits array and sends data to view
     *
     * @return   view 
     */

    public function showAuthors() {
        $myGithub = new GithubChallenge();
        $myGithub->getCommits(); //retrieves all commits from db

        return view('showauthors', ['authors' => $myGithub->getAuthors(), 'commits' => $myGithub->commits]); //pass data to view
    }
}