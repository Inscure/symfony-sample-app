<?php

namespace Acme\ProductBundle\Controller;

use Acme\ProductBundle\Entity\Product;
use Acme\ProductBundle\Form\ProductForm;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/product")
 */
class AdminController extends Controller
{
    /**
     * Dodawanie produktu
     * 
     * @Route("/add", name="acme_product_add")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return response
     */
    public function addAction(Request $request)
    {
        // Model
        $product = new Product();

        $form = $this->createForm(new ProductForm(), $product);

        $form->handleRequest($request);
           
        $success = false;
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $success = true;
        }

        return $this->render('AcmeProductBundle:Admin:form.html.twig', array(
            'success' => $success,
            'form' => $form->createView(),
            'type' => 'add'
        ));
    }

    /**
     * @Route("/edit/{id}", name="acme_product_edit")
     * @param int $id
     * @return Response
     */
    public function editAction(Request $request)
    {
        // Model
        $product = $this->getDoctrine()
                ->getRepository('AcmeProductBundle:Product')
                ->find($request->get('id'));

        $form = $this->createForm(new ProductForm(), $product);

        $form->handleRequest($request);
           
        $success = false;
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $success = true;
        }

        return $this->render('AcmeProductBundle:Admin:form.html.twig', array(
            'success' => $success,
            'form' => $form->createView(),
            'type' => 'edit'
        ));
    }
    
     /**
     * @Route("/delete", name="acme_product_delete")
     * @Method({"POST"})
     * @return Response
     */
    public function deleteAction(Request $request)
    {
        // Model
        $product = $this->getDoctrine()
                ->getRepository('AcmeProductBundle:Product')
                ->find($request->get('id'));
        
        if ($product) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();
        }
        
        return new JsonResponse(array(
            'status' => 'success',
            'message' => 'Produkt został pomyślnie usunięty.'
        ));
    }
}
