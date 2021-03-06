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

/* admin/popup_bloc_action.html.twig */
class __TwigTemplate_bb06fcb9054f7309e38af716d70457e0f921099f3e12c6fb043e42e6328ce8d3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_bloc_action.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_bloc_action.html.twig"));

        // line 1
        echo "<ul>
    <li><a href=\"#\" id=\"add-content\">Ajouter un contenu</a></li>

</ul>
<script>
    \$(document).ready(function () {
        \$(\"#add-content\").click(function () {

            \$.ajax({
                url: url_popup_content,
                method: \"POST\",
                data: {bloc:\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["bloc"]) || array_key_exists("bloc", $context) ? $context["bloc"] : (function () { throw new RuntimeError('Variable "bloc" does not exist.', 12, $this->source); })()), "html", null, true);
        echo "\"},
                success: function (result) {
                    \$(\"#popup\").html(result);
                    \$(\"#popup\").show();
                    close();


                }
            })
        })


    })

</script>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin/popup_bloc_action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 12,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul>
    <li><a href=\"#\" id=\"add-content\">Ajouter un contenu</a></li>

</ul>
<script>
    \$(document).ready(function () {
        \$(\"#add-content\").click(function () {

            \$.ajax({
                url: url_popup_content,
                method: \"POST\",
                data: {bloc:\"{{ bloc }}\"},
                success: function (result) {
                    \$(\"#popup\").html(result);
                    \$(\"#popup\").show();
                    close();


                }
            })
        })


    })

</script>", "admin/popup_bloc_action.html.twig", "/home/nico/0TRAVAUX/TEST/SYMFONY4/pagebuilder/templates/admin/popup_bloc_action.html.twig");
    }
}
