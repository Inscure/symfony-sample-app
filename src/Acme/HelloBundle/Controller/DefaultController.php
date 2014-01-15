<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\HelloBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Acme\HelloBundle\Form\ProductForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/product")
 */
class DefaultController extends Controller
{
    /**
     * 
     * 
     * @param string $name
     * @return type
     */
    public function dAction($name)
    {
        var_dump($this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name))); exit;
    }
    
    /**
     * @Route("/")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AcmeHelloBundle:Default:index.html.twig');
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
        
        /**
         * @Route("/list", name="product_list")
         * @return type
         */
        public function listAction()
        {
            $product = $this->getDoctrine()
                ->getRepository('AcmeHelloBundle:Product')
            ;
            
            // Rekordy produktów
            $productRows = $product->findAll();
            
            // Wyświetlanie szablonu
            return $this->render(
                'AcmeHelloBundle:Default:list.html.twig', 
                array(
                    'products' => $productRows
                )
            );
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
