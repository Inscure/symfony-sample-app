<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeUserBundle:Index:index.html.twig', array('name' => $name));
    }
}
