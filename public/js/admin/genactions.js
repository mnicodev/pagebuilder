function action_zone(z) {
	$("#style-zone").click(function() {
			open_popup_style(z);
	})

       $("#delete-zone").click(function () {
			if(window.confirm("Suppimer la zone "+z+" ?"))
			   $("#"+z).remove();
        })
}
function action_bloc(b) {
		$("#style-bloc").click(function() {
			open_popup_style(b);
		})
        $("#add-content").click(function () {

            $.ajax({
                url: url_popup_content,
                method: "POST",
				data: {bloc:b,id: ""},
                success: function (result) {
                    $("#popup").html(result);
                    $("#popup").show();
					action_on_zone();
                    close();


                }
            })
        })
}

function action_content(c) {

        $("#edit-content").click(function () {
            $.ajax({
                url: url_popup_content,
                method: "POST",
				data: {content: c},
                success: function (result) {
                    $("#popup").html(result);
                    $("#popup").show();
                    close();


                }
            })
        })
        $("#delete-content").click(function () {
            if(window.confirm('Supprimer le contenu ?')) {
				$("#"+c).remove();
				pagebuilder.del_bloc(c);
			}

        })
}
