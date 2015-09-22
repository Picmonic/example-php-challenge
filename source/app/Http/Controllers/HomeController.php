<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Commit;

class HomeController extends Controller
{
   
    public function index()
    {
        $commits = $this->updateAndReturnLatestCommits();
        $commitsSorted = [];
        foreach($commits as $commit){
            $commitsSorted[$commit->name][] = $commit->toArray();
        }
        return view('index', ['commits' => json_encode($commitsSorted)]);
    }

    private function updateAndReturnLatestCommits(){

        if($lastSavedCommit = Commit::orderBy('when', 'desc')->first())
            $url = "https://api.github.com/repos/nodejs/node/commits?per_page=25&since=".gmDate("Y-m-d\TH:i:s\Z", strtotime($lastSavedCommit->created_at));
        else
            $url = "https://api.github.com/repos/nodejs/node/commits?per_page=25";
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_USERAGENT,'Picmonic PHP Test');
        $data = curl_exec($curl);
        $data = json_decode($data);
        
        curl_close($curl);

        foreach($data as $commitData){
            $commit = new Commit();
            $commit->sha = $commitData->sha;
            $commit->name = $commitData->commit->author->name;
            $commit->message = $commitData->commit->message;
            $commit->when = $commitData->commit->committer->date;
            $commit->url = $commitData->commit->url;
            $commit->save();
        }
        


        return Commit::orderBy('when', 'desc')->take(25)->get();
    }

}
