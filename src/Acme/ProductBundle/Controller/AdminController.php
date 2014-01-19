<?php

namespace Acme\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ProductBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Acme\Product\Form\ProductForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/product")
 */
class AdminController extends Controller
{
    /**
     * Dodawanie produktu
     * 
     * @Route("/add")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return response
     */
    public function addAction(Request $request)
    {
        // Informacja, czy ma zostać wyświetlony widok po zapisaniu danych
        $saved = false;

        // Model
        $product = new Product();

        $form = $this->createForm(new ProductForm(), $product);

        $form->handleRequest($request);
           
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $saved = true;
        }

        return $this->render('AcmeProductBundle:Admin:add.html.twig', array(
            'saved' => $saved,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/edit/{id}")
     * @param int $id
     * @return Response
     */
    public function editAction($id)
    {
        return $this->render('AcmeProductBundle:Admin:edit.html.twig', array(
            'saved' => $saved,
            'form' => $form->createView(),
        ));
    }
    
     /**
     * @Route("/delete/{id}")
     * @param int $id
     * @return Response
     */
    public function deleteAction($id)
    {
        return $this->render('AcmeProductBundle:Admin:delete.html.twig', array(
            'saved' => $saved,
            'form' => $form->createView(),
        ));
    }
}
