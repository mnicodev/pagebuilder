function o_param() {
    this.classes= "";
    this.style= "";
}
function o_content() {
    this.param= new o_param();
    this.data= "";
}
function o_bloc() {
    this.param= new o_param();
    this.contents= [];
}
function o_zone() {
    this.param= new o_param();
    this.format= "";
    this.blocs= [];
}
function o_page() {
    this.name="";
    this.param=new o_param();
    this.zones=[];

}
var pagebuilder={
    page: new o_page(),

    create: function() {
        localStorage.setItem('pagebuilder','');
        this.page=null;
        this.page=new o_page();

    },

    get_name: function() {
      return this.page.name;

    },


    add_zone: function(z) {
        this.page.zones.push(z);
    },

    save: function() {
        if(window.localStorage) {
            localStorage.setItem('pagebuilder',JSON.stringify(this.page));
        }
    },

    refresh: function() {
        console.log("ok");
        p=new o_page();

        p.name=this.page.name;
        p.param=this.page.param;
        $(".create").find(".zone").each(function() {
            console.log($(this).attr("id"))
                z = new o_zone();
                z.param.classes = $(this).attr("data-param-classes");
                z.param.style = $(this).attr("data-param-style");
                z.format=$(this).attr("data-format");

                $(this).find(".bloc").each(function () {
                    b=new o_bloc();
                    b.param.classes = $(this).attr("data-param-classes");
                    b.param.style = $(this).attr("data-param-style");

                    $(this).find(".contents").each(function () {
                        c=new o_content();
                        c.param.classes= $(this).attr("data-param-classes");
                        c.param.style= $(this).attr("data-param-style");
                        c.data=$(this).html();
                        b.contents.push(c);
                    })
                    z.blocs.push(b);

                })
                p.zones.push(z);

            }

        )

        this.page=p;
    },


    show: function () {
        $("#page").html("");
        container=document.createElement("div");
        // on affecte les classes
        $(container).addClass(this.page.param.classes);



        for(var i in this.page.zones) {
            element="";
            f=this.page.zones[i].format.split(":");
            liste_blocs=this.page.zones[i].blocs;
            element=document.createElement("div");
            $(element).addClass("row zone");
            $(element).attr("data-line",i);
            $(element).attr("data-format",this.page.zones[i].format);
            $(element).attr("data-param-classes",this.page.zones[i].param.classes);
            $(element).attr("data-param-style",this.page.zones[i].param.style);
            $(element).attr("id","zone_"+i);


            for(var j in liste_blocs) {

                bloc=document.createElement("div");
                action=document.createElement("div");
                $(action).addClass("action");
                $(bloc).addClass("for-action bloc col-md-"+f[j]);
                $(bloc).attr("id","bloc_"+i+"_"+j);
                $(bloc).attr("data-param-classes",this.page.zones[i].blocs[j].param.classes);
                $(bloc).attr("data-param-style",this.page.zones[i].blocs[j].param.style);
                $(bloc).attr("data-bloc",i+":"+j);
                bloc.appendChild(action);

                if(this.page.zones[i].blocs[j].contents.length) {
                    for(var c in this.page.zones[i].blocs[j].contents) {
                        content=document.createElement("div");
                        $(content).addClass("contents");
                        $(content).attr("data-param-classes", this.page.zones[i].blocs[j].contents[c].param.classes);
                        $(content).attr("data-param-style", this.page.zones[i].blocs[j].contents[c].param.style);
                        $(content).append(this.page.zones[i].blocs[j].contents[c].data);
                        bloc.appendChild(content);
                    }

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

        this.save();
    }

}