<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RecentController extends Controller {

	 const GITHUB_REPO_URL = 'https://api.github.com/repos/joyent/node';
	 const GITHUB_COMMITS_URL = self::GITHUB_REPO_URL . '/commits';

    /**
     *
     *
     * @param
     * @return
     */
    public function index()
    {
        $recent_commits = $this->_get_recent();

        $data = array(
            'recent_commits' => $recent_commits,
        );

		  return view('recent')->with($data);
    }

    /**
     * Get the recent changes to the github repo
	  * @see	https://developer.github.com/v3/repos/#get
     */
    private function _get_recent()
    {
        $github_data = $this->_get_github_data(self::GITHUB_COMMITS_URL);

        // pull out the pieces we want
		  $recent_commits = [];
        foreach($github_data as $recent_commit)
        {
			   // TO DO: add in any additional fields?
            $commit = [
					'sha' => $recent_commit->sha,
					'sha_10' => substr($recent_commit->sha, -7, 7),
					'author_name' => $recent_commit->commit->author->name,
					'author_email' => $recent_commit->commit->author->email,
					'author_date' => $recent_commit->commit->author->date,
					'message' => $recent_commit->commit->message,
					'url' => $recent_commit->commit->url,
				];

            // add in each commit
			   $recent_commits[] = $commit;
		  }

		  return $recent_commits;
    }

    /**
     * Get data from the github repo for a given url using curl
	  * @see
     */
    private function _get_github_data($url = '')
    {
        $CH = curl_init();

        curl_setopt($CH, CURLOPT_URL, $url);
        curl_setopt($CH, CURLOPT_HTTPHEADER, array(
            'User-Agent: challenge-app',
        ));

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