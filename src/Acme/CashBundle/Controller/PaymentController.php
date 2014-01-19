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
        
        $form = $this->createForm(new PaymentForm());
        
        $em = $this->getDoctrine()->getManager();
        
        $query = $em->createQueryBuilder();
        
        $basket = $request->getSession()->get('basket', array());
        
        $price = null;
        
        if ($basket) {
            $query->select('sum(p.price)')
                   ->from('AcmeProductBundle:Product', 'p')
                   ->where('p.id IN (?1)')
                   ->setParameter(1, $basket);
            
            $price = $query->getQuery()->getResult();
        } else {
            
            return $this->redirect($this->generateUrl('acme_basket_list'));
            
        }
         
        var_dump($price);
        
        return $this->render('AcmeCashBundle:Payment:index.html.twig', array(
           'form' => $form->createView(),
           'costs' => $price
        ));
    }
}
