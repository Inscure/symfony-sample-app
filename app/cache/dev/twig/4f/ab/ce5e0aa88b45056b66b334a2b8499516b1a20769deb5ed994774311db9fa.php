<?php

/* AcmeHelloBundle:Default:new.html.twig */
class __TwigTemplate_4fabce5e0aa88b45056b66b334a2b8499516b1a20769deb5ed994774311db9fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeHelloBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeHelloBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Welcome";
    }

    // line 6
    public function block_content_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "        ";
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 10
        echo "
        <h1 class=\"title\">Welcome!</h1>

       
    ";
    }

    public function getTemplateName()
    {
        return "AcmeHelloBundle:Default:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  45 => 9,  42 => 8,  36 => 6,  30 => 3,);
    }
}
