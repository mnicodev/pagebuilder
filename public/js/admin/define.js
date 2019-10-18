var zone={
    format: "",

}
var page={
    name: "",
    param: "",
    zones: [],

    refresh: function () {
        $("#page").html("");
        container=document.createElement("div");
        $(container).addClass(this.param);



        for(var i in page.zones) {
            element="";
            f=page.zones[i].format.split(":");
            liste_blocs=page.zones[i].blocs;
            element=document.createElement("div");
            $(element).addClass("row");
            $(element).attr("data-line",i);


            for(var j in liste_blocs) {

                bloc=document.createElement("div");
                action=document.createElement("div");
                $(action).addClass("action");
                $(bloc).addClass("for-action col-md-"+f[j]);
                $(bloc).attr("id","bloc-"+i+":"+j);
                $(bloc).attr("data-bloc",i+":"+j);
                bloc.appendChild(action);

                if(page.zones[i].blocs[j].content!=="") {
                    content=document.createElement("div");
                    $(content).addClass("content");
                    $(content).append(page.zones[i].blocs[j].content);
                    bloc.appendChild(content);
                }

                element.appendChild(bloc);

            }
            container.appendChild(element);

        }



        $("#page").append(container);

        $(".action").click(function () {

            $.ajax({
                url: url_popup_content,
                method: "GET",
                data: {bloc:$(this).parent().attr("data-bloc")},
                success: function (result) {
                    $("#popup").html(result);
                    $("#popup").show();
                    close();
                }
            })
        })
    }

}