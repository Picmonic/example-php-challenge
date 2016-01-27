<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GitHub;

class Repository extends Model
{
	protected $guarded = [];

	/**
	 * Fetch and possibly update the repository commits
	 */
	public function fetchCommits($perPage=20) {
		if(!$this->fetched_at || $this->fetched_at <= (time() - 43200)) {
			$commits = GitHub::repo()->commits()->all($this->user, $this->repository, []);
			foreach($commits as $commit) {
				$c = Commit::firstOrNew([
					'repository_id' => $this->id,
					'sha' => $commit['sha']
				]);
				$c->committer = $commit['committer']['login'];
				$c->author = isset($commit['author']['login']) ? $commit['author']['login'] : 
					(isset($commit['author']['name']) ? $commit['author']['name'] : 
						(isset($commit['author']['email']) ? $commit['author']['email'] : '(unknown)')
					)
				;
				$c->url = $commit['html_url'];
				$c->save();
				// TODO: Fetch comments
			}
			$this->update(['fetched_at' => time()]);
		}
		return $this->commits()->paginate($perPage);
	}

	/**
	 * Repository commits
	 */
	public function commits() {
		return $this->hasMany('App\Commit');
	}
}
