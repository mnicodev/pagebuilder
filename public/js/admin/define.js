function o_param() {
    this.classes= "";
    this.style= "";
}
function o_page() {
    this.name="";
    this.description="";
    this.param=new o_param();
    this.zones=[];

}
var pagebuilder={
    page: new o_page(),
	content: "",

    create: function() {
        localStorage.setItem('pagebuilder','');
        this.page=null;
        this.page=new o_page();

    },

    get_name: function() {
      return this.page.name;

    },


    save: function() {
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
        h1=document.createElement("h1");
        h2=document.createElement("h2");
        $(chapo).addClass("jumbotron chapo");
        $(h1).append(this.page.name);
        $(h2).append(this.page.description);
        chapo.appendChild(h1);
        chapo.appendChild(h2);


        //$("#page").append(chapo);
        $(global_row).append(chapo);
        $("#page").addClass("container create");

        content_wrapper=document.createElement("div");
        container=document.createElement("div");
        // on affecte les classes
        //$(container).addClass(this.page.param.classes);
        $(container).addClass("sortable connected");
		$(content_wrapper).addClass("content-wrapper");

		$(content_wrapper).html(this.content);
		



        $(global_row).append(content_wrapper);
        $("#page").append(global_row);



        this.save();
        set_drag();
        action_content();
    }

}