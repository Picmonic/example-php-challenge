<?php // src/AppBundle/Models/Commits.php
namespace AppBundle\Models;

use AppBundle\Entity as ent;
use Symfony\Component\DependencyInjection\Container;
use Github;

/**
 * Model for API retrival & database opertions on GitHub Commit data
 */

class Commits {
 	private $c; // container
 	private $em;

	public function __construct(Container $c){
		$this->c = $c;
      	$this->em = $c->get('doctrine.orm.entity_manager');
	}

	/**
	 * Retrieves 25 latest commits via API
	 * Compares each sha to existing records
	 * Inserts unique entries into commit table
	 * 
	 * Optimization Note: Cursory research does not reveal 
	 * how to set ammount of commits retrieved.  Therefore,
	 * this method will order by latest, and then cull 
	 * anything past 25 in the array
	 */
	public function retrieveLatestCommits() {
		
		$client = new \Github\Client();
		$commits = $client->api('repo')->commits()->all('nodejs','node', array('sha','master'));
		$repository = $this->em->getRepository('AppBundle:Commit');

		for ($i = 0; $i < 25; ++$i) {
			$thisCommit = $commits[$i];

			if(!$repository->findOneBy(array('sha' => $thisCommit['sha']))) {
				$commit = new ent\Commit;

				$commit->setSha($thisCommit['sha']);
				$commit->setAuthorName($thisCommit['commit']['author']['name']);
				$commit->setAuthorEmail($thisCommit['commit']['author']['email']);
				$commit->setAuthorID($thisCommit['author']['id']);
				$commit->setCommitterName($thisCommit['commit']['committer']['name']);
				$commit->setCommitterEmail($thisCommit['commit']['committer']['email']);
				$commit->setCommitterID($thisCommit['committer']['id']);
				$commit->setTreeSha($thisCommit['commit']['tree']['sha']);
				$commit->setTreeUrl($thisCommit['commit']['tree']['url']);
				$commit->setMessage($thisCommit['commit']['message']);
				$commit->setUrl($thisCommit['url']);
				$commit->setHtmlUrl($thisCommit['html_url']);
				$commit->setComments($thisCommit['commit']['comment_count']);
				$commit->setCommitDate(new \DateTime($thisCommit['commit']['committer']['date']));

				$this->em->persist($commit);
			} 
		}
		$this->em->flush();
        $this->em->clear(); 
	}

	/** Retrieves the most recent 25 commits 
	* from the committ table 
	* @return array $commits array of commits
	*/
	public function getLatestCommits() {
		$repository = $this->em->getRepository('AppBundle:Commit');
		$query = $repository->createQueryBuilder('c')
	        ->orderBy('c.commit_date', 'DESC')
	        ->setMaxResults(25)
	        ->getQuery();

		$commits = $query->getResult();

		return $commits;
	}
}
?>