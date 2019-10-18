

function close() {
    $("#close").click(function () {
        $("#popup").hide();
    })
}

function put_content(bloc,str) {

   // console.log(bloc+"-"+str);
    id=bloc.split(":");
    page.zones[id[0]].blocs[id[1]].content+=str;
    page.refresh();
}

jQuery(document).ready(function() {


    $("#create-page").click(function () {
        $.ajax({
            url: url_popup_create,
            success: function(result) {
                $("#popup").html(result);
                $("#popup").show();
                $("#create-validate").click(function () {

                    page.name=$("#name").val();

                    if($("#fluid").is(":checked")) page.param="create container-fluid";
                    else page.param="create container";
                    $("#popup").hide();
                    page.refresh();


                })

                close();

            }

        })

    })

    $("#add-zone").click(function () {
        $.ajax({
            url:url_popup_addzone,
            success: function (result) {
                if(page.name==="") alert("Veuillez créer une page");
                else  {
                    $("#popup").html(result);
                    $("#popup").show();

                    $("#zone-validate").click(function () {


                        f=new String($("#create_zone_format").val()).split(":");

                        z={
                            format: $("#create_zone_format").val(),
                            blocs: [],

                        }
                        for(i in f) {
                            c={
                                content: "",
                            }
                            z.blocs.push(c);
                        }

                        page.zones.push(z);


                        $("#popup").hide();
                        page.refresh();


                    })

                    close();


                }

            }

        })

    })


    $("#content-validate").click(function () {
      alert($("#content").val());
    })



})