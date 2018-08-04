jQuery(document).ready(function(){
  var homeArticle = jQuery('.home-articles');
  var numOfArticles = homeArticle.length;
  var currNum = 0;


  /*
  * 1. Home post pagination
  */
   // Add class to first home post
   jQuery(homeArticle).first().addClass("visible-article");

  // Next article function
  function nextArticle() {
    if(currNum < (numOfArticles-1)) {
      jQuery(".visible-article").stop().fadeOut(function() {

        jQuery(".home-h3").removeClass("opacTrans-anim");
        jQuery(".article-excerpt").removeClass("opac-anim");

        jQuery(this).next(".home-articles").addClass("visible-article").fadeIn(function(){
          jQuery(this).find("h3").addClass("opacTrans-anim");
          jQuery(this).find(".article-excerpt").addClass("opac-anim");

        }).prev().removeClass("visible-article");
        currNum ++;
      });
    } else {
      jQuery(".visible-article").stop().fadeOut(function() {
        jQuery(this).removeClass("visible-article");
        jQuery(homeArticle).first().addClass("visible-article").fadeIn(function(){
          jQuery(this).find("h3").addClass("opacTrans-anim");
          jQuery(this).find(".article-excerpt").addClass("opac-anim");
        });
        currNum = 0;
      });
    }
}
  // Previous article function
  function prevArticle() {
    if(currNum > 0) {

      jQuery(".visible-article").stop().fadeOut(function() {

        jQuery(".home-h3").removeClass("opacTrans-anim");
        jQuery(".article-excerpt").removeClass("opac-anim");

        jQuery(this).prev(".home-articles").addClass("visible-article").fadeIn(function(){
          jQuery(this).find("h3").addClass("opacTrans-anim");
          jQuery(this).find(".article-excerpt").addClass("opac-anim");

        }).next().removeClass("visible-article");
        currNum --;

        
      });

    } else {

      jQuery(".visible-article").stop().fadeOut(function() {

        jQuery(".home-h3").removeClass("opacTrans-anim");
        jQuery(".article-excerpt").removeClass("opac-anim");
        
        jQuery(this).removeClass("visible-article");
        jQuery(homeArticle).last().addClass("visible-article").fadeIn(function(){
          jQuery(this).find("h3").addClass("opacTrans-anim");
          jQuery(this).find(".article-excerpt").addClass("opac-anim");
        });
        currNum = numOfArticles-1;

      });
      
    }

}

   // Scrolling function call
   if(jQuery('body.home').length) {
    jQuery(function(){
      var mousewheelevt=(/Firefox/i.test(navigator.userAgent))? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x
      jQuery(window).on(mousewheelevt, function(event) {
        if (event.originalEvent.wheelDelta >= 0) {
             prevArticle();
          }
          else {
             nextArticle();
          }
      });
    });
  
   }


   // Next/Prev Buttons function call
   if(jQuery('body.home').length) {
    jQuery(".next-article").click(function () {
      nextArticle();
    });
    jQuery(".prev-article").click(function () {
      prevArticle();
    });
  }

  
  /*
  * 2. Menu animations
  */
 var numOfLi = jQuery('#menu-main > li').length;
 var count = 100;
 jQuery('.menu-button').toggle(function() {

  jQuery('#main-nav-outer').fadeIn(200,function(){
    jQuery('#main-nav-outer > nav').hide().fadeIn(200, function(){
      for (i = 1; i <= numOfLi; i++) {
        var padding = parseInt(jQuery('#menu-main > li:nth-of-type(' + i +') > a').css("padding-left").replace("px",""));
        jQuery('#menu-main > li:nth-child(' + i +') > a').css({"padding-left": (padding += count), "left": "0"});
        count += 100;
      }
    });

      jQuery('#main-nav-outer #search img').show().animate({ marginTop: '-65%', opacity: 1 }, 1000);
  });
  jQuery(this).fadeOut(500, function() {
    jQuery(this).html("CLOSE").fadeIn(500);
});
}, function(){

  for (i = 1; i <= numOfLi; i++) {
    jQuery('#menu-main > li > a').css({"padding-left": "30px", "left": "-300px"});
  }
  jQuery('#main-nav-outer #search img').animate({ marginTop: '165%' , opacity: 0 }, 1000);

  setTimeout(function(){
    jQuery('#main-nav-outer #search img').hide();
  }, 700);

  jQuery('#main-nav-outer').delay(400).fadeOut(300);

  jQuery(this).fadeOut(500, function() {
    jQuery(this).html("MENU").fadeIn(500);
});

  count = 100;

});


/**
 * 3. Games info slider
 */
jQuery(".game-single, .fl-game").mouseover(function(){
  jQuery(this).children( ".game-info" ).css({
    transform: "translate(0)",
  })
})
jQuery(".game-single, .fl-game").mouseout(function(){
  jQuery(this).children( ".game-info" ).css({
    transform: "translate(0 , 300px)",
  })
})


});


jQuery(window).load(function(){

  /**
 * 4. Pages anim 
 */
  jQuery("Layer_1 , #circle , #right-box , #striped-box  , #imgs , #left-box , .post-content , .home-h3").addClass("opacTrans-anim");
  jQuery(".article-excerpt , .post-outer").addClass("opac-anim");
  jQuery(".post-head > h1").addClass("pageTitle-anim");

})

