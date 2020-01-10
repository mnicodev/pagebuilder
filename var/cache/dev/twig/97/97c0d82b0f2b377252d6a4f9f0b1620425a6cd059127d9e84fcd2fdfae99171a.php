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

/* admin/popup_add_zone.html.twig */
class __TwigTemplate_bb20b5a9bf88437832a80877dc6d0c83774ec2e535e7d18e73db8d2f30c04b1c extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_add_zone.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_add_zone.html.twig"));

        // line 1
        echo "<div class=\"jumbotron\">
    <h2 class=\"display-8\">Options d'ajout de zone</h2>
    <div class=\"row\">
        <div class=\"col-sm-12\">

    ";
        // line 6
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'form_start');
        echo "
    ";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), 'widget');
        echo "

            ";
        // line 9
        if (((isset($context["large"]) || array_key_exists("large", $context) ? $context["large"] : (function () { throw new RuntimeError('Variable "large" does not exist.', 9, $this->source); })()) == 1)) {
            // line 10
            echo "                <div>
                    <label for=\"largeur\">Largeur contenue: </label>
                    <input type=\"checkbox\" class=\"\" name=\"largeur\" id=\"largeur_contenu\"/>
                </div>

            ";
        }
        // line 16
        echo "
    ";
        // line 17
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), 'form_end');
        echo "
        </div>
    </div>
    <div class=\"row\">

        <div class=\"col-sm-6\">
            <button id=\"zone-validate\" class=\"form-control btn-primary\">Valider</button>
        </div>
        <div class=\"col-sm-6\">

            <input type=\"button\" id=\"close\" value=\"Fermer\" class=\"form-control btn-cancel\" />
        </div>

    </div>

</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin/popup_add_zone.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 17,  69 => 16,  61 => 10,  59 => 9,  54 => 7,  50 => 6,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"jumbotron\">
    <h2 class=\"display-8\">Options d'ajout de zone</h2>
    <div class=\"row\">
        <div class=\"col-sm-12\">

    {{  form_start(form) }}
    {{  form_widget(form) }}

            {% if large == 1 %}
                <div>
                    <label for=\"largeur\">Largeur contenue: </label>
                    <input type=\"checkbox\" class=\"\" name=\"largeur\" id=\"largeur_contenu\"/>
                </div>

            {% endif %}

    {{ form_end(form) }}
        </div>
    </div>
    <div class=\"row\">

        <div class=\"col-sm-6\">
            <button id=\"zone-validate\" class=\"form-control btn-primary\">Valider</button>
        </div>
        <div class=\"col-sm-6\">

            <input type=\"button\" id=\"close\" value=\"Fermer\" class=\"form-control btn-cancel\" />
        </div>

    </div>

</div>", "admin/popup_add_zone.html.twig", "/home/nico/0TRAVAUX/TEST/SYMFONY4/pagebuilder/templates/admin/popup_add_zone.html.twig");
    }
}
