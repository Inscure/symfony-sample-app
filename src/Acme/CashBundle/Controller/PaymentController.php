<?php

namespace Acme\CashBundle\Controller;

use Acme\CashBundle\Form\PaymentForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



/**
 * @Route("/basket")
 */
class PaymentController extends Controller
{
    /**
     * @Route("/payment", name="acme_basket_payment")
     * @return \Acme\CashBundle\Controller\Response
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        
        $basket = $session->get('basket', array());
        
        $price = 0;
        
        if ($basket) {
            $em = $this->getDoctrine()->getManager();
        
            $query = $em->createQueryBuilder();
        
            $query->select('sum(p.price) as price')
                   ->from('AcmeProductBundle:Product', 'p')
                   ->where('p.id IN (?1)')
                   ->setParameter(1, $basket);
            
            $product = $query->getQuery()->getResult();
            
            if ($product) {
                $price = round($product[0]['price'], 2);
            }
        } else {
            return $this->redirect($this->generateUrl('acme_basket_list'));
        }
        
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $client = $this->get('security.context')->getToken()->getUser();
        } else {
            $client = $session->get('client', array());
        }
        
        $form = $this->createForm(new PaymentForm(), $client);
        
        $form->handleRequest($request);
           
        if ($form->isValid()) {
            
            $session->remove('basket');
            
            if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                $em->persist($client);
                $em->flush();
                
                // Usuwanie sesji, by dane nie były widoczne po wylogowaniu
                $session->remove('client');
            } else {
                $session->set('client', $form->getData());
            }
            
            $view = array(
                'success' => true
            );
        } else {
            $view = array(
                'form' => $form->createView(),
                'costs' => $price,
                'success' => false
            );
        }
        
        return $this->render('AcmeCashBundle:Payment:index.html.twig', $view);
    }
    
    /**
     * @Route("/account", name="acme_basket_account")
     */
    public function accountAction() {
        
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('acme_basket_payment'));
        } else {
            return $this->render('AcmeCashBundle:Payment:account.html.twig');
        }
    }
}
