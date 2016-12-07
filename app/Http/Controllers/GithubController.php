<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commit;

use GrahamCampbell\GitHub\Facades\GitHub;


class GithubController extends Controller
{

    public function github()
    {
        $commitsLimit = 25;        
        
        GitHub::me()->organizations();
        $results = GitHub::repo()->commits()->all('joyent', 'node', array('sha' => 'master'));        
        
        foreach ($results as $key => $result) {
            
            if ($key <= $commitsLimit) {
                try {
                    $commit = new Commit();
                    $commit->sha = $result['sha'];
                    $commit->message = $result['commit']['message'];
                    $commit->login = $result['author']['login'];
                    $commit->save();

                } catch(\Illuminate\Database\QueryException $e) {
                    //  catch duplicate sha $e->errorInfo;
                }
            }
        }

        return \View::make('layouts.master');
    }    

}