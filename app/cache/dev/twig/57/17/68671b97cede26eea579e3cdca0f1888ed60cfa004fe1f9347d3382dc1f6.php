<?php

/* AcmeHelloBundle:Default:index.html.twig */
class __TwigTemplate_571768671b97cede26eea579e3cdca0f1888ed60cfa004fe1f9347d3382dc1f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeHelloBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 9
        echo "
    <h2 class=\"title\">Witaj w sklepie internetowym!</h2>
    <section class=\"no-margin\">
        <p>Znajdziesz tutaj listę produktów, które możesz dodać do swojego koszyka.</p>
        <p>System zapamiętuje Twoje dane, dzięki czemu nie musisz ich podawać przy każdej realizacji zlecenia.</p>
        <p>Po zalogowaniu się, możliwe będzie zamieszczanie produktów na liście życzeń.</p>
    </section>
    
    <h3 class=\"last\">Lista funkcjonalności</h2>
    <section>
        <ul class=\"list\">
            <li>Listowanie produktów</li>
        </ul>
    </section>
    
    
";
    }

    public function getTemplateName()
    {
        return "AcmeHelloBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 9,  38 => 8,  35 => 7,  29 => 3,);
    }
}
