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

/* admin/popup_content_action.html.twig */
class __TwigTemplate_934145e2dc38869611a92bf3ea2375440c8c93fe8c2d228240a5d8319a70fe48 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_content_action.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_content_action.html.twig"));

        // line 1
        echo "<ul>
\t<li><a  id=\"edit-content\">Editer le contenu</a></li>
    <li><a  id=\"delete-content\">Supprimer le contenu</a></li>

</ul>
<script>
    \$(document).ready(function () {
        \$(\"#edit-content\").click(function () {
            \$.ajax({
                url: url_popup_content,
                method: \"POST\",
\t\t\t\tdata: {content: \"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 12, $this->source); })()), "html", null, true);
        echo "\"},
                success: function (result) {
                    \$(\"#popup\").html(result);
                    \$(\"#popup\").show();
                    close();


                }
            })
        })
        \$(\"#delete-content\").click(function () {
            if(window.confirm('Supprimer le contenu ?')) parent.document.getElementById(\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 23, $this->source); })()), "html", null, true);
        echo "\").remove();

        })

    })

</script>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin/popup_content_action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 23,  56 => 12,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul>
\t<li><a  id=\"edit-content\">Editer le contenu</a></li>
    <li><a  id=\"delete-content\">Supprimer le contenu</a></li>

</ul>
<script>
    \$(document).ready(function () {
        \$(\"#edit-content\").click(function () {
            \$.ajax({
                url: url_popup_content,
                method: \"POST\",
\t\t\t\tdata: {content: \"{{ content }}\"},
                success: function (result) {
                    \$(\"#popup\").html(result);
                    \$(\"#popup\").show();
                    close();


                }
            })
        })
        \$(\"#delete-content\").click(function () {
            if(window.confirm('Supprimer le contenu ?')) parent.document.getElementById(\"{{ content }}\").remove();

        })

    })

</script>", "admin/popup_content_action.html.twig", "/home/nico/SYMFONY4/pagebuilder/templates/admin/popup_content_action.html.twig");
    }
}
