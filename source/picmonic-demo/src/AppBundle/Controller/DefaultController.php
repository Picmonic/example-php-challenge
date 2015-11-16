<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $viewParams = array();
        // Call retrieveLatestCommits to update database
        $this->get('app.model.commits')->retrieveLatestCommits();
        // Retrieve last 25 results from database
        $viewParams['commits'] = $this->get('app.model.commits')->getLatestCommits();
        
        return $this->render('AppBundle:Main:index.html.twig',$viewParams);
    }
}
