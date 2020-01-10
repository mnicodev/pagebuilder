<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* admin/popup_page_create.html.twig */
class __TwigTemplate_9f54f6b3d6c24c514a3bb720332809a72535432ca96e4ae5badeaa67216c92a9 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_page_create.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_page_create.html.twig"));

        // line 1
        echo "<div class=\"jumbotron\">
    <h2 class=\"display-8\">Options de création de page</h2>
    <div class=\"row\">
        <div class=\"col-sm-6\">Name :</div>
        <div class=\"col-sm-6\"><input type=\"text\" name=\"name\" id=\"name\" value=\"\" class=\"form-control\"></div>
    </div>
    <div class=\"row\">
        <div class=\"col-sm-12\">Description :</div>
        <div class=\"col-sm-12\">
            <textarea id=\"description\" rows=\"10\" cols=\"50\" class=\"form-control\"></textarea>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-sm-6\">Container fuild :</div>
        <div class=\"col-sm-6\"><input type=\"checkbox\" name=\"fluid\" id=\"fluid\" value=\"1\"></div>
    </div>
    <div class=\"row\">

            <div class=\"col-sm-6\">
                <button id=\"create-validate\" class=\"form-control btn-primary\">Valider</button>
            </div>
            <div class=\"col-sm-6\">

                <input type=\"button\" id=\"close\" value=\"Fermer\" class=\"form-control btn-cancel\" />
            </div>


    </div>

</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin/popup_page_create.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"jumbotron\">
    <h2 class=\"display-8\">Options de création de page</h2>
    <div class=\"row\">
        <div class=\"col-sm-6\">Name :</div>
        <div class=\"col-sm-6\"><input type=\"text\" name=\"name\" id=\"name\" value=\"\" class=\"form-control\"></div>
    </div>
    <div class=\"row\">
        <div class=\"col-sm-12\">Description :</div>
        <div class=\"col-sm-12\">
            <textarea id=\"description\" rows=\"10\" cols=\"50\" class=\"form-control\"></textarea>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-sm-6\">Container fuild :</div>
        <div class=\"col-sm-6\"><input type=\"checkbox\" name=\"fluid\" id=\"fluid\" value=\"1\"></div>
    </div>
    <div class=\"row\">

            <div class=\"col-sm-6\">
                <button id=\"create-validate\" class=\"form-control btn-primary\">Valider</button>
            </div>
            <div class=\"col-sm-6\">

                <input type=\"button\" id=\"close\" value=\"Fermer\" class=\"form-control btn-cancel\" />
            </div>


    </div>

</div>
", "admin/popup_page_create.html.twig", "/home/nico/0TRAVAUX/TEST/SYMFONY4/pagebuilder/templates/admin/popup_page_create.html.twig");
    }
}
