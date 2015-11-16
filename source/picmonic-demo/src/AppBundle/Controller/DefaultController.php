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
        $viewParams['testArray'] = array('one' => 'foo', 2 => 'bar');

        return $this->render('AppBundle:Main:index.html.twig',$viewParams);
    }
}
