<?php

namespace Acme\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/product")
 */
class IndexController extends Controller
{
    /**
     * Wyświetlanie listy produktów.
     * 
     * @Route("/", name="acme_product_list")
     * @return Response
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();

        $query->select(array('p'))->from('AcmeHomePageBundle:Product', 'p');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            10
        );
    
        // Wyświetlanie szablonu
        return $this->render(
            'AcmeProductBundle:Index:list.html.twig', 
            array(
                'pagination' => $pagination
            )
        );
     }
}
