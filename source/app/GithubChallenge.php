<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GithubChallenge extends Model
{
	public $commits = array();

	/**
	 * gets the commits from github for the node repo
	 *
	 * @param    string  $object start from the beginning or last
	 * @param    int  $count the amount to get
	 * @return   bool (if it worked or not)
	 */

	public function getCommitsFromGithub($type, $count) {
		
		$client = new \Github\Client(); //new gitbut client from library

		try {
			$commits = $client->api('repo')->commits()->all('nodejs', 'node', array('sha' => 'master')); //use master branch
		} catch (Exception $e){
			return false;
		}

		$this->commits = array_slice($commits, 0, $count); //trims to last 25 since githubs api doesnt appear to have a limit in request
		
		return true;
	}

	/**
	 * saves the commits from github to mongodb in the githubChallenge db and commits collection
	 *
	 * @return   bool (if it worked or not)
	 */

	public function saveCommits() {

		$conn= new \MongoClient('mongodb://localhost');
		$db = $conn->githubChallenge; //create new/establish db

		$collection = $db->commits; //create/use commit collection
		try{
			$this->trucateCommits();
			foreach($this->commits as $tempCommit) { //loop through commits array to save into db
				$collection->insert($tempCommit); //save into db.	
			}
		} catch (Exception $e) {
			return false;
		}

		return true;
		
	}

	/**
	 * truncates the commits collection for new storage
	 *
	 * @return   bool (if it worked or not)
	 */

	private function trucateCommits() { 

		$conn= new \MongoClient('mongodb://localhost');
		$db = $conn->githubChallenge; //establish db
		$collection = $db->commits; //use commit collection

		return $collection->remove(); //truncates collection

	}

	/**
	 * retrieves the commits collection from mongo and puts it in property
	 *
	 * @return   bool (if it worked or not)
	 */

	public function getCommits() {
	
		$conn= new \MongoClient('mongodb://localhost');
		$db = $conn->githubChallenge; //create new/establish db
		$collection = $db->commits; //create/use commit collection
		$cursor = $collection->find(); //finds documents in collection
		foreach ($cursor as $doc) {
		    $this->commits[] = $doc; //adds to property so it can be used elsewhere
		}

		return true;
	}

	/**
	 * retrieves a unique, sorted list of authors that are stored in the db
	 *
	 * @return   array 	list of unique authors in sorted array
	 */

	public function getAuthors(){
		$authors = array(); 
		foreach($this->commits as $commit){ //loop through each commit 
			$authors[] = $commit['commit']['author']['name'];  //find the author in array
		}
		$authors = array_unique($authors); //removes duplicates
		asort($authors);//sorts list
		return $authors;
	}

}
