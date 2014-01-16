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
        return array (  26 => 3,  19 => 1,  93 => 9,  88 => 6,  80 => 41,  46 => 10,  44 => 9,  40 => 8,  32 => 6,  27 => 4,  22 => 2,  121 => 31,  115 => 21,  110 => 20,  107 => 19,  100 => 23,  98 => 40,  95 => 18,  92 => 17,  86 => 32,  84 => 31,  78 => 40,  76 => 17,  73 => 16,  64 => 13,  61 => 12,  56 => 11,  53 => 10,  47 => 8,  41 => 5,  36 => 7,  33 => 3,  54 => 7,  51 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
