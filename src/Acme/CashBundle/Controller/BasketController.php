<?php

namespace Acme\CashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use Acme\ProductBundle\Entity\Product;

/**
 * @Route("/basket")
 */
class BasketController extends Controller
{
    protected $session;
    
    /**
     * @Route("/", name="acme_basket_list")
     * @return Response
     */
    public function listAction(Request $request)
    {
        $session = $request->getSession();
       
        $basket = $session->get('basket', array());
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();

        $products = array();
        $brutto = 0;
        $netto = 0;
        if ($basket) {
            $query->select(array('p'))
                ->from('AcmeProductBundle:Product', 'p')
                ->where('p.id IN (?1)')
                ->setParameter(1, $basket);
            
            $products = $query->getQuery()->getResult();

            foreach($products as $product) {
                $brutto += $product->getPrice();//price;
            }
            
            $brutto = round($brutto, 2);
            
            if ($brutto > 0) {
                $netto = round($brutto/1.23, 2);
            }
        }
        
        return $this->render('AcmeCashBundle:Basket:list.html.twig', array(
            'products' => $products,
            'brutto' => $brutto,
            'netto' => $netto
        ));
    }
    
    /**
     * @Route("/add", name="acme_basket_add")
     * @return \Acme\CashBundle\Controller\Response
     */
    public function addAction()
    {
        return new Response;
    }
    
    /**
     * @Route("/delete", name="acme_basket_delete")
     * @return \Acme\CashBundle\Controller\Response
     */
    public function deleteAction()
    {
        return new Response;
    }
}
