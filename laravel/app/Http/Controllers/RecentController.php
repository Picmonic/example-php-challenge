<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\Commit;

class RecentController extends Controller {

	 //const GITHUB_REPO_URL = 'https://api.github.com/repos/joyent/node';
	 const GITHUB_REPO_URL = 'https://api.github.com/repositories/211666'; // just changed?
	 const GITHUB_COMMITS_URL = self::GITHUB_REPO_URL . '/commits';

    /**
     * Index function for Recent controller
     *
     * @param none
     * @return array
     */
    public function index()
    {
        // store recent commits from github
		  $this->_save_recent();

		  // retrieve 25 most recent
		  $recent_from_db = DB::table('commit')
			  ->orderBy('author_date', 'desc')
			  ->limit(25)
			  ->get();

        // convert to array, add in additional information for the view
		  $recent_commits = [];
        foreach($recent_from_db as $recent)
		  {
            $commit = [
                'sha' => $recent->sha,
					 'sha_10' => substr($recent->sha, -7, 7), // added to model
                'author_name' => $recent->author_name,
                'author_email' => $recent->author_email,
                'author_date' => $recent->author_date,
                'message' => $recent->message,
                'url' => $recent->url,
				];

				// add in a row highlight for numeric-ending commit hashes
				$commit['highlight_row'] = preg_match("/[0-9]/", substr($commit['sha_10'], -1, 1));

				// add to list
            $recent_commits[] = $commit;
    	  }

        // prepare for viewing in template
        $data = [
            'recent_commits' => $recent_commits,
        ];

		  return view('recent')->with($data);
    }

    /**
     * Get the recent changes to the github repo and save in local database
	  * @see	https://developer.github.com/v3/repos/#get
     */
    private function _save_recent()
    {
        $github_data = $this->_get_github_data(self::GITHUB_COMMITS_URL);

        // pull out the pieces we want
        foreach($github_data as $recent_commit)
        {
				// convert date
				try
				{
					$temp = new \DateTime($recent_commit->commit->author->date);
					$date_time = $temp->format("Y-m-d H:i:s");
				}
				catch (Exception $e)
				{
				    $date_time = '';
				}

			   // TO DO: add in any additional fields?
            $commit = [
					'sha' => $recent_commit->sha,
					'author_name' => $recent_commit->commit->author->name,
					'author_email' => $recent_commit->commit->author->email,
					'author_date' => $date_time,
					'message' => $recent_commit->commit->message,
					'url' => $recent_commit->commit->url,
				];

			  // save commit
			  // TO DO: not sure how to enforce unique
			  // $this_commit = Commit::create($commit);
			  Commit::updateOrCreate(
               ['sha' => 1],
               $commit
            );
		  }
    }

    /**
     * Get data from the github repo for a given url using curl
     */
    private function _get_github_data($url = '')
    {
        $CH = curl_init();

        curl_setopt($CH, CURLOPT_URL, $url);
        curl_setopt($CH, CURLOPT_HTTPHEADER, ['User-Agent: challenge-app']);
        curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);

        $curl_output = curl_exec($CH);
        $github_data = json_decode($curl_output);

        // TO DO: add better error handling
        if ($errno = curl_errno($CH)) {
            echo $errno;
        }

        curl_close ($CH);
		  return $github_data;
    }

    /**
     * Cheesy little debug function
     */
    public function d($what, $die = false)
    {
		  print <<<HD
			  <pre>
				  <textarea style="display: block; width: 1000px; height: 300px;">
HD;
		  print_r($what);
		  print <<<HD
				  </textarea>
			  </pre>
HD;
		  if ($die)
			  die;
    }
}