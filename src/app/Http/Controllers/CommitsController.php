<?php

namespace App\Http\Controllers;

use App\Commit;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

use GrahamCampbell\GitHub\Facades\GitHub;

class CommitsController extends Controller
{
    public function index()
	{
        // Get latest data from Github API
        $apiResults = GitHub::repo()->commits()->all('nodejs', 'node', array('sha' => 'master'));
        // Remove previous data
        Commit::truncate();
        // Save first 25 commits
        $count = 0;
        foreach ($apiResults as $result) {
            $message = strtok($result['commit']['message'], "\n")[0];
            Commit::create(array(
                'id' => $result['sha'],
                'author_email' => $result['commit']['author']['email'],
                'message' => $message
            ));
            $count++;
            if ($count > 25) {
                break;
            }
        }
        
        $commits = Commit::all();
        // Return recent commits from database
        return $commits;
    }
}
