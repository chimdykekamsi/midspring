window.lazyload=()=>{var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}};
(function ($) {
    "use strict"; const eng = "/home/";

    //Preloader
    $(window).on('load', function (event) {
        $('.js-preloader').delay(500).fadeOut(500);
    });
    
    //Open Search Box
    $('.searchbtn').on('click', function() {
        $('.search-area').toggleClass('open');
    });
    $('.close-searchbox').on('click', function() {
        $('.search-area').removeClass('open');
    });

    //Open Mobile Sidebar
    $('.mobile-sidebar').on('click', function() {
        $('.header-top').toggleClass('open');
    });
    $('.close-sidebar').on('click', function() {
        $('.header-top').removeClass('open');
    });

    
    //Counter
    $(".odometer").appear(function (e) {
        var odo = $(".odometer");
        odo.each(function () {
            var countNumber = $(this).attr("data-count");
            $(this).html(countNumber);
        });
    });

    // Language Dropdown
    $(".language-option").each(function () {
        var each = $(this)
        each.find(".lang-name").html(each.find(".language-dropdown-menu a:nth-child(1)").text());
        var allOptions = $(".language-dropdown-menu").children('a');
        each.find(".language-dropdown-menu").on("click", "a", function () {
            allOptions.removeClass('selected');
            $(this).addClass('selected');
            $(this).closest(".language-option").find(".lang-name").html($(this).text());
        });
    })
    
    //Hero  Slider 
    var hero = $(".hero-slider-two"); if(hero.length){
    hero.owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        margin: 20,
        items: 1,
        navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-next"></i>'],
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
    }); }

    //Testimonial Slider 
    var testy = $(".testimonial-slider-one"); if(testy.length){
    testy.owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-next"></i>'],
        margin: 25,
        items: 1,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    }); }

   
    //sticky Header
    var wind = $(window); var sticky = $('.header-wrap');
    wind.on('scroll', function () {
        var scroll = wind.scrollTop();
        if (scroll < 100) {
            sticky.removeClass('sticky');
        } else {
            sticky.addClass('sticky');
        }
    });

    // Responsive mmenu
    $(window).on('resize', function() {
        if($(window).width() <= 1199) {
            $('.collapse.navbar-collapse').removeClass('collapse');
        }else{
            $('.navbar-collapse').addClass('collapse');
        }
    });
    $('.mobile-menu a').on('click', function() {
        $('.main-menu-wrap').addClass('open'); $('.collapse.navbar-collapse').removeClass('collapse');
    });

    $('.mobile_menu a').on('click', function () {
        $(this).parent().toggleClass('open');
        $('.main-menu-wrap').toggleClass('open');
    });

    $('.menu-close').on('click', function () {
        $('.main-menu-wrap').removeClass('open')
    });
    $('.mobile-top-bar').on('click', function () {
        $('.header-top').addClass('open')
    });
    $('.close-header-top button').on('click', function () {
        $('.header-top').removeClass('open')
    });
    var $offcanvasNav = $('.navbar-nav'),
    $offcanvasNavSubMenu = $offcanvasNav.find('.dropdown-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="ri-arrow-down-s-line"></i></span>');
    $offcanvasNavSubMenu.slideUp();
    $offcanvasNav.on('click', 'li a, li .menu-expand', function (e) {
        var $this = $(this);
        if (($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.siblings('ul').slideUp('slow');
            } else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('slow');
                $this.siblings('ul').slideDown('slow');
            }
        }
        if ($this.is('a') || $this.is('span') || $this.attr('class').match(/\b(menu-expand)\b/)) {
            $this.parent().toggleClass('menu-open');
        } else if ($this.is('li') && $this.attr('class').match(/\b('dropdown-menu')\b/)) {
            $this.toggleClass('menu-open');
        }
    });

    // Scroll animation
    AOS.init();
    
    // Notification Function
	window.notify = (form,msg,s='err') => {
        var s_arr = {'suc':{'c':'success','i':'fa-check-circle','t':'Success!'},'err':{'c':'danger','i':'fa-times-circle','t':'Oops!'},'inf':{'c':'info','i':'fa-exclamation-circle','t':'Info!'}};
        let err = form.find("div.alert"); if(err.length < 1) { alert(s_arr[s]['t']+" "+msg); return; }
        err.attr('class',function(i,c){ return c && c.replace(/\balert-\S+/g, ''); });
        err.html("<i class='fa "+s_arr[s]['i']+"'></i> "+msg); err.addClass("alert-"+s_arr[s]['c']); 
        err.fadeIn("fast"); setTimeout(()=>{ err.fadeOut("fast"); err.html(""); }, 7e3);
    };
		
    // Multiform For Non-FILES
    $(document).on("submit","form.non-files-form", function(e){
        e.preventDefault(); var me = $(this); var type = me.attr("data-type"); 
		var form = me.serialize()+"&"+type+"=yes"; var btn = me.find("button[type='submit']"); var file = me.find("data-file");
		if(file !== undefined){ form = new FormData(this); form.append(type,"yes"); }
        var xbtn = btn.html(); btn.prop("disabled",1).html("<i class='ri-loader-2-line fa-spin'></i>");
		var my_page = me.attr("data-sub-url"); me.find(".alert").removeClass("d-none");
        
        $.ajax({
            url:eng+my_page,type:"POST",data:form,processData:false,contentType:false,success:function(suc){
			if(suc.status == true){
                    notify(me,me.attr("data-suc"),"suc"); btn.html("<i class='fa fa-check-circle'></i>");
                    if(me.attr("data-redirect") !== undefined){
                        setTimeout(()=>{ window.location.replace(me.attr("data-redirect")); },1500);
                    }
                    setTimeout(()=>{ btn.html(xbtn).prop("disabled",0); },2e3);
                }else{
                    btn.html(xbtn).prop("disabled",0); notify(me,suc.message);
                }
            },
            error: function(er){
                btn.html(xbtn).prop("disabled",0); notify(me,"Unable to reach server!<br/><small>Please check your network & try again.</small>");
            }
        });
    });
    
    // ==> MAJOR SEC UPGRADE
    // Prevent Focus
    $(document).on("focusin","input[data-nofocus]",function(e){ e.preventDefault(); var me = $(this); me.blur(); });
	// Handle Pasted Content
    $(document).on('paste','input', function(e){ var c = $.Event('keyup'); c.which = 65; $(this).trigger(c); });
    // Amount Formatter
    window.format=(input,type='f')=>{ 
        if(type == 'f'){ input = input.replace(/[\D\s\._\-]+/g, ""); 
        input = input ? parseFloat(input, 10) : 0.00;
        return ( input === 0 ) ? "" : input.toLocaleString("en-US"); }else{ return input.replace(/,/g,""); } };
    // Monitor Amount & Decimal Boxes & Numbers
    $(document).on("keypress","[data-decimal]", function(e){
        var me = $(this); var val = me.val();
        if((e.which != 46 || e.which != 8 || val.indexOf('.') != -1) && (e.which < 48 || e.which > 57) && $.inArray(e.keyCode, [38,40,37,39,13]) === -1){ e.preventDefault(); } });
    $(document).on("keypress","[data-number],[data-amount]", function(e){
        var me = $(this); var val = me.val();
        if((e.which != 46 || e.which != 8) && (e.which < 48 || e.which > 57) && $.inArray(e.keyCode, [38,40,37,39,13]) === -1){ e.preventDefault(); }  });
    $(document).on("keyup","[data-amount]", function(e){
        var me = $(this); var val = me.val(); me.val(window.format(val));
    });
    // Min Number Function
    $(document).on("blur focusout","[data-min]",function(e){ var me = $(this); var val = parseInt(window.format(me.val(),"u")); var min = me.attr("data-min"); if(val < min){ if(me.attr("[data-amount]") !== 'undefined' && me.attr("[data-amount]") !== false){ me.val(window.format(min)).trigger("input"); }else{ me.val(min).trigger("input"); } } });
    // Max Number Function
    $(document).on("blur focusout","[data-max]",function(e){ var me = $(this); var val = parseInt(window.format(me.val(),"u")); var max = me.attr("data-max"); if(val > max){ if(me.attr("[data-amount]") !== 'undefined' && me.attr("[data-amount]") !== false){ me.val(window.format(max)).trigger("input"); }else{ me.val(max).trigger("input"); } } });
    // MAX-LENGTH Watch
    $(document).on("keydown","[maxlength]",function(e){
        var me = $(this);  var val = me.val();
        if((e.which != 46 || e.which != 8) && val.length == me.attr("maxlength") && $.inArray(e.keyCode, [38,40,37,39,13]) === false){ return false; }
    });


    //Back To top
    function BackToTop() {
        $('.back-to-top').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 100);
            return false;
        });

        $(document).scroll(function () {
            var y = $(this).scrollTop();
            if (y > 600) {
                $('.back-to-top').fadeIn();
                $('.back-to-top').addClass('open');
            } else {
                $('.back-to-top').fadeOut();
                $('.back-to-top').removeClass('open');
            }
        });
    }
    BackToTop(); var a='<script type="text/javascript">function googleTranslateElementInit(){new google.translate.TranslateElement({pageLanguage:"en"},"google_translate_element");}</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer></script>';$(document).find("body").append(a); window.lazyload();

})(jQuery);
