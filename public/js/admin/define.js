function o_param() {
    this.classes= "";
    this.style= "";
}
function o_page() {
    this.name="";
    this.description="";
	this.content="",
    this.param=new o_param();
    this.zones=[];

}
classe={
	param:"",
	container:"",
}
// ZONE
section={
	name:"",
}
content={
	name:"",
	data:"",
}
var pagebuilder={
    //page: new o_page(),
	page: {
		name:"",
		description:"",
		blocs: {},
		classes: {},
		content: "",
		param: "",
		cache: "",
	},
	/*classes: [],
	structure: "",*/

    create: function() {
        localStorage.setItem('pagebuilder','');
        this.page=null;
        this.page=new o_page();

    },

    get_name: function() {
      return this.page.name;

    },

	set_name: function(name) {
		this.page.name=name;
	},

	set_description: function(str) {
		this.page.description=str;
	},

	get_content: function(c=0) {
		if(c==1) return this.page.cache;
		return this.page.content;
	},


	set_content: function(c) {
		this.page.content=c;
		console.log(c);
	},

	set_style: function(o,c) {
		this.page.classes[o]=c;
	},
	get_bloc: function(b) {
		return this.page.blocs[b];
	},

	get_style: function(b) {
		return this.page.classes[b];
	},


	set_bloc: function(res) {
		this.page.blocs[res.content]=res.data;
	},

	del_bloc: function(c) {
		delete this.page.blocs[c];
	},

	load: function(p) {
		this.page.name=p.name;
		this.page.description=p.description;
		this.page.cache=p.cache;
		this.page.content=p.content;
		this.page.blocs=p.blocs;
		this.page.classes=p.classes;

		this.show();
		// chargement des blocs de données
		for(bloc in p.blocs) {
			$("#"+bloc).html(this.get_bloc(bloc));
		}
		for(bloc in this.page.classes) {
			$("#"+bloc).attr("style",this.get_style(bloc));
		}

	},


    save: function() {

		this.page.name=$(".h1").val();
		this.page.description=$(".h2").val();
		this.page.cache=$("#page .content-wrapper").html();
		old=$("#page .content-wrapper").html();
		$(".content").each(function() {
			$(this).html("");
			$(this).removeAttr("style");
		});
		$("section").each(function() {
			$(this).removeAttr("style");
		})
		$(".bloc").each(function() {
			$(this).removeAttr("style");
		})

		this.page.content=$("#page .content-wrapper").html();
		$("#page .content-wrapper").html(old);





        if(window.localStorage) {console.log("save");
            localStorage.setItem('pagebuilder',JSON.stringify(this.page));
        }
    },


    show: function () {
        $("#page").html("");
        // un element row
        global_row=document.createElement("div");
        $(global_row).addClass("global-row");
        chapo=document.createElement("div");
        h1=document.createElement("input");
        h2=document.createElement("textarea");
        $(chapo).addClass("jumbotron chapo");
		$(h1).attr("type","text");
		$(h1).addClass("h1");
		$(h2).addClass("h2");
        $(h1).val(this.page.name);
        $(h2).val(this.page.description);
        chapo.appendChild(h1);
        chapo.appendChild(h2);


        //$("#page").append(chapo);
        $(global_row).append(chapo);
        $("#page").addClass("create");

        content_wrapper=document.createElement("div");
       	container=document.createElement("div");
        // on affecte les classes
        //$(container).addClass(this.page.param.classes);
        $(container).addClass("sortable connected");
		$(content_wrapper).addClass("content-wrapper");
		$(content_wrapper).html(this.get_content());

		



        $(global_row).append(content_wrapper);
        $("#page").append(global_row);



        //this.save();
        set_drag();
        action_on_zone();
    }

}