jQuery(document).ready(function(){/Firefox/i.test(navigator.userAgent);var e={};jQuery(window).scrollTop();jQuery(".section-slider").each(function(){e[this.id]=0}),jQuery.fn.isFullyInViewport=function(){var e=jQuery(this).offset().top+300,t=e+jQuery(this).outerHeight()/4,a=jQuery(window).scrollTop(),r=a+jQuery(window).height();return a<=e&&t<=r};var t,a=jQuery("#pay-gateways"),r=jQuery("#events"),o=jQuery("#about-vids"),s=jQuery("#fb-outer"),i=jQuery("#numbers");if(a.owlCarousel({loop:!0,margin:10,dots:!1,responsiveClass:!0,autoplay:!0,autoplayTimeout:1700,autoplayHoverPause:!0,responsive:{0:{items:1,nav:!1},600:{items:5,nav:!0}}}),o.owlCarousel({loop:!0,margin:10,dots:!1,responsiveClass:!0,autoplay:!1,autoplayTimeout:1700,autoplayHoverPause:!0,responsive:{0:{items:1,nav:!1},600:{items:2,nav:!0}}}),i.owlCarousel({loop:!0,margin:10,dots:!1,responsiveClass:!0,autoplay:!0,autoplayTimeout:1700,autoplayHoverPause:!0,responsive:{0:{items:1,nav:!1},600:{items:3,nav:!0}}}),r.owlCarousel({loop:!0,margin:10,dots:!1,responsiveClass:!0,autoplay:!0,autoplayTimeout:3700,autoplayHoverPause:!0,items:1}),s.owlCarousel({loop:!0,margin:10,dots:!1,responsiveClass:!0,autoplay:!0,autoplayTimeout:4e3,autoplayHoverPause:!0,items:1}),jQuery(".next").click(function(){owl.trigger("owl.next")}),jQuery(".prev").click(function(){owl.trigger("owl.prev")}),jQuery("#products > .item:nth-child(odd)").find("div.featured-img").addClass("col-md-push-5").siblings(".excerpt").addClass("col-md-pull-7"),jQuery(".cpt-outer").length){var u=0,l=jQuery(".cpt-outer");l.each(function(){var e="cpt"+ ++u;jQuery(this).attr("id",e),jQuery(this).val(u)}),l.first().addClass("active")}jQuery("#products").find(".tab-pane.fade").first().addClass("active in"),jQuery("body.home").length&&(document.body,document.documentElement,jQuery(window).scroll(function(){t=500*jQuery(window).scrollTop()/(jQuery(document).height()-jQuery(window).height()),jQuery("#top").css("background-position","0px "+t+"%")}))}),jQuery(window).load(function(){if(jQuery(".item:first-child").addClass("active"),jQuery("Layer_1 , #circle , #right-box , #striped-box  , #imgs , #left-box , .post-content , .post-sidebar").addClass("opacTrans-anim"),jQuery(".posts-excerpt , .post-outer ").addClass("opac-anim"),jQuery(".post-head > h1").addClass("pageTitle-anim"),jQuery(window).width()<992?jQuery(".home-h3").addClass("opacTrans-anim2"):jQuery(".home-h3").addClass("opacTrans-anim"),jQuery(".adj-col-outer").each(function(){var t=0;jQuery(this).find("div.adj-col").each(function(){var e=jQuery(this).height();t<e&&(t=e)}),jQuery(this).find(".adj-col").height(t)}),jQuery("body.page-template-template-about").length){var e=jQuery(".owl-item.active > .vid-item").first().attr("data-value");function t(){return parts=e.split("/"),last_part=parts[parts.length-1],last_part}embedUrl="https://www.youtube.com/embed/",jQuery("#vid-frame").attr("src",embedUrl+t()),jQuery(".vid-item").on("click",function(){e=jQuery(this).attr("data-value"),jQuery("#vid-frame").attr("src",embedUrl+t())})}}),jQuery(window).on("resize scroll",function(){var e=jQuery(window).scrollTop();jQuery(".cpt-outer").each(function(){var e=jQuery(this).attr("id");jQuery(this).isFullyInViewport()?jQuery("#"+e).addClass("active"):jQuery("#"+e).removeClass("active")});var t=jQuery("#header");100<=e?t.addClass("fixed"):t.removeClass("fixed")});