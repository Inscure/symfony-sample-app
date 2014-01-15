<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/product')) {
            // acme_hello_default_index
            if (rtrim($pathinfo, '/') === '/product') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'acme_hello_default_index');
                }

                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\DefaultController::indexAction',  '_route' => 'acme_hello_default_index',);
            }

            // acme_hello_default_create
            if ($pathinfo === '/product/create') {
                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\DefaultController::createAction',  '_route' => 'acme_hello_default_create',);
            }

            // acme_hello_default_new
            if ($pathinfo === '/product/new') {
                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\DefaultController::newAction',  '_route' => 'acme_hello_default_new',);
            }

            // acme_hello_default_show
            if ($pathinfo === '/product/show') {
                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\DefaultController::showAction',  '_route' => 'acme_hello_default_show',);
            }

            // product_list
            if ($pathinfo === '/product/list') {
                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\DefaultController::listAction',  '_route' => 'product_list',);
            }

        }

        // main
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'main');
            }

            return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\DefaultController::indexAction',  '_route' => 'main',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
