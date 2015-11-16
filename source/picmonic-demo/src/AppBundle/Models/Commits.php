<?php // src/AppBundle/Models/Commits.php
namespace AppBundle\Models;

use Icims\CoreBundle\Entity as ent;
use Symfony\Component\DependencyInjection\Container;

class Commits {
 	protected $_c; // container
 	protected $_em;

	public function __contruct(Container $c){
		$this->_c = $c;
      	$this->_em = $c->get('doctrine.orm.entity_manager');
	}

	public function test() {
		return "commits model online!";
	}
}
?>