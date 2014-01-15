<?php

/* AcmeHelloBundle:Default:product.html.twig */
class __TwigTemplate_f3564f23fc8c2705d36aa877dc8e05a427bfb71397d5c73d2debfa4a06dcb48a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo " <div class=\"product-block\">
    <h3>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "name"), "html", null, true);
        echo "</h3>
    <p>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "description"), "html", null, true);
        echo "</p>
</div>";
    }

    public function getTemplateName()
    {
        return "AcmeHelloBundle:Default:product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  22 => 2,  19 => 1,  54 => 7,  51 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
