<?php

namespace Acme\UserBundle\Controller;

use Acme\CashBundle\Form\PaymentForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/profile")
 */
class ProfileController extends Controller
{
    /**
     * @Route("/edit/payment", name="acme_user_profile_edit")
     * @param type $name
     * @return type
     */
    public function editAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $form = $this->createForm(new PaymentForm(), $user);
        
        $form->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        
        $success = false;
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $success = true;
        }
        
        return $this->render('AcmeUserBundle:Profile:edit.html.twig', array(
            'form' => $form->createView(),
            'success' => $success
        ));
    }
}
