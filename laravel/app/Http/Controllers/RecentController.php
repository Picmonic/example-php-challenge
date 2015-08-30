<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RecentController extends Controller {

    // eg. https://api.github.com/repos/twbs/bootstrap
	 const GITHUB_REPO_URL = 'https://api.github.com/repos/joyent/node';

    /**
     *
     *
     * @param
     * @return
     */
    public function index()
    {
        $this->_get_recent();

        //return view('recent');
    }

    /**
     * Get the recent changes to the github repo
	  * @see	https://developer.github.com/v3/repos/#get
     */
    private function _get_recent()
    {
        print "getting recent from... ";
		  print self::GITHUB_REPO_URL;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, self::GITHUB_REPO_URL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User-Agent: challenge-app',
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        echo $server_output;

        if ($errno = curl_errno($ch)) {
            echo $errno;
        }

        curl_close ($ch);
    }

    /**
     * Cheesy little debug function
     */
    private function d($what, $die = false)
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