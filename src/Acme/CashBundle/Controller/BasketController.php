<?php

namespace Acme\CashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * @Route("/add/{id}", name="acme_basket_add")
     * @return \Acme\CashBundle\Controller\Response
     */
    public function addAction(Request $request)
    {
        $session = $request->getSession();
        
        if ($session->has('basket')) {
            $basket = $session->get('basket');
        } else {
            $basket = array();
        }
        
        $productId = (int) $request->get('id');
        
        $em = $this->getDoctrine()->getManager();
        
        $product = $em->getRepository('AcmeProductBundle:Product')->find($productId);
        
       
        if ($product) {
            $basket[] = $productId;
            $session->set('basket', $basket);
            
            return new JsonResponse(array(
                'status' => 'success',
                'message' => 'Produkt został pomyślnie dodany do koszyka.'
            ));
        }
        
        return new JsonResponse(array(
            'status' => 'error',
            'message' => 'Wybrany produkt nie jest już dostępny.'
        ));
    }
    
    /**
     * @Route("/delete", name="acme_basket_delete")
     * @Method({"POST"})
     * 
     * @return \Acme\CashBundle\Controller\Response
     */
    public function deleteAction(Request $request)
    {
        $session = $request->getSession();
        
        $netto = 0; 
        $brutto = 0;
        
        if ($session->has('basket')) {
            $basket = $session->get('basket');
            
            $productId = (int) $request->get('id');
            
            $index = array_search($productId, $basket);
            
            if (is_numeric($index)) {
                unset($basket[$index]);
                $basket = array_values($basket);
                
                // Aktualizacja koszyka
                $session->set('basket', $basket);
                
                $em = $this->getDoctrine()->getManager();
            
                $query = $em->createQueryBuilder();
                
                $query->select('sum(p.price) as price')
                   ->from('AcmeProductBundle:Product', 'p')
                   ->where('p.id IN (?1)')
                   ->setParameter(1, $basket);
                
                $product = $query->getQuery()->getResult();

                if ($product) {
                    $brutto = round($product[0]['price'], 2);
                    $netto = round($brutto/1.23, 2);
                }
              
            }
        }
        
        return new JsonResponse(array(
            'status' => 'success',
            'message' => 'Wybrany produkt został usunięty z koszyka.',
            'costs' => array(
                'netto' => $netto,
                'brutto' => $brutto,
                'vat' => '23%'
            )
        ));
    }
}
