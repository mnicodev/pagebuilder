

function close() {
    $("#close").click(function () {
        $("#popup").hide();
    })
}



function action_content() {
    /* si on survol un contenu */
    $(".content").hover(function () {
        /* on supprimer une éventuelle action précédente */
        $(this).find(".c-action").remove();
        /* on crée un objet div et on l'ajoute au content */
        d=document.createElement("div");
        $(d).addClass("c-action");
        $(this).append(d);
        /* action au survol du bloc action précédemment créé */
        $(".c-action").hover(
            function () {
                $(this).addClass("edit");
                o=this;

                /* on charge la page des actions de contenu, on envoie le contenu */
                $.ajax({
                    url: url_content_action,
                    method: "POST",
                    data: {bloc:$(this).parent().parent().attr("data-bloc"),content: $(this).parent().html(),id:$(this).parent().attr("data-pos")},
                    success: function (result) {
                        $(o).html(result);
                    },
                })
            },
            function () {
                $(this).remove()
            }
        )
    }, function () {
        $(this).find(".c-action").remove();
    })
    $(".zone").hover(function () {
        $(this).find(".z-action").remove();
        d=document.createElement("div");
        $(d).addClass("z-action");
        $(this).append(d);
        $(".z-action").hover(function () {
            $(this).addClass("edit")
            o=this;
            $.ajax({
                url: url_zone_action,
                method: "POST",
                data: { zone:$(this).parent().attr("data-line")},
                success: function (result) {

                    $(o).html(result);

                }
            })
        },function () {
            $(this).remove()

        })
    },function () {
        $(this).find(".z-action").remove();
    });
    $(".bloc").hover(function () {
        $(this).find(".action").remove();

        d=document.createElement("li");
        $(d).addClass("action");
        console.log("je passe")
        $(this).append(d);
        $(".action").hover(function () {
            $(this).addClass("edit")
            o=this;

            $.ajax({
                url: url_bloc_action,
                method: "POST",
                data: {bloc:$(this).parent().attr("data-bloc"), zone:$(this).parent().parent().attr("data-line")},
                success: function (result) {

                    $(o).html(result);

                }
            })
        },function () {
            $(this).remove()

            console.log("je sors")
        })
    }, function () {
        $(this).find(".action").remove();

    })
}

function set_drag() {
    $( ".sortable" ).sortable({
        cursor: "move",
        opacity: 0.5,
        revert: true,
        connectWith: ".connected",
       /* dropOnEmpty: false,*/


        stop: function () {
            refresh();
        },

    });
    $( ".sortable" ).disableSelection();


}

function refresh() {
    p=new o_page();

    p.name=pagebuilder.page.name;
    p.description=pagebuilder.page.description;
    p.param=pagebuilder.page.param;
    $(".create").find(".zone").each(function() {
            if(typeof $(this).attr("id") !='undefined') {

                z = new o_zone();
                z.param.classes = $(this).attr("data-param-classes");
                z.param.style = $(this).attr("data-param-style");
                z.format = $(this).attr("data-format");

                $(this).find(".bloc").each(function () {
                    b = new o_bloc();
                    b.param.classes = $(this).attr("data-param-classes");
                    b.param.style = $(this).attr("data-param-style");

                    $(this).find(".content").each(function () {
                        c = new o_content();
                        c.param.classes = $(this).attr("data-param-classes");
                        c.param.style = $(this).attr("data-param-style");
                        c.data = $(this).html();
                        b.contents.push(c);
                    })
                    z.blocs.push(b);

                })
                p.zones.push(z);
            }
        }

    )

    pagebuilder.page=p;
    pagebuilder.save();
    pagebuilder.show();
    $(".chapo h1").click(function () {
        update_chapo(this, "h1")
    })
    $(".chapo h2").click(function () {
        update_chapo(this,"h2")
    })
    set_drag();
    action_content();
}

