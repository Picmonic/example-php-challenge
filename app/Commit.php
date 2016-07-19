<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Redis;
use Cache;

class Commit extends Model
{

    protected $fillable = ['sha', 'author', 'avatar', 'url'];


    public static function date($commit) {
    	return $commit['commit']['committer']['date'];
    }


    public static function fetchLatest($commits) {

    	$latestCommitGithub = Commit::date($commits[0]);
    	//check if latest fetch timestamp in cache equals timestamp of latest commit on Github
    	if(Redis::get('latest_fetch') == $latestCommitGithub)
    		return self::fetchCommits();

   	   	self::addNewCommits($commits);

   	   	//Update cache of latest fetch timestamp and grab commits from db
   	   	Redis::set('latest_fetch', $latestCommitGithub);
   	   	return $commits = self::fetchCommits();
    }

    public static function fetchCommits() {
    	$result = Cache::rememberForever('commits_list', function() {
    		 return  DB::table('commits')
    		 		->orderBy('id', 'desc')
    				->take(25)
    				->get();
    	});
    	return $result;
    }

    public static function addNewCommits($commits) {    	
   		//grab 25 of the recent commits
	   	$recentCommits = array_splice($commits, 0, 25);
	   	// reverse chronological order so adding to database with latest commits last
   	   	$recentCommits = array_reverse($recentCommits);

       	$i = 25;
   	   	foreach($recentCommits as $commit) {
   	   	  	//add to cache the latest commit timestamp
   	   		if($i == 0)  Cache::rememberForever('last_fetched', Commit::date($commit));		   	   		
  	   		Commit::firstOrCreate([
  	   			'sha' => $commit['sha'],
  	   			 'author' => $commit['commit']['author']['name'],
  	   			 'avatar' => $commit['author']['avatar_url'],
  	   			 'url' => $commit['html_url']
  	   			]);  

  	   		$i--;  
   	   	} 
   	   	//Flush databse query cache
   	   	Redis::del('laravel:commits_list');  	
    }
}
