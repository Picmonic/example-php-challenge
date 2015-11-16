<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Github;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $viewParams = array();
        
        $client = new \Github\Client();
        $viewParams['commits'] = $client->api('repo')->commits()->all('nodejs','node', array('sha','master'));
        $viewParams['modelTest'] = $this->get('app.model.commits')->test();
        return $this->render('AppBundle:Main:index.html.twig',$viewParams);
    }
}
