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

/* admin/popup_content_add.html.twig */
class __TwigTemplate_783b526cc019a5bee98a37ba59e79e73c2a020d59e74aa557cb272caa73481c6 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_content_add.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/popup_content_add.html.twig"));

        // line 1
        echo "



    ";
        // line 5
        if ((isset($context["bloc"]) || array_key_exists("bloc", $context))) {
            // line 6
            echo "<script src=";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/admin/ckeditor/ckeditor.js"), "html", null, true);
            echo "></script>
    <form target=\"data\" method=\"post\" action=\"";
            // line 7
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("admin.popup.content.add");
            echo "\">
<input type=\"hidden\" id=\"bloc\" value=\"";
            // line 8
            echo twig_escape_filter($this->env, (isset($context["bloc"]) || array_key_exists("bloc", $context) ? $context["bloc"] : (function () { throw new RuntimeError('Variable "bloc" does not exist.', 8, $this->source); })()), "html", null, true);
            echo "\">
        <input type=\"hidden\" id=\"id\" value=\"";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 9, $this->source); })()), "html", null, true);
            echo "\">
<div class=\"jumbotron\">
    <div class=\"display-8\">Ajout d'un contenu</div>
    <textarea id=\"editeur\" name=\"editeur\" rows=\"10\" cols=\"60\">";
            // line 12
            if ((isset($context["content"]) || array_key_exists("content", $context))) {
                echo (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 12, $this->source); })());
            }
            echo "</textarea>
    <div class=\"row\">
        <div class=\"col-sm-6\">
            <button id=\"content-validate\" class=\"form-control btn-primary\">Valider</button>
        </div>
        <div class=\"col-sm-6\">

            <input type=\"button\" id=\"close\" value=\"Fermer\" class=\"form-control btn-cancel\" />
        </div>

    </div>

</div>

    </form>
    <iframe id=\"data\" name=\"data\" style=\"width:300px;display:none\"></iframe>
        <script>
            CKEDITOR.replace(\"editeur\");

        </script>

    ";
        }
        // line 34
        echo "    ";
        if ((isset($context["str"]) || array_key_exists("str", $context))) {
            // line 35
            echo "
        <script>
            window.onload=function() {
                bloc=parent.document.getElementById(\"bloc\").value
                id=parent.document.getElementById(\"id\").value;
\t\t\t\tif(id) {
\t\t\t\t\tparent.document.getElementById(id).innerHTML=\"";
            // line 41
            echo (isset($context["str"]) || array_key_exists("str", $context) ? $context["str"] : (function () { throw new RuntimeError('Variable "str" does not exist.', 41, $this->source); })());
            echo "\";
\t\t\t\t\tparent.document.getElementById(\"popup\").style.display=\"none\";
\t\t\t\t\tparent.action_content();

\t\t\t\t} else {
\t\t\t\t
\t\t\t\t\tuniqid=(new Date().getTime()).toString(16);
\t\t\t\t\tcontent=document.createElement(\"div\");
\t\t\t\t\tcontent.setAttribute(\"id\",uniqid);
\t\t\t\t\tcontent.classList.add(\"content\");
\t\t\t\t\tcontent.innerHTML=\"";
            // line 51
            echo (isset($context["str"]) || array_key_exists("str", $context) ? $context["str"] : (function () { throw new RuntimeError('Variable "str" does not exist.', 51, $this->source); })());
            echo "\";
\t\t\t\t\tparent.document.getElementById(bloc).appendChild(content);
\t\t\t\t\tparent.document.getElementById(\"popup\").style.display=\"none\";
\t\t\t\t\tparent.action_content();
\t\t\t\t}



            }
        </script>

    ";
        }
        // line 63
        echo "

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "admin/popup_content_add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 63,  121 => 51,  108 => 41,  100 => 35,  97 => 34,  70 => 12,  64 => 9,  60 => 8,  56 => 7,  51 => 6,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("



    {% if bloc is defined %}
<script src={{ asset('js/admin/ckeditor/ckeditor.js') }}></script>
    <form target=\"data\" method=\"post\" action=\"{{ url('admin.popup.content.add') }}\">
<input type=\"hidden\" id=\"bloc\" value=\"{{ bloc }}\">
        <input type=\"hidden\" id=\"id\" value=\"{{ id }}\">
<div class=\"jumbotron\">
    <div class=\"display-8\">Ajout d'un contenu</div>
    <textarea id=\"editeur\" name=\"editeur\" rows=\"10\" cols=\"60\">{%  if content is defined %}{{ content|raw }}{% endif %}</textarea>
    <div class=\"row\">
        <div class=\"col-sm-6\">
            <button id=\"content-validate\" class=\"form-control btn-primary\">Valider</button>
        </div>
        <div class=\"col-sm-6\">

            <input type=\"button\" id=\"close\" value=\"Fermer\" class=\"form-control btn-cancel\" />
        </div>

    </div>

</div>

    </form>
    <iframe id=\"data\" name=\"data\" style=\"width:300px;display:none\"></iframe>
        <script>
            CKEDITOR.replace(\"editeur\");

        </script>

    {% endif %}
    {% if str is defined %}

        <script>
            window.onload=function() {
                bloc=parent.document.getElementById(\"bloc\").value
                id=parent.document.getElementById(\"id\").value;
\t\t\t\tif(id) {
\t\t\t\t\tparent.document.getElementById(id).innerHTML=\"{{ str|raw }}\";
\t\t\t\t\tparent.document.getElementById(\"popup\").style.display=\"none\";
\t\t\t\t\tparent.action_content();

\t\t\t\t} else {
\t\t\t\t
\t\t\t\t\tuniqid=(new Date().getTime()).toString(16);
\t\t\t\t\tcontent=document.createElement(\"div\");
\t\t\t\t\tcontent.setAttribute(\"id\",uniqid);
\t\t\t\t\tcontent.classList.add(\"content\");
\t\t\t\t\tcontent.innerHTML=\"{{ str|raw }}\";
\t\t\t\t\tparent.document.getElementById(bloc).appendChild(content);
\t\t\t\t\tparent.document.getElementById(\"popup\").style.display=\"none\";
\t\t\t\t\tparent.action_content();
\t\t\t\t}



            }
        </script>

    {%  endif %}


", "admin/popup_content_add.html.twig", "/home/nico/0TRAVAUX/TEST/SYMFONY4/pagebuilder/templates/admin/popup_content_add.html.twig");
    }
}
