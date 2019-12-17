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
        // line 2
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), [0 => "bootstrap_4_layout.html.twig"], true);
        // line 3
        echo "

    ";
        // line 5
        if (((isset($context["bloc"]) || array_key_exists("bloc", $context)) || (isset($context["content"]) || array_key_exists("content", $context)))) {
            // line 6
            echo "<script src=";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/admin/ckeditor/ckeditor.js"), "html", null, true);
            echo "></script>
<div class=\"jumbotron\" id=\"content_add\">
    <div class=\"display-8\">Ajout d'un contenu</div>
\t";
            // line 9
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), 'form_start');
            echo "
\t\t<input type=\"hidden\" id=\"bloc\" name=\"bloc\" value=\"";
            // line 10
            echo twig_escape_filter($this->env, (isset($context["bloc"]) || array_key_exists("bloc", $context) ? $context["bloc"] : (function () { throw new RuntimeError('Variable "bloc" does not exist.', 10, $this->source); })()), "html", null, true);
            echo "\">
        <input type=\"hidden\" id=\"content\" name=\"content\" value=\"";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 11, $this->source); })()), "html", null, true);
            echo "\">
\t";
            // line 12
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "data", [], "any", false, false, false, 12), 'widget');
            echo "
    <div class=\"row\">
        <div class=\"col-sm-6\">
\t\t\t";
            // line 15
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "valider", [], "any", false, false, false, 15), 'row');
            echo "
\t</div>
        <div class=\"col-sm-6\">
\t\t\t";
            // line 18
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "fermer", [], "any", false, false, false, 18), 'row');
            echo "

        </div>

    </div>
\t";
            // line 23
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), 'form_end');
            echo "


