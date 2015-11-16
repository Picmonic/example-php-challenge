<?php // src/AppBundle/Models/Commits.php
namespace AppBundle\Models;

use Icims\CoreBundle\Entity as ent;
use Symfony\Component\DependencyInjection\Container;
use Github;

class Commits {
 	protected $_c; // container
 	protected $_em;

	public function __contruct(Container $c){
		$this->_c = $c;
      	$this->_em = $c->get('doctrine.orm.entity_manager');
	}

	/**
	 * Retrieves 25 latest commits via API
	 * Optimization: Cursory research does not reveal 
	 * how to set ammount of commits retrieved.  Therefore,
	 * this method will order by latest, and then cull 
	 * anything past 25 in the array
	 * @return array $commits array of commits
	 */
	public function retrieveLatestCommits() {
		$client = new \Github\Client();
		$clients = $client->api('repo')->commits()->all('nodejs','node', array('sha','master'));

		return $clients;
	}
	/**
	 * [updateCommits description]
	 * @return [type] [description]
	 */
	public function updateCommits() {

	}

	public function getLatestCommits() {

	}
}
?>