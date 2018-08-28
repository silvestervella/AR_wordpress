  /**
   * document.ready
   * 
   * 0. Generic functions
   * 1. Home post pagination (1 post)
   * 2. Menu animations
   * 3. Games info slider
   * 4. No scroll on open menu
   * 5. Carousel slider
   * 6. Products section add class to .item
   * 
   * window.load
   * 
   * 1. Pages anim 
   * 2. Set equal height to divs
   */

  
jQuery(document).ready(function(){

  var mousewheelevt=(/Firefox/i.test(navigator.userAgent))? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x
  var secWithSlider = {};
  var currNum = 0;

  /**
   * 0. Generic functions
   */
  // Remove class
  function rmvClass(selector , classToRemove) {
    jQuery(selector).removeClass(classToRemove);
  }
  // Add class
  function addClass(selector , classToAdd) {
    jQuery(selector).addClass(classToAdd);
  }
  // Create object with section IDs as keys
  jQuery('.section-slider').each(function () {
    secWithSlider[this.id] = 0;
  });
  // Scrolling
  /*
  function scrollinFunc(prevDiv , nextDiv) {
    jQuery(window).on(mousewheelevt, function(event) {
      if (event.originalEvent.wheelDelta >= 0) {
        prevDiv();
        } else {
          nextDiv();
        }
    });
  }
*/

  /*
  * 1. Home post pagination (1 post)
  */
   // Add class to first home post
   jQuery(".posts-outer:first-of-type").addClass("visible-posts");

   // Next/Prev Buttons function call
   if(jQuery('body.home').length) {
    jQuery(".slider-next").click(function () {
      var theId = jQuery(this).parent().parent().parent().parent().parent().attr('id');
      var numOfPosts = jQuery(this).parent().siblings(".posts-outer").length;

      if(secWithSlider[theId] < (numOfPosts-1)) {
        jQuery(this).parent().siblings(".visible-posts").stop().fadeOut(function() {
          jQuery(this).next(".posts-outer").addClass("visible-posts").fadeIn(function(){
          }).prev().removeClass("visible-posts");
        });
        secWithSlider[theId]++;
      } else {

        jQuery(this).parent().siblings(".visible-posts").stop().fadeOut(function(){
          rmvClass(this, "visible-posts");
        });
        jQuery(this).parent().siblings(".posts-outer").first().delay(300).fadeIn(function(){
          addClass(this, "visible-posts");
        });
        secWithSlider[theId] = 0;
      }
    });
    jQuery(".slider-prev").click(function () {
      var theId = jQuery(this).parent().parent().parent().parent().parent().attr('id');
      var numOfPosts = jQuery(this).parent().siblings(".posts-outer").length;
      
      if(secWithSlider[theId] > 0) {
        jQuery(this).parent().siblings(".visible-posts").stop().fadeOut(function() {
          jQuery(this).prev(".posts-outer").addClass("visible-posts").fadeIn(function(){
          }).next().removeClass("visible-posts");
        });
        secWithSlider[theId]--;

      } else {

        jQuery(this).parent().siblings(".visible-posts").stop().fadeOut(function() {
          rmvClass(this, "visible-posts");
        });
        jQuery(this).parent().siblings(".posts-outer").last().delay(300).fadeIn(function(){
          addClass(this, "visible-posts");
        });
        secWithSlider[theId] = numOfPosts-1;
      }
    });
  }


  /*
  * 2. Menu animations
  */
 var numOfLi = jQuery('#menu-main > li').length;

 jQuery('.menu-button').toggle(function() {

  var count = 0;

  jQuery('#main-nav-outer').fadeIn(400,function(){
    jQuery('#main-nav-outer > nav').fadeIn(200, function(){
      
          jQuery('#menu-main > li').each(function(){
            jQuery(this).children().css({"width": (10 + count ) + "%", "left": "0"});
            count += 10;
          })
          jQuery('#wrapper').hide();
        });
        jQuery('#main-nav-outer #search img').show().animate({ marginTop: '-350px', opacity: 1 }, 1000);
  });
  jQuery(this).fadeOut(500, function() {
    jQuery(this).html("CLOSE").fadeIn(500);
});
}, function(){
  jQuery('#main-nav-outer #search img').animate({ marginTop: '165%' , opacity: 0 }, 1000);
  for (i = 1; i <= numOfLi; i++) {
    jQuery('#menu-main > li > a').css({"width": "0%", "left": "-300px"});
  }
  jQuery('#main-nav-outer').fadeOut(400, function(){
    jQuery('#wrapper').show();
    setTimeout(function(){
      jQuery('#main-nav-outer #search img').hide();
    }, 700);

  });
  jQuery(this).fadeOut(500, function() {
    jQuery(this).html("MENU").fadeIn(500);
  });
  count = 0;
});



/**
 * 3. Games info slider
 */
jQuery(".game-single, .fl-game").mouseover(function(){
  jQuery(this).children( ".game-info" ).css({
    transform: "translate(0)",
  })
});
jQuery(".game-single").mouseout(function(){
  jQuery(this).children( ".game-info" ).css({
    transform: "translate(0 , 300px)",
  });
});
  jQuery(".fl-game").mouseout(function(){
    jQuery(this).children( ".game-info" ).css({
      transform: "translate(150px , 0) ",
    })
});


/**
 * 4. No scroll on open menu
 */
jQuery('#main-nav-outer').on(mousewheelevt, function(e) {
  e.preventDefault();
  e.stopPropagation();
  return false;
})

/**
 * 5. Carousel slider
 */
  jQuery('#numbers ').carousel({
    interval: 5000
  })
  jQuery('#pay-gateways ').carousel({
    interval: 1700,
    items: 5
  })

  jQuery('.carousel .item').each(function(){
    var next = jQuery(this).next();
    if (!next.length) {
      next = jQuery(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo(jQuery(this));
    
    if (next.next().length>0) {
      next.next().children(':first-child').clone().appendTo(jQuery(this));
    }
    else {
      jQuery(this).siblings(':first').children(':first-child').clone().appendTo(jQuery(this));
    }
  });

  jQuery('.section-slider').mouseover(function(e){
    e.stopPropagation();
    jQuery(this).find('.slider-controls').css({opacity: '1'});
  });
  jQuery('.section-slider').mouseout(function(e){
    e.stopPropagation();
    jQuery(this).find('.slider-controls').css({opacity: '0.3'});
  })


  /**
   * 6. Products section add class to .item
   */
  jQuery("#products > .item:nth-child(odd)").find("div.featured-img").addClass("col-md-push-5").siblings(".excerpt").addClass("col-md-pull-7");


 
// End of document.ready
});



jQuery(window).load(function(){

  jQuery('.item:first-child').addClass('active');

  /**
 * 1. Pages anim 
 */
  jQuery("Layer_1 , #circle , #right-box , #striped-box  , #imgs , #left-box , .post-content , .post-sidebar").addClass("opacTrans-anim");
  jQuery(".posts-excerpt , .post-outer ").addClass("opac-anim");
  jQuery(".post-head > h1").addClass("pageTitle-anim");

  if(jQuery(window).width()<992) {
    jQuery(".home-h3").addClass("opacTrans-anim2");
  } else {
    jQuery(".home-h3").addClass("opacTrans-anim");
  }  



    /**
   * 2. Set equal height to divs
   */
  jQuery(".adj-col-outer").each(function(){
    var hiCol = 0;
    jQuery(this).find("div.adj-col").each(function(){

      var h = jQuery(this).height();
      if(h > hiCol){
        hiCol = h; 
      }  
    });
    jQuery(this).find('.adj-col').height(hiCol);  
  });

// End of window.load
});



jQuery(window).on("resize",function(){  
  if(jQuery(window).width()<992) {
    jQuery(".home-h3").addClass("opacTrans-anim2");
  } else {
    jQuery(".home-h3").addClass("opacTrans-anim");
  }  

// End of window.resize  
})