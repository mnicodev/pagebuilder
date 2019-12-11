

function close() {
    $("#close").click(function () {
        $("#popup").hide();
    })
}



function action_content() {
	/* si on survol la page (wrapper) */
	$(".content-wrapper").hover(
		function() {
	        /* on supprimer une éventuelle action précédente */
    	    $(this).find(".p-action").remove();
        	/* on crée un objet div et on l'ajoute au content */
	        d=document.createElement("div");
    	    $(d).addClass("p-action");
			$(d).attr("title","Ajouter une zone");
			$(d).text("+");
        	$(this).append(d);

			$(".p-action").click(add_zone);
	
		},
		function() {
        	$(this).find(".p-action").remove();
		}
	);
	
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
                    data: {bloc:$(this).parent().parent().attr("id"),content: $(this).parent().html(),id:$(this).parent().attr("id")},
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
                data: { zone:$(this).parent().attr("id")},
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
                data: {bloc:$(this).parent().attr("id"), zone:$(this).parent().parent().attr("data-line")},
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
	var nestedSortables = [].slice.call(document.querySelectorAll('.sortable'));

	// Loop through each nested sortable element
	for (var i = 0; i < nestedSortables.length; i++) {
		new Sortable(nestedSortables[i], {
			group: 'nested',
			animation: 150,
			fallbackOnBody: true,
			swapThreshold: 0.65,
			ghostClass: 'sortable_background',
			//onEnd: refresh,
		});
	}

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

function add_zone() {
        $.ajax({
            url:url_popup_addzone,
            data: {"large": pagebuilder.page.param.classes},
            success: function (result) {
                if(pagebuilder.page.name==="") alert("Veuillez créer une page");
                else  {
                    $("#popup").html(result);
                    $("#popup").show();

					/* on applique l'action du clique */
                    $("#zone-validate").click(function () {


                        f=new String($("#create_zone_format").val()).split(":");

						nbz=$(".content-zone").find(".zone").length+1;
						zone=document.createElement("div");
						$(zone).addClass("zone row");
						$(zone).attr("data-line",nbz);
						$(zone).attr("data-format",$("#create_zone_format").val());
						$(zone).attr("data-param-classes","");
						$(zone).attr("data-param-style","");
						$(zone).attr("id","zone_"+nbz);
						console.log(zone);
						
                        for(i in f) {
							bloc=document.createElement("div");
							$(bloc).addClass("connected sortable for-action bloc col-md-"+f[i]);
							$(bloc).attr("data-param-classes","");
							$(bloc).attr("data-param-style","");
							$(bloc).attr("id","bloc_"+nbz+"_"+i);

							console.log(bloc);
							$(zone).append(bloc);
                        }
						if(!$(".content-zone").length) {
							cz=document.createElement("div");
							$(cz).addClass("sortable connected content-zone");
							$(".content-wrapper").append(cz);
						}
						$(".content-zone").append(zone);


                        $("#popup").hide();
						pagebuilder.content=$(".content-wrapper").html();
                        pagebuilder.show();


                    })

                    close();


                }

            }

        })
}


jQuery(document).ready(function() {
    /* On recherche si un objet pagebuilder existe*/
    if(window.localStorage) {
	}

    if(id_page) {
        $.ajax({
            url: url_page_edit,
            method: "GET",
            data: {load:1},
            success: function (result) {
				p=eval("("+result+")");
				pagebuilder.page.name=p[0];
				pagebuilder.content=p[1];
                pagebuilder.show();
                pagebuilder.save();
                set_drag();
            }
        })
    }

    $("#save-page").click(function () {
		//console.log($("#page .content-wrapper").html());
        $.ajax({
            url:url_page_save,
            method: "POST",
            data: {page:JSON.stringify(pagebuilder.page),id:id_page,fulltext: $("#page .content-wrapper").html()},
            success: function(result) {
                $("#popup").html(result);
                $("#popup").show();
            }

        })

    })


    /*$(".chapo h1").click(function () {
		alert("ok");
        update_chapo(this, "h1")
    })
    $(".chapo h2").click(function () {
        update_chapo(this,"h2")
    })*/






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

    $("#add-zone").click(add_zone);




})