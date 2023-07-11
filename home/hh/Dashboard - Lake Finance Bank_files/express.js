(function($) {
    "use strict";
    const innerWidth = $(window).innerWidth();
    // Notify Function
    var inotify="0";window.notify=((i,n="err",e=3e3)=>{let t="success",o="Success!",c="fa fa-check-circle",f="bottom",q="right";innerWidth<568&&(f="top",q="center"),"err"==n&&(t="danger",o="Error!",c="fa fa-times-circle"),"inf"==n&&(t="info",o="Info!",c="fa fa-exclamation-circle"),inotify!==i&&(inotify=i,$.notify({icon:c,title:o,message:i},{type:t,placement:{from:f,align:q}}),e+=2e3,setTimeout(function(){inotify="0"},e))});$(document).on("click","button[data-notify='dismiss']",function(i){inotify="0"});
    var view = $(document).find("div#my-view");
    var loader = '<div class="loader"><div class="signal"></div></div>';
    var lerr = (link) => { return '<div class="loader loader-box"> <h6><i class="la la-exclamation-triangle la-5x"></i><br/>An Error Occured, Please Try Again!</h6> <a href="'+link+'" class="btn btn-sm btn-warning">Reload</a>  </div>'; };
    var four = (link) => { return '<div class="loader loader-box" align="center"><h6> <i class="la la-exclamation-triangle la-5x"></i><br/> Page Under Construction!</h6> <a href="'+link+'" class="btn btn-warning btn-sm">Home <i class="fa fa-home"></i></a> </div>'; };
    var bread = $(document).find("div#bread"); var navp = $(document).find("ul#memenu");
    var navbtn = $(document).find("button#menuToggleMini");
    
    /// => Update Title Functions
    const updatetitle = (tit) => {
        var title = $(document).find("title"); title.html(tit).attr("my-title",tit);
    };
    
    /// => Retrive Title
    const title = () => {
        var tit = $(document).find("title").text(); return tit;
    };
    
    
    /// => Global Page Loader ()
    window.gbloader = function(link,check = null,log = null){
        link = link == 'self' ? localStorage.page : link; localStorage.page = link;
        
        // Activate Loader
        if(check !== null){
            view.html(loader); updatetitle("Loading... - Midspring Bank");
            navp.find("li.active").removeClass("active");  
            navp.find("li > a[href]").each(function(){
                var mel = $(this).attr("href");
                if(link.includes(mel)){ $(this).parent().addClass("active"); }
            });
        }
        
    $.ajax({
        url: "https://mobile.lakefinancebank.com/pages/"+link,
        type: "GET",data: "get_page=yes",dataType: "json",cache: false,
        success: function(suc){
            bread.html(suc.b); updatetitle(suc.t); 
            if(log !== null){
                history.pushState(null, null, link);
            }   
            view.html(suc.v);
        },
        error: function(err){
            // Network failure  
            if(err.status == "404"){
                view.html(four('home/'));
                updatetitle("Not Found - Midspring Bank");
            }else{
                view.html(lerr(link));
                notify("Technical Error!<br/><small>"+err.status+":"+err.responseText+"</small>");
                updatetitle("Error - Midspring Bank"); 
            }
        }
    });    
    };
    
    
    /// => Check For Last Page
    var _link = "";
    $(window).bind('popstate', function(){
        _link = window.location.pathname;
        $(document).find("div.modal-backdrop").fadeOut("fast");
        gbloader(_link,1);
    });
    
    localStorage.page === null || localStorage.page === undefined || localStorage.page === "" ? localStorage.page = 'home/' : "";
    _link = window.location.pathname;
    if(_link === "" || _link == "/"){
        history.pushState(null, null, 'home/');
        _link = "home/";
    }
    if(localStorage.page !== null && localStorage.page !== undefined && localStorage.page !== "" && _link !== localStorage.page){
        history.pushState(null, null, _link);
        gbloader(_link,1);
    }else{
        gbloader(localStorage.page,1);
    }

    // Handle Navigation
    if(localStorage.page !== null && localStorage.page !== undefined){
        $(document).find("ul#memenu > li > a[href]").each(function(){
            var link = $(this).attr("href");
            var rel = "="+$(this).attr("data-rel");
            if(localStorage.page.includes(link)){
                $(this).parent().addClass("active");
            }else if(!localStorage.page.includes(link) && localStorage.page.includes(rel)){
                $(this).parent().addClass("active");
            }
        });
    }
    
    // Navigation With Chiva-Express
    $(document).on("click","a[href]", function(e){
    var me = $(this);    
    var link = me.attr("href");
    var oldt = title();
    
    // Retrieve & Display Page
    if(!link.includes("javascript:") && link !== "#" && !link.includes("#") && link !== "" && me.attr("target") === undefined && link.trim().length > 0 && link !== "./index.html" && !link.includes("https://")){
        // Loading Title
        updatetitle("Loading... - Midspring Bank"); 
        view.html(loader);
        
        // Check if link is navigation    
        if(me.attr("aside") !== undefined){
            if(innerWidth < 768) {
                navbtn.click();
            }
        }    
        navp.find("li.active").removeClass("active"); 
        navp.find("li > a[aside]").each(function(){
            var mel = $(this).attr("href");
            if(link.includes(mel)){
                $(this).parent().addClass("active");
            }
        });
        
        // Prevent Default
        e.preventDefault();   
        
        // Load Page
        bread.empty(); gbloader(link,null,1);
        
    }else if(me.attr("target") !== undefined){
        // Blank Target
        updatetitle(oldt);
    }else if(link.includes("javascript:")){
        e.preventDefault();
    }else if(me.attr("data-toggle") !== undefined){
        // Tabs Link
        updatetitle(me.attr("title"));
    }else{
        window.location.href = link;    
    }       
    });
    
})(jQuery);