<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\Request;
use GrahamCampbell\GitHub\GitHubManager;


class GithubController extends Controller {

	protected $github;

    public function __construct(GitHubManager $github)
    {
        $this->github = $github;
    }

    public function index()
    {
        $data = [];
        $recentContributors = [];
        $data['commits'] = $this->github->api('repo')->commits()->all('joyent', 'node', array('sha' => 'master'));

        // Abstract this functionality to a repo
        foreach($data['commits'] as $k => $v) {
            //dd($v);
            foreach($v as $key => $value) {
                if($key == 'author') {
                    if(!array_key_exists($value['login'], $recentContributors) && $value['login'] != '')
                    {
                        $recentContributors[$value['login']] = $value;
                    }
                }
            }
        }
        $data['recentContributors'] = $recentContributors;

        return view('github.index')->with($data);
    }

    public function contributors()
    {
        $data = [];
        $data['contributors'] = $this->github->api('repo')->contributors('joyent', 'node');

        return view('github.contributors')->with($data);
    }

    public function commitsMadeByContributors($id)
    {
        $data = [];
        $data['user'] = $id;
        $data['commits'] = $this->github->api('repo')->commits()->all('joyent', 'node', array('sha' => 'master', 'author' => $id));

        return view('github.contributorCommits')->with($data);
    }


}
