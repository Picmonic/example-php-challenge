<?php

namespace App\Http\Controllers;

use App\GithubChallenge;
use App\User;
use App\Http\Controllers\Controller;

class GithubController extends Controller
{
    /**
     * will call functions to fetch and save commits 
     *
     * @param  string type. first or last 
     * @param  int  $count. how many commits
     * @return  to ajax call
     */
    public function getCommits($type, $count) //action
    {
        if(is_numeric($count) && in_array($type, array('last', 'first'))) { //validation of two input params
            $tempGithub = new GithubChallenge();
            $tempGithub->getCommitsFromGithub($type, $count); //calling model function to get commits
            if($tempGithub->saveCommits()) { 
                echo '1'; // it worked!
            }
        } else {
            echo '0'; //it failed
        }
    }
}