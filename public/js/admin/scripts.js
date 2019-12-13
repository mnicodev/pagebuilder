

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
		});
	}

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
						row=document.createElement("div");
						$(zone).addClass("zone ");
						$(row).addClass("row");
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
							$(row).append(bloc);
                        }
						if(!$(".content-zone").length) {
							cz=document.createElement("div");
							$(cz).addClass("sortable connected content-zone");
							$(".content-wrapper").append(cz);
						}
						$(zone).append(row);
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



function validate_form() {
	$("#form_valider").click(function(event) {
		event.preventDefault();
        	var ContentFromEditor = CKEDITOR.instances.form_data.getData();

        	var dataString = $("form[name=form]").serialize();

            dataString += '&ContentFromEditor='+ContentFromEditor;          
        	$.ajax({
        		type: "POST",
        		url: url_popup_content,
        		data: dataString,
		        cache: false,
        		success: function(r){
					res=JSON.parse(r);
					console.log(r);
					uniqid=(new Date().getTime()).toString(16);
					content=document.createElement("div");
					content.setAttribute("id",uniqid);
					content.classList.add("content");
					$(content).html(res.data);
					$("#"+res.bloc).html(content);
					action_content();
					close_popup();

					//p=eval("("+r+")");
       			},
       			error: function(xhr, ajaxOptions, thrownError){ 
            		console.log(xhr.responseText);
        		}
     		});
	})

}

jQuery(document).ready(function() {
    /* On recherche si un objet pagebuilder existe*/
    if(window.localStorage) {
	}


	validate_form();





    if(id_page) {
        $.ajax({
            url: url_page_edit,
            method: "GET",
            data: {load:1},
            success: function (result) {
				p=eval("("+result+")");
				pagebuilder.page.name=p[0];
				pagebuilder.page.description=p[1];
				pagebuilder.content=p[2];
                pagebuilder.show();
                pagebuilder.save();
                set_drag();
            }
        })
    }

    $("#save-page").click(function () {
		del_action();
		pagebuilder.set_name($(".h1").val());
		pagebuilder.set_description($(".h2").val());
		pagebuilder.set_content($("#page .content-wrapper").html());
		//console.log($("#page .content-wrapper").html());
        $.ajax({
            url:url_page_save,
            method: "POST",
            data: {page:JSON.stringify(pagebuilder.page),id:id_page,fulltext: $("#page .content-wrapper").html()},
            success: function(result) {
                $("#popup").html(result);
                $("#popup").show();
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