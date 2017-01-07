<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp;

class Commit extends Model
{
    public $timestamps = false;

    public function author() {
        return $this->hasOne('App\Contributor', 'id', 'author_id');
    }

    public function committer() {
        return $this->hasOne('App\Contributor', 'id', 'committer_id');
    }

    public static function storeLatestNodeJSCommits($returnContributors=false) {
        $maxToStore = 25;
        $storedCommits = [];
        $commitList = Commit::getLatestNodeJsCommits();
        if($commitList !== null){
            foreach($commitList as $commit){
                $author = Contributor::firstOrCreate([
                    'email' => $commit->commit->author->email,
                    'name' => $commit->commit->author->name,
                ]);
                $committer = Contributor::firstOrCreate([
                    'email' => $commit->commit->committer->email,
                    'name' => $commit->commit->committer->name,
                ]);
                if($author !== null && $committer !== null){
                    $newCommit = new Commit();
                    $newCommit->author_id = $author->id;
                    $newCommit->committer_id = $committer->id;
                    $newCommit->authored_at = date('Y-m-d H:i:s', strtotime($commit->commit->author->date));
                    $newCommit->committed_at = date('Y-m-d H:i:s', strtotime($commit->commit->committer->date));
                    $newCommit->comment_count = $commit->commit->comment_count;
                    $newCommit->message = $commit->commit->message;
                    $newCommit->sha = $commit->sha;
                    $newCommit->save();

                    if($newCommit->id){
                        if($returnContributors){
                           $newCommit->author;
                            $newCommit->committer;
                        }
                        $storedCommits[] = $newCommit;
                        if(count($storedCommits) === $maxToStore){
                            break;  // reached max to store
                        }
                    }
                }
            }
        }
        return $storedCommits;
    }

    public static function getLatestNodeJsCommits() {
        $client = new GuzzleHttp\Client();
        // get most recent SHA from database to limit the number of returned commits
        $latestCommit = Commit::orderBy('committed_at', 'desc')->first();
        $lastSha = ($latestCommit) ? '/' . $latestCommit->sha : '';
        $response = $client->request('GET', 'https://api.github.com/repos/nodejs/node/commits' . $lastSha);
        if($response->getStatusCode() === 200) {
            $results = json_decode($response->getBody());
            if(is_array($results)) {
                return $results;
            }
        }

        return null;
    }

}
