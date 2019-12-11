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
	this.add_content=function(c) {
		this.contents.push(c);
	}
}
function o_zone() {
    this.param= new o_param();
    this.format= "";
    this.blocs= [];
	this.zones=[];
	this.add_zone=function(z) {
		this.zones.push(z);
	}
	this.add_bloc=function(b) {
		this.blocs.push(b);
	}
}
function o_page() {
    this.name="";
    this.description="";
    this.param=new o_param();
    this.zones=[];
	this.add_zone=function(z) {
		this.zones.push(z);
	}

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

    del_zone: function(id) {
        this.page.zones.splice(id,1);
        this.show();

    },

    update_content: function(id, str) {
        t=id.split(":");
        this.page.zones[t[0]].blocs[t[1]].contents[t[2]].data=str;

        this.show();
        $("#popup").hide();
        action_content();

        set_drag();


        this.save();

    },

    add_content: function(bloc, str) {
        console.log(bloc)
        id=bloc.split(":");
        c=new o_content();
        c.data=str;


        this.page.zones[id[0]].blocs[id[1]].contents.push(c);
        this.show();
        $("#popup").hide();
        action_content();

        set_drag();


        this.save();
    },

    del_content: function(id) {
        t=id.split(":");

        this.page.zones[t[0]].blocs[t[1]].contents.splice(t[2],1);

        this.show();

    },

    save: function() {
        if(window.localStorage) {console.log("save");
            localStorage.setItem('pagebuilder',JSON.stringify(this.page));
        }
    },

    /*refresh: function() {
        p=new o_page();
        p.name=this.page.name;
    	p.description=this.page.description;
        p.param=this.page.param;
        $(".create").find(".zone").each(function() {
                z = new o_zone();console.log(z);
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
                        b.add_content(c);
                    })
                    z.add_bloc(b);

                })
                p.add_zone(z);

            }

        )

        this.page=p;
    },*/




    show: function () {
        $("#page").html("");
        // un element row
        global_row=document.createElement("div");
        $(global_row).addClass("global-row");
        chapo=document.createElement("div");
        h1=document.createElement("h1");
        h2=document.createElement("h2");
        $(chapo).addClass("jumbotron chapo");
        $(h1).append(this.page.name);
        $(h2).append(this.page.description);
        chapo.appendChild(h1);
        chapo.appendChild(h2);


        //$("#page").append(chapo);
        $(global_row).append(chapo);
        $("#page").addClass(this.page.param.classes+" create");

        content_wrapper=document.createElement("div");
        container=document.createElement("ul");
        // on affecte les classes
        //$(container).addClass(this.page.param.classes);
        $(container).addClass("sortable connected");
		$(content_wrapper).addClass("content-wrapper");
		


        for(var i in this.page.zones) {
            element="";
			// on récupére le format de la zone, pour déterminer la largeur des blocs
            f=this.page.zones[i].format.split(":");

            element=document.createElement("li");
            $(element).addClass("zone");
            $(element).addClass(this.page.zones[i].param.classes);
            $(element).attr("data-line",i);
            $(element).attr("data-format",this.page.zones[i].format);
            $(element).attr("data-param-classes",this.page.zones[i].param.classes);
            $(element).attr("data-param-style",this.page.zones[i].param.style);
            $(element).attr("id","zone_"+i);

            container_bloc=document.createElement("div");
            $(container_bloc).addClass("row");

            for(var j in this.page.zones[i].blocs) {

                bloc=document.createElement("ul");
                /*action=document.createElement("div");
                $(action).addClass("action");*/

				// on applique le format de la zone aux blocs
                $(bloc).addClass("connected sortable for-action bloc col-md-"+f[j]);
                $(bloc).attr("id","bloc_"+i+"_"+j);
                $(bloc).attr("data-param-classes",this.page.zones[i].blocs[j].param.classes);
                $(bloc).attr("data-param-style",this.page.zones[i].blocs[j].param.style);
                $(bloc).attr("data-bloc",i+":"+j);
               // bloc.appendChild(action);

                if(this.page.zones[i].blocs[j].contents.length) {
                    for(var c in this.page.zones[i].blocs[j].contents) {
                        content=document.createElement("li");
                        $(content).addClass("content ");
                        $(content).attr("data-pos",i+":"+j+":"+c);
                        $(content).attr("data-param-classes", this.page.zones[i].blocs[j].contents[c].param.classes);
                        $(content).attr("data-param-style", this.page.zones[i].blocs[j].contents[c].param.style);
                        //prefix="<div class='content' id='content-"+c+"'>";
                        //suffix="</div>";
                        prefix="";
                        suffix="";
                        $(content).append(prefix+this.page.zones[i].blocs[j].contents[c].data+suffix);
                        bloc.appendChild(content);
                    }

                } else {
                    content=document.createElement("li");
                    $(content).addClass("vide");
                    bloc.appendChild(content);
                }
                container_bloc.appendChild(bloc)

                element.appendChild(container_bloc);
                //element.appendChild(bloc);

            }
            container.appendChild(element);
			

        }
		$(content_wrapper).append(container);

        $(global_row).append(content_wrapper);
        $("#page").append(global_row);



        this.save();
        set_drag();
        action_content();

    }

}