<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Commit;

use GrahamCampbell\GitHub\Facades\GitHub;


class GithubController extends Controller
{
    private $commitsLimit = 25;


    public function github()
    {
        $organization = \Request::input('organization');
        $repo = \Request::input('repo');        
        
        $v = \Validator::make(['organization' => $organization, 'repo' => $repo], [
            'organization' => 'required',
            'repo' => 'required',
        ]);

        if ($v->fails()) {
            return $v->errors();
        }
        
        GitHub::me()->organizations();
        $results = GitHub::repo()->commits()->all($organization, $repo, array('sha' => 'master'));
        
        foreach ($results as $key => $result) {
            
            if ($key <= $this->commitsLimit) {
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
        return $results;        
    }    

}