function update_chapo(o,h) {

    if(h==="h2") {
        text=document.createElement("textarea");
        $(text).attr("cols", 60);
        if($(".chapo").find("#text_h1").length) {
            stext=$(".chapo").find("#text_h1").val();
            $(".chapo").find("h1").text(stext);

            $(".chapo").find("h1").show();
            $(".chapo").find("#text_h1").remove();
            $(".chapo").find("#btn_h1").remove();
            pagebuilder.page.name=stext;
            pagebuilder.save();
        }
    } else {
        text=document.createElement("input");
        $(text).attr("type", "text");
        if($(".chapo").find("#text_h2").length) {
            stext=$(".chapo").find("#text_h2").val();
            $(".chapo").find("h2").text(stext);

            $(".chapo").find("h2").show();
            $(".chapo").find("#text_h2").remove();
            $(".chapo").find("#btn_h2").remove();
            pagebuilder.page.description=stext;
            pagebuilder.save();
        }
    }
    btn=document.createElement("button");
    $(btn).text("OK");
    $(btn).attr("id","btn_"+h);
    $(btn).addClass("form-control btn-primary")
    $(text).attr("id","text_"+h);
    $(text).addClass("form-control")

    $(text).val($(o).text());
    if(h==="h2") {
        $(btn).css("display","block");
        $(o).parent().append(text);
        $(o).parent().append(btn);
    } else {
        $(o).parent().prepend(btn);
        $(o).parent().prepend(text);

    }

    $(o).hide();

    $("#btn_"+h).click(function () {
        text=$(".chapo").find("#text_"+h).val();

        $(".chapo").find(h).text(text);

        $(".chapo").find(h).show();
        $(".chapo").find("#text_"+h).remove();
        $(".chapo").find("#btn_"+h).remove();
        if(h=="h2") pagebuilder.page.description=text;
        else pagebuilder.page.name=text;
        pagebuilder.save();
    })
}

jQuery(document).ready(function() {



    /* On recherche si un objet pagebuilder existe*/
    if(window.localStorage)
        if(localStorage.getItem("pagebuilder")) {
            pagebuilder.page=JSON.parse(localStorage.getItem("pagebuilder"));
            pagebuilder.show();
            action_content();
            set_drag();
        }

    if(id_page) {
        $.ajax({
            url: url_page_edit,
            method: "GET",
            data: {load:1},
            success: function (result) {
                p=eval("("+result+")");

                pagebuilder.page=p;
                pagebuilder.show();
                pagebuilder.save();
                action_content();
                set_drag();
            }
        })
    }

    $("#save-page").click(function () {
        $.ajax({
            url:url_page_save,
            method: "POST",
            data: {page:JSON.stringify(pagebuilder.page),id:id_page},
            success: function(result) {
                $("#popup").html(result);
                $("#popup").show();
            }

        })

    })

    $(".chapo h1").click(function () {
        update_chapo(this, "h1")
    })
    $(".chapo h2").click(function () {
        update_chapo(this,"h2")
    })






    /* création d'une page
    *  on ajoute les classes
    *  et les paramétres
    * */
    $("#create-page").click(function () {

        if(pagebuilder.get_name()!='undefined' && window.confirm("Une page existe. Voulez vous la supprimer ?")) {
            pagebuilder.create();

            $.ajax({
                url: url_popup_create,
                success: function (result) {
                    $("#popup").html(result);
                    $("#popup").show();
                    $("#create-validate").click(function () {

                        pagebuilder.page.name = $("#name").val();
                        pagebuilder.page.description=$("#description").val();

                        if ($("#fluid").is(":checked")) pagebuilder.page.param.classes = "container-fluid";
                        else pagebuilder.page.param.classes = "container";
                        $("#popup").hide();
                        pagebuilder.show();
                        $(".chapo h1").click(function () {
                            update_chapo(this, "h1")
                        })
                        $(".chapo h2").click(function () {
                            update_chapo(this,"h2")
                        })


                    })

                    close();

                }

            })
        }

    })

    $("#add-zone").click(function () {
        $.ajax({
            url:url_popup_addzone,
            data: {"large": pagebuilder.page.param.classes},
            success: function (result) {
                if(pagebuilder.page.name==="") alert("Veuillez créer une page");
                else  {
                    $("#popup").html(result);
                    $("#popup").show();

                    $("#zone-validate").click(function () {


                        f=new String($("#create_zone_format").val()).split(":");

                        /* objet zone */
                        z=new o_zone();
                        z.format=$("#create_zone_format").val();
                        if($("#largeur_contenu").is(":checked")) z.param.classes="container";
                        for(i in f) {
                            /* objet bloc */
                            b=new o_bloc();

                            z.blocs.push(b);
                        }

                        pagebuilder.add_zone(z);


                        $("#popup").hide();
                        pagebuilder.show();


                    })

                    close();


                }

            }

        })

    })




})