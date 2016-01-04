<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\node_commits;
use GuzzleHttp;

class ChallengeController extends Controller
{
    public function __construct()
    {

    }

    public function getIndex()
    {

        //we only ever store 25 records
        $result = node_commits::all();

        //make sure blade doesn't choke if there's no data
        if(count($result) > 0) {
            $alert = $result[0]['updated_at'];
        } else {
            $alert = false;
        }
        return view('partials.challenge', compact('result', 'alert'));

    }

    public function getApiData()
    {

            //**we're going to empty the table
            //  but first let's make sure we have data to replace it
            $req = new GuzzleHttp\Client();
            $comms = $req->request('GET', 'https://api.github.com/repos/nodejs/node/commits');

            if ($comms->getStatusCode() == 200) {
                //empty the node_commits table
                node_commits::truncate();
                $result = json_decode($comms->getBody(), true);

                //Github kindly returns the commits in reverse chronology
                for ($i = 0; $i < 25; $i++) {

                    $sha = $result[$i]['sha'];
                    $author = $result[$i]['commit']['author']['name'];
                    //this is going to be ugly
                    //we have to truncate Github's weird time formatting
                    $dateArray = explode('T', $result[$i]['commit']['committer']['date']);
                    $date = $dateArray[0];
                    //set the class
                    if (ctype_digit(substr($sha, -1))) {
                        $class = 'special';
                    } else {
                        $class = 'standard';
                    }
                    //put it away in the db
                    node_commits::updateOrCreate(
                        ['commit_hash' => $sha],
                        [
                            'commit_hash' => $sha,
                            'commit_author' => $author,
                            'commit_date' => $date,
                            'commit_class' => $class
                        ]
                    );

                }

                return $i;
            }

        return $i=1;
    }

    private function prettifyArrays(array $array) {
        $res = '<pre>' . print_r($array, true) . '</pre>';

        return $res;
    }
}