</div>
        <script>
            CKEDITOR.replace(\"form_data\", {
    \t\t\textraPlugins : 'autogrow',
    \t\t\tremovePlugins : 'resize',
    \t\t\tentities : false
\t\t\t});
\t\t\tclose();
\t\t\$(\"#form_valider\").click(function(event) {
\t\t\tevent.preventDefault();
        \tvar ContentFromEditor = CKEDITOR.instances.form_data.getData();

        \tvar dataString = \$(\"form[name=form]\").serialize();

            dataString += '&ContentFromEditor='+ContentFromEditor; 
\t\t\tconsole.log(dataString);
        \t\$.ajax({
        \t\ttype: \"POST\",
        \t\turl: url_popup_content,
        \t\tdata: dataString,
\t\t        cache: false,
        \t\tsuccess: function(r){
\t\t\t\t\tres=JSON.parse(r);
\t\t\t\t\tconsole.log(res);
\t\t\t\t\tif(res.bloc) {
\t\t\t\t\t\tcontent=document.createElement(\"div\");
\t\t\t\t\t\tcontent.setAttribute(\"id\",res.content);
\t\t\t\t\t\tcontent.classList.add(\"content\");
\t\t\t\t\t\t\$(content).html(res.data);
\t\t\t\t\t\t\$(\"#\"+res.bloc).append(content);
\t\t\t\t\t} else if(res.content) {
\t\t\t\t\t\t\$(\"#\"+res.content).html(res.data);
\t\t\t\t\t}
\t\t\t\t\taction_on_zone();
\t\t\t\t\tpagebuilder.set_bloc(res);
\t\t\t\t\tclose_popup();

\t\t\t\t\t//p=eval(\"(\"+r+\")\");
       \t\t\t},
       \t\t\terror: function(xhr, ajaxOptions, thrownError){ 
            \t\tconsole.log(xhr.responseText);
        \t\t}
     \t\t});
\t})

        </script>

    ";
        }
        // line 74
        echo "    ";
        if ((isset($context["str"]) || array_key_exists("str", $context))) {
            // line 75
            echo "
        <script>
            window.onload=function() {
                bloc=parent.document.getElementById(\"bloc\").value
                content=parent.document.getElementById(\"content\").value;
\t\t\t\tif(content) {
\t\t\t\t\tparent.document.getElementById(content).innerHTML=\"";
            // line 81
            echo (isset($context["str"]) || array_key_exists("str", $context) ? $context["str"] : (function () { throw new RuntimeError('Variable "str" does not exist.', 81, $this->source); })());
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
            // line 91
            echo (isset($context["str"]) || array_key_exists("str", $context) ? $context["str"] : (function () { throw new RuntimeError('Variable "str" does not exist.', 91, $this->source); })());
            echo "\";
\t\t\t\t\tparent.document.getElementById(bloc).appendChild(content);
\t\t\t\t\tparent.document.getElementById(\"popup\").style.display=\"none\";
\t\t\t\t\tparent.action_content();
\t\t\t\t}



            }
        </script>

    ";
        }
        // line 103
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
        return array (  186 => 103,  171 => 91,  158 => 81,  150 => 75,  147 => 74,  93 => 23,  85 => 18,  79 => 15,  73 => 12,  69 => 11,  65 => 10,  61 => 9,  54 => 6,  52 => 5,  48 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{% form_theme form 'bootstrap_4_layout.html.twig' %}


    {% if bloc is defined or content is defined %}
<script src={{ asset('js/admin/ckeditor/ckeditor.js') }}></script>
<div class=\"jumbotron\" id=\"content_add\">
    <div class=\"display-8\">Ajout d'un contenu</div>
\t{{ form_start(form) }}
\t\t<input type=\"hidden\" id=\"bloc\" name=\"bloc\" value=\"{{ bloc }}\">
        <input type=\"hidden\" id=\"content\" name=\"content\" value=\"{{ content }}\">
\t{{ form_widget(form.data) }}
    <div class=\"row\">
        <div class=\"col-sm-6\">
\t\t\t{{ form_row(form.valider) }}
\t</div>
        <div class=\"col-sm-6\">
\t\t\t{{ form_row(form.fermer) }}

        </div>

    </div>
\t{{ form_end(form) }}


</div>
        <script>
            CKEDITOR.replace(\"form_data\", {
    \t\t\textraPlugins : 'autogrow',
    \t\t\tremovePlugins : 'resize',
    \t\t\tentities : false
\t\t\t});
\t\t\tclose();
\t\t\$(\"#form_valider\").click(function(event) {
\t\t\tevent.preventDefault();
        \tvar ContentFromEditor = CKEDITOR.instances.form_data.getData();

        \tvar dataString = \$(\"form[name=form]\").serialize();

            dataString += '&ContentFromEditor='+ContentFromEditor; 
\t\t\tconsole.log(dataString);
        \t\$.ajax({
        \t\ttype: \"POST\",
        \t\turl: url_popup_content,
        \t\tdata: dataString,
\t\t        cache: false,
        \t\tsuccess: function(r){
\t\t\t\t\tres=JSON.parse(r);
\t\t\t\t\tconsole.log(res);
\t\t\t\t\tif(res.bloc) {
\t\t\t\t\t\tcontent=document.createElement(\"div\");
\t\t\t\t\t\tcontent.setAttribute(\"id\",res.content);
\t\t\t\t\t\tcontent.classList.add(\"content\");
\t\t\t\t\t\t\$(content).html(res.data);
\t\t\t\t\t\t\$(\"#\"+res.bloc).append(content);
\t\t\t\t\t} else if(res.content) {
\t\t\t\t\t\t\$(\"#\"+res.content).html(res.data);
\t\t\t\t\t}
\t\t\t\t\taction_on_zone();
\t\t\t\t\tpagebuilder.set_bloc(res);
\t\t\t\t\tclose_popup();

\t\t\t\t\t//p=eval(\"(\"+r+\")\");
       \t\t\t},
       \t\t\terror: function(xhr, ajaxOptions, thrownError){ 
            \t\tconsole.log(xhr.responseText);
        \t\t}
     \t\t});
\t})

        </script>

    {% endif %}
    {% if str is defined %}

        <script>
            window.onload=function() {
                bloc=parent.document.getElementById(\"bloc\").value
                content=parent.document.getElementById(\"content\").value;
\t\t\t\tif(content) {
\t\t\t\t\tparent.document.getElementById(content).innerHTML=\"{{ str|raw }}\";
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


", "admin/popup_content_add.html.twig", "/home/nico/SYMFONY4/pagebuilder/templates/admin/popup_content_add.html.twig");
    }
}
