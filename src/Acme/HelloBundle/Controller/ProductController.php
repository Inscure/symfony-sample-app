<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HelloBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Acme\HelloBundle\Form\ProductForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/product")
 */
class ProductController extends Controller
{

    /**
     * Wyświetlanie listy produktów.
     * 
     * @Route("/", name="product_list")
     * @return Response
     */
    public function listAction()
    {
        

   

   
    
        $product = $this->getDoctrine()
            ->getRepository('AcmeHelloBundle:Product')
        ;

        // Rekordy produktów
        $productRows = $product->findAll();
        
        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createQueryBuilder();

        $query->select(array('p'))->from('AcmeHelloBundle:Product', 'p');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
    
        // Wyświetlanie szablonu
        return $this->render(
            'AcmeHelloBundle:Default:list.html.twig', 
            array(
                'pagination' => $pagination
            )
        );
     }

    /**
     * @Route("/create")
     * @return \Acme\HelloBundle\Controller\Response
     */
    public function createAction()
    {
            $product = new Product();
            $product->setName('A Foo Bar');
            $product->setPrice('19.99');
            $product->setDescription('Lorem ipsum dolor');

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return new Response('Created product id '.$product->getId());
    }
	
        /**
         * Dodawanie produktu
         * 
         * @Route("/new")
         * @param \Symfony\Component\HttpFoundation\Request $request
         * @return response
         */
	public function newAction(Request $request)
	{
            // Informacja, czy ma zostać wyświetlony widok po zapisaniu danych
            $saved = false;
            
            // Model
            $product = new Product();
            
            //$task->setName('Write a blog post');
            //$task->setDueDate(new \DateTime('tomorrow'));
		
            $form = $this->createForm(new ProductForm(), $product);
		
            $form->handleRequest($request);
           
            if ($form->isValid()) {
		$em = $this->getDoctrine()->getManager();
		$em->persist($product);
		$em->flush();
            
                $saved = true;
                
		//return $this->redirect($this->generateUrl('product_success'));
                
               
                return $this->render('AcmeHelloBundle:Default:new_success.html.twig', array(
                    'saved' => $saved
                ));
            }
	
            return $this->render('AcmeHelloBundle:Default:new.html.twig', array(
                'form' => $form->createView(),
            ));
	}
	
        /**
         * @Route("/show")
         * @param type $id
         * @return \Acme\HelloBundle\Controller\Response
         */
	public function showAction($id)
	{
		$product = $this->getDoctrine()
			->getRepository('AcmeHelloBundle:Product')
			->find($id);

		$categoryName = $product->getCategory()->getName();
		
		return new Response;
	}
        
       
	
	/*public function showProductAction($id)
	{
		$category = $this->getDoctrine()
			->getRepository('AcmeHelloBundle:Product')
			->find($id);

		$products = $category->getProducts();

		return new Response;
	}
	
	public function deleteAction()
	{
		$product = $this->getDoctrine()
			->getRepository('AcmeHelloBundle:Product')
			->find(1);
		
		if ($product) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($product);
			$em->flush();
		}
		
		return new Response;
	}*/
}
