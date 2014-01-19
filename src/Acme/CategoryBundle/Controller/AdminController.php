<?php

namespace Acme\CategoryBundle\Controller;

use Acme\CategoryBundle\Entity\Category;
use Acme\CategoryBundle\Form\CategoryForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/category")
 */
class AdminController extends Controller
{
    /**
     * Dodawanie produktu
     * 
     * @Route("/add")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     */
    public function addAction(Request $request)
    {
        // Informacja, czy ma zostać wyświetlony widok po zapisaniu danych
        $saved = false;

        // Model
        $product = new Category();

        $form = $this->createForm(new CategoryForm(), $product);

        $form->handleRequest($request);
           
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $saved = true;
        }

        return $this->render('AcmeCategoryBundle:Admin:add.html.twig', array(
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
        return $this->render('AcmeCategoryBundle:Admin:edit.html.twig', array(
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
