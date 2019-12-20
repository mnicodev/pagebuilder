

function close() {
    $("#close").click(function () {
        $("#popup").hide();
    })
    $("#form_fermer").click(function () {
        $("#popup").hide();
    })
}

function close_popup() {
       $("#popup").hide();

}

function del_action() {
	$(".z-action").remove();
	$(".c-action").remove();
	//$(".action").remove();
	$(".p-action").remove();
}

function action_on_zone() {
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
        	$(this).append(action_add_zone);

			$(".p-action").click(add_zone);
	
		},
		function() {
        	$(this).find(".p-action").remove();
		}
	);
	
    /* si on survol un contenu */
    $(".content").hover(function () {console.log("CONTENT");
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
				$(this).html(action_edit_content);
				content_id=$(this).parent().attr("id");
				action_content(content_id);

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
			$(o).html(action_add_bloc);
			zone_id=$(this).parent().attr("id");
			action_zone(zone_id);
        },function () {
            $(this).remove()

        })
    },function () {
        $(this).find(".z-action").remove();
    });
    $(".bloc").hover(function () {
        $(this).find(".action").remove();

        d=document.createElement("div");
        $(d).addClass("action");
        console.log("je passe")
        $(this).append(d);
        $(".action").hover(function () {
            $(this).addClass("edit")
            o=this;
			$(this).html(action_add_content);
			bloc_id=$(this).parent().attr("id");
			action_bloc(bloc_id);

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
		});
	}

}

function open_popup_style(zone) {
	console.log($("#"+zone).attr("style"))
			$.ajax({
				url: url_popup_styles,
				method: "POST",
				data: {zone:zone,style:$("#"+zone).attr("style"),id_page:id_page},
				success: function(result) {
					$("#popup").html(result);
					$("#popup").show();
					
				}
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

						//nbz=$(".content-zone").find(".zone").length+1;
						uniqid=(new Date().getTime()).toString(16);
						nbz=uniqid
						zone=document.createElement("section");
						row=document.createElement("div");
						$(zone).addClass("zone ");
						$(row).addClass("row");
						$(zone).attr("data-line",nbz);
						$(zone).attr("data-format",$("#create_zone_format").val());
						$(zone).attr("data-param-classes","");
						$(zone).attr("data-param-style","");
						$(zone).attr("id","s_"+uniqid);
						console.log(zone);
						
                        for(i in f) {
							bloc=document.createElement("div");
							$(bloc).addClass("sortable for-action bloc col-md-"+f[i]);
							$(bloc).attr("data-param-classes","");
							$(bloc).attr("data-param-style","");
							$(bloc).attr("id","b_"+nbz+"_"+i);

							console.log(bloc);
							$(row).append(bloc);
                        }
						if(!$(".content-zone").length) {
							cz=document.createElement("div");
							$(cz).addClass("sortable content-zone");
							$(".content-wrapper").append(cz);
						}
						$(zone).append(row);
						$(".content-zone").append(zone);


                        $("#popup").hide();
						pagebuilder.set_content($(".content-wrapper").html());
                        pagebuilder.show();


                    })

                    close();


                }

            }

        })
}

function creer_page() {
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

                    })

                    close();

                }

            })

}

function add_content(content) {

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
				//console.log(result);
				//p=eval("("+result+")");
				p=JSON.parse(result);
				console.log(p);
				pagebuilder.load(p);
				/*pagebuilder.page.name=p.name;
				pagebuilder.page.description=p.description;
				pagebuilder.page.content=p.content;*/
                //pagebuilder.show();
        		action_on_zone();
                //pagebuilder.save();
                set_drag();
            }
        })
    }



    $("#save-page").click(function () {
		del_action();
		pagebuilder.save()
		console.log(JSON.stringify(pagebuilder.page));
        $.ajax({
            url:url_page_save,
            method: "POST",
            data: {page:JSON.stringify(pagebuilder.page),id:id_page,cache: $("#page .content-wrapper").html()},
            success: function(result) {
				r=JSON.parse(result);
                $("#popup").html(r.msg);
				console.log(r.page_id);
				id_page=r.page_id;
                $("#popup").show();
        		set_drag();
        		action_on_zone();
				setTimeout(close_popup,2000);
            }

        })

    })


	if(id_page==0) creer_page();




    /* création d'une page
    *  on ajoute les classes
    *  et les paramétres
    * */
    $("#create-page").click(function () {
        if(pagebuilder.get_name() && window.confirm("Une page existe. Voulez vous en créer une autre ?")) {
            pagebuilder.create();
			creer_page();

        }

    })

    $("#add-zone").click(add_zone);



})