<?php

namespace App\Http\Controllers;

use App\Commit;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Log;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommitsController extends Controller
{
    /***
     *
     * For this simple demo, let's just plan on sending all data back as JSON.
     *
     * In a real app we'd handle input here f/ forms, api, etc. appropriately,
     * but for the sake of brevity, let's just plan on using a catch all here
     * to query github, sift and process the commits array returned, store it
     * in db via Commit model, and then pull from db and return to angular.
     *
     * Nah it ain't too pretty, but we want to finish this in a few hours. For
     * a real project we'd refactor this neatly and handle all the correct routes;
     * for now let's plan on setting up our Laravel routes under a simple 'api' endpoint.
     *
     */

    var $moo, $tmoo;

    /***
     *
     * Let's just use index for our main /api/HEAD request. In the future we'd want to
     * handle other verbs here as well e.g. (destroy, update etc...)
     *
     */
    public function index() {

        // grab desired commits array from github. Let's try utilizing "knplabs/github-api": "~1.4" first in composer.json
        $client = new \Github\Client();

        $commits = $client->api('repo')->commits()->all('nodejs', 'node', array('sha' => 'master'));

        $numCommitsToParse = 25;
        $numCurrentCommitBeingParsed = 0;

        // save 25 most recent commits to db
        foreach ($commits as $commit) {
            if ($numCurrentCommitBeingParsed < $numCommitsToParse) {
                $sha = $commit['sha'];

//                $tmoo[$sha]['author'] = $commit['commit']['author']['name'];
//                $tmoo[$sha]['date'] = $commit['commit']['author']['date'];
//                $tmoo[$sha]['msg'] = $commit['commit']['message'];
//                $tmoo[$sha]['sha'] = $commit['sha']; // bit redundant, but will be handy.

                // grab new Commit instance
                $cm = new Commit;

                // check to see if commit hash entry already exists
                $cmchk = Commit::where('hash', '=', $commit['sha'])->first();

                // if it does not exist, save->db
                if ($cmchk == null) {
                    $cm->author = $commit['commit']['author']['name'];
                    $cm->hash = $commit['sha'];
                    $cm->msg = $commit['commit']['message'];
                    $cm->date = $commit['commit']['author']['date'];

                    // save to db
                    $cm->save();

                    $numCurrentCommitBeingParsed++;
                }
            }
        }


        /***
         *
         * Yoink 25 most recent commits FROM DB (as specified in coding challenge
         * readme) and parse each for specific conditions ( e.g. hash_ends_in_number)
         *
         * Normally this functionality would probably live in a method somewhere else --
         * ahhh the joys of having time to refactor :-)
         *
         */
        $savedCommits = Commit::orderBy('date', 'desc')->take(25)->get();

//        foreach ($savedCommits as $savedCommit) {
//
//        }


        // json up the goodies and send 'em to angular
        //return Response::json(Commit::get());

        /***
         * Darn! Looks like Illuminate\Http\Response::json() is belly up.
         * Let's find something else to json encode with. Come on php, you can do it!
         */
//        return JsonResponse::create($commits);
//        return JsonResponse::create($tmoo);
        return JsonResponse::create($savedCommits);
    }


    public function store() {

    }
}
