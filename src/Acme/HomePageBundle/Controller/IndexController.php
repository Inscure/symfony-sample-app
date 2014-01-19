<?php

namespace Acme\HomePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/")
 */
class IndexController extends Controller
{
    /**
     * @Route("/", name="main")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AcmeHomePageBundle:Index:index.html.twig');
    }
    
    /**
     * @Route("/contact", name="acme_homepage_contact")
     * @return Response
     */
    public function contactAction()
    {
        return $this->render('AcmeHomePageBundle:Index:contact.html.twig');
    }
}
