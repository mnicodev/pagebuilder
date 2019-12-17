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

/* admin/popup_zone_action.html.twig */
class __TwigTemplate_80da675003ba32d313968900192f25fce563ec773586d1c82c5b42072ab5b118 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_zone_action.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_zone_action.html.twig"));

        // line 1
        echo "<ul>

\t<li><a  id=\"style-zone\">Style de la zone</a></li>
    <li><a href=\"#\" id=\"delete-zone\">Supprimer la zone</a></li>
</ul>
<script>
    \$(document).ready(function () {
\t\t\$(\"#style-zone\").click(function() {
\t\t\topen_popup_style(\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["zone"]) || array_key_exists("zone", $context) ? $context["zone"] : (function () { throw new RuntimeError('Variable "zone" does not exist.', 9, $this->source); })()), "html", null, true);
        echo "\");
\t\t})

        \$(\"#delete-zone\").click(function () {
\t\t\tif(window.confirm(\"Suppimer la zone ";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["zone"]) || array_key_exists("zone", $context) ? $context["zone"] : (function () { throw new RuntimeError('Variable "zone" does not exist.', 13, $this->source); })()), "html", null, true);
        echo " ?\"))
                parent.document.getElementById(\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["zone"]) || array_key_exists("zone", $context) ? $context["zone"] : (function () { throw new RuntimeError('Variable "zone" does not exist.', 14, $this->source); })()), "html", null, true);
        echo "\").remove();
        })
    })

</script>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin/popup_zone_action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 14,  60 => 13,  53 => 9,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul>

\t<li><a  id=\"style-zone\">Style de la zone</a></li>
    <li><a href=\"#\" id=\"delete-zone\">Supprimer la zone</a></li>
</ul>
<script>
    \$(document).ready(function () {
\t\t\$(\"#style-zone\").click(function() {
\t\t\topen_popup_style(\"{{ zone }}\");
\t\t})

        \$(\"#delete-zone\").click(function () {
\t\t\tif(window.confirm(\"Suppimer la zone {{ zone }} ?\"))
                parent.document.getElementById(\"{{ zone }}\").remove();
        })
    })

</script>", "admin/popup_zone_action.html.twig", "/home/nico/SYMFONY4/pagebuilder/templates/admin/popup_zone_action.html.twig");
    }
}
