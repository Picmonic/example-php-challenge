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
            $a_avatar_url = '';
            if ($result['author'] != null) {
                $a_avatar_url = $result['author']['avatar_url'];
            }
            
            
            $message = strtok($result['commit']['message'], "\n");
            Commit::create(array(
                'sha' => $result['sha'],
                'author_email' => $result['commit']['author']['email'],
                'author_name' => $result['commit']['author']['name'],
                'author_avatar_url' => $a_avatar_url,
                'message' => $message
            ));
            $count++;
            if ($count > 25) {
                break;
            }
        }
        
        // Retrive from database
        $commits = Commit::all();
        
        $data = array();
        $authorsData = array();
        foreach ($commits as $commit) {
            $data['commits'][$commit['author_email']][] = array(
                'sha' => $commit['sha'],
                'message' => $commit['message']
            );
            $authorsData[$commit['author_email']]['name'] = $commit['author_name'];
            $authorsData[$commit['author_email']]['avatar_url'] = $commit['avatar_url'];
        }

        // Convert author object to array
        foreach ($authorsData as $email => $authorData) {
            $temp = $authorData;
            $temp['email'] = $email;
            $data['authors'][] = $temp;
        }

        // Return recent commits from database
        return $data;
    }
}
