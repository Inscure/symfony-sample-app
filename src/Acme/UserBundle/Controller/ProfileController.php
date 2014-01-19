<?php

namespace Acme\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
    public function indexAction()
    {
        return new Response;
    }
}
