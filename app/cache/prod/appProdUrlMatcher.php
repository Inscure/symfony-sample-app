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

        // acme_hello_index_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'acme_hello_index_index');
            }

            return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\IndexController::indexAction',  '_route' => 'acme_hello_index_index',);
        }

        if (0 === strpos($pathinfo, '/product')) {
            // product_list
            if (rtrim($pathinfo, '/') === '/product') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'product_list');
                }

                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\ProductController::listAction',  '_route' => 'product_list',);
            }

            // acme_hello_product_create
            if ($pathinfo === '/product/create') {
                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\ProductController::createAction',  '_route' => 'acme_hello_product_create',);
            }

            // acme_hello_product_new
            if ($pathinfo === '/product/new') {
                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\ProductController::newAction',  '_route' => 'acme_hello_product_new',);
            }

            // acme_hello_product_show
            if ($pathinfo === '/product/show') {
                return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\ProductController::showAction',  '_route' => 'acme_hello_product_show',);
            }

        }

        // main
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'main');
            }

            return array (  '_controller' => 'Acme\\HelloBundle\\Controller\\IndexController::indexAction',  '_route' => 'main',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
