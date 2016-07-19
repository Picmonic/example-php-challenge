<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GrahamCampbell\GitHub\Facades\GitHub;


use Carbon\Carbon;
use App\Commit;
use Redis;

class CommitsController extends Controller
{
    public function index() {

    	$commitsFromGithub = GitHub::repo()->commits()->all('nodejs', 'node', []);

    	$commits = Commit::fetchLatest($commitsFromGithub);

    	$lastUpdated = new Carbon(Redis::get('latest_fetch'));

    	return view('commits', compact('commits', 'lastUpdated'));


	   	
	}
}
