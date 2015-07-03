<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\commits;
use Carbon\Carbon;

class GitHubApiController extends Controller
{


    /*
     * Retrieve Github using Client lib
     *
     * Loop items to store in DB check if entry exists before adding it to avoid duplicates
     *
     * Dump & Die if there are errors
     *
     * Leon please let me know if this was the right place (in the constructor) to do this. Wasn't sure if this following good
     * coding practices. I Googled it, but I couldn't find anything on it.
     * */
    private $client;
    private $username;

    public function __construct(\Github\Client $client)
    {
        $this->client = $client;

        $i = 0;

        try {

            $repos = $this->client->api('repo')->commits()->all('joyent', 'node', array('sha' => 'master'));


            for($i; $i < 25; $i++) {

                $checkIfExists = commits::where('sha', '=', $repos[$i]['sha']);

                if(!$checkIfExists->exists()){

                    commits::create(array(
                        'sha'         => $repos[$i]['sha'],
                        'author'      => $repos[$i]['commit']['author']['name'],
                        'message'     => $repos[$i]['commit']['message'],
                        'apiUrl'      => $repos[$i]['url'],
                        'html_url'    => $repos[$i]['html_url'],
                        'authorImage' => $repos[$i]['author']['avatar_url'],
                        'created_at'  => date('Y-m-d H:i:s', strtotime($repos[$i]['commit']['author']['date']))
                    ));

                }
            }
        } catch (\RuntimeException $e) {
            $this->$e->getMessage();
            dd($e->getCode() . ' - ' . $e->getMessage());
        }


    }

    /**
     * Call scope query to get DB records for API call
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function index()
    {
        $model = commits::dlist()->get();

        return response()->json($model);

    }

}
