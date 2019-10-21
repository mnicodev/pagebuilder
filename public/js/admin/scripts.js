var adjustment;

function close() {
    $("#close").click(function () {
        $("#popup").hide();
    })
}

/**
 *
 * @param b : bloc où on place str
 * @param str : donnée de contenu
 */
function put_content(b,str) {

   // console.log(bloc+"-"+str);
    id=b.split(":");
    c=new o_content();
    c.data="<div class='content' id='content-"+pagebuilder.page.zones[id[0]].blocs[id[1]].contents.length+"'>"+str+"</div>";

    pagebuilder.page.zones[id[0]].blocs[id[1]].contents.push(c);
    pagebuilder.show();
    $("#popup").hide();
    action_content();

    set_drag();


    pagebuilder.save();
}

function action_content() {
    $(".content").hover(function () {

        d=document.createElement("div");
        $(d).addClass("edit");
        $(this).append(d);
    }, function () {
        $(this).find(".edit").remove();
    })
}

function set_drag() {
    $(".create").sortable({
        revert: true,
        group: ".create",
        pullPlaceholder: false,

    });
    $(".zone").draggable({
        connectToSortable: ".create",


        stop: function() {

            refresh();
        },
    });

    $(".contents").sortable({
        revert: true,
        group: ".contents",
        pullPlaceholder: false,

    });
    $(".content").draggable({
        connectToSortable: ".contents",



        stop: function() {

            refresh();
        }
    });
}

function refresh() {
    p=new o_page();

    p.name=pagebuilder.page.name;
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

                    $(this).find(".contents").each(function () {
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
    pagebuilder.show();
    set_drag();
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

    $("#save-page").click(function () {
        window.location=url_page_save+"?b="+JSON.stringify(pagebuilder.page);
    })


    /* création d'une page
    *  on ajoute les classes
    *  et les paramétres
    * */
    $("#create-page").click(function () {
        if(pagebuilder.get_name() && window.confirm("Une page existe. Voulez vous la supprimer ?")) {
            pagebuilder.create();

            $.ajax({
                url: url_popup_create,
                success: function (result) {
                    $("#popup").html(result);
                    $("#popup").show();
                    $("#create-validate").click(function () {

                        pagebuilder.page.name = $("#name").val();

                        if ($("#fluid").is(":checked")) pagebuilder.page.param.classes = "create container-fluid";
                        else pagebuilder.page.param.classes = "create container";
                        $("#popup").hide();
                        pagebuilder.show();


                    })

                    close();

                }

            })
        }

    })

    $("#add-zone").click(function () {
        $.ajax({
            url:url_popup_addzone,
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