<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class CommitFetchMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Initialize client object
        $client = new \Github\Client();

        // Fetch nodejs/node commits
        $commits = $client->api('repo')->commits()->all('nodejs', 'node', array('sha' => 'master'));

        // print_r($commits); die(); // Debugging

        foreach ($commits as $commit) {

            if (!DB::table('commits')->where('sha', '=', $commit['sha'])->get()) {

                // Insert the data
                DB::table('commits')->insert([
                    'sha'         => $commit['sha'],
                    'author_name' => $commit['commit']['author']['name'],
                    'author_email' => $commit['commit']['author']['email'],
                    'author_date' => $commit['commit']['author']['date'],
                    'message'     => $commit['commit']['message'],
                    'url'         => $commit['url']
                ]);

            }

        }

        return $next($request);
    }
}
