<?php

namespace App\Http\Controllers;

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
        #$repositories = $client->api('user')->repositories;

        $commits = $client->api('repo')->commits()->all('nodejs', 'node', array('sha' => 'master'));
        



        // sift out stuff we don't want and put in nice simple multi-d array

        // check/clear db entries first perhaps??

        // save to db

        // cheat and sort by date (thank you mysql sorting) and return to angular

        // beer


        // json up the goodies and send 'em to angular
        //return Response::json(Commit::get());

        /***
         * Darn! Looks like Illuminate\Http\Response::json() is belly up.
         * Let's find something else to json encode with. Come on php, you can do it!
         */
        return JsonResponse::create($commits);
    }


    public function store() {

    }
}
