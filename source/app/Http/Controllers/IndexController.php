<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class IndexController extends BaseController
{

    public function fetchCommits() {

        // Initialize client object
        $client = new \Github\Client();

        // Fetch nodejs/node commits
        $commits = $client->api('repo')->commits()->all('nodejs', 'node', array('sha' => 'master'));

        // print_r($commits); die(); // Debugging

        return view('index', ['commits' => $commits]);

    }

}
