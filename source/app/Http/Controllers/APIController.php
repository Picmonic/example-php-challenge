<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GitHub;
use Cache;
use App\Repository;

class APIController extends Controller
{
	/**
	 * Display the commits of a given repository
	 */
	public function anyCommits(Request $request) {
		// Repository input
		$user = $request->get('user', 'nodejs');
		$repository = $request->get('repository', 'node');

		// Pagination input
		$page = $request->get('page', 1);
		$perPage = $request->get('perPage', 20);
		if($perPage > 100) $perPage = 100;

		// Cache key
		$key = sprintf('repository-commits-%s-%s-%s-%s', $user, $repository, $page, $perPage);

		// Fetch from or generate cache and return
		$commits = Cache::remember($key, 300, function() use ($user, $repository, $page, $perPage) {
			$repo = Repository::firstOrCreate([
				'user' => $user,
				'repository' => $repository
			]);
			return $repo->fetchCommits($perPage);
		});

		// Return result
		return $commits;
	}
}
