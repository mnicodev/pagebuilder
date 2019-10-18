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
            format=page.zones[i].format.split(":");
            zone=document.createElement("div");
            $(zone).addClass("row");
            console.log(parseInt(format.length))
            classe=12/parseInt(format.length);
            for(var j in format) {
                content=document.createElement("div");
                $(content).addClass("col-md-"+classe);
                zone.appendChild(content);
            }
            container.appendChild(zone);
            console.log(format);
        }



        $("#page").append(container);


    }
}