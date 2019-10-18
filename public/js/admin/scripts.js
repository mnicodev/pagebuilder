

function close() {
    $("#close").click(function () {
        $("#popup").hide();
    })
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

                        zone.format=$("#create_zone_format").val();
                        page.zones.push(zone);


                        $("#popup").hide();
                        page.refresh();


                    })

                    close();


                }

            }

        })

    })





})