<?php

namespace Acme\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/category") 
 */
class IndexController extends Controller
{
    /**
     * @Route("/", name="acme_category_list")
     * @return Response
     */
    public function listAction()
    {
        return $this->render('AcmeCategoryBundle:Index:list.html.twig');
    }
}
