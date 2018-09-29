  /**
   * document.ready
   * 
   * 0. Generic functions
   * 5. Owl Carousel slider
   * 6. Products section add class to .item
   * 7. CPT increment ID + add active class
   * 8. Add active class to home products tabs
   * 9. Home parallex background effect
   * 
   * 
   * window.load
   * 
   * 1. Pages anim 
   * 2. Set equal height to divs
   * 
   * 
   * window.resize + scoll
   * 
   * 1. CPT scrolling active divs
   * 2. Sticky heder
   */

  
jQuery(document).ready(function(){

  var mousewheelevt=(/Firefox/i.test(navigator.userAgent))? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x
  var secWithSlider = {};
  var currNum = 0;
  var scroll = jQuery(window).scrollTop();


  /**
   * 0. Generic functions
   */
  // Create object with section IDs as keys
  jQuery('.section-slider').each(function () {
    secWithSlider[this.id] = 0;
  });
  // Scrolling
  jQuery.fn.isFullyInViewport = function() {
    var elementTop = (jQuery(this).offset().top) + 300;
    var elementBottom = elementTop + jQuery(this).outerHeight() / 4;
  
    var viewportTop = jQuery(window).scrollTop();
    var viewportBottom = viewportTop + jQuery(window).height();
  
    return elementTop >= viewportTop && elementBottom <= viewportBottom;
  };




/**
 * 5. Owl Carousel slider
*/

    var payDiv = jQuery("#pay-gateways"),
    blogDiv = jQuery("#events"),
    numDiv = jQuery("#numbers");

    payDiv.owlCarousel({
        loop:true,
        margin:10,
        dots: false,
        responsiveClass:true,
        autoplay:true,
        autoplayTimeout:1700,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:5,
                nav:true
            }
        }
    });
    numDiv.owlCarousel({
      loop:true,
      margin:10,
      dots: false,
      responsiveClass:true,
      autoplay:true,
      autoplayTimeout:1700,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1,
              nav:false
          },
          600:{
              items:3,
              nav:true
          }
      }
  });
  blogDiv.owlCarousel({
    loop:true,
    margin:10,
    dots: false,
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:3700,
    autoplayHoverPause:true,
    items: 1
});
    jQuery(".next").click(function(){ owl.trigger('owl.next'); });
    jQuery(".prev").click(function(){ owl.trigger('owl.prev'); });
  
    
  // slider controls hover opacity
  jQuery('.section-slider').mouseover(function(e){
    e.stopPropagation();
    jQuery(this).find('.owl-nav').css({opacity: '1'});
  });
  jQuery('.section-slider').mouseout(function(e){
    e.stopPropagation();
    jQuery(this).find('.owl-nav').css({opacity: '0.3'});
  })



  /**
   * 6. Products section add class to .item
   */
  jQuery("#products > .item:nth-child(odd)").find("div.featured-img").addClass("col-md-push-5").siblings(".excerpt").addClass("col-md-pull-7");



/**
 * 7. CPT increment ID + add active class
 */

if (jQuery('.cpt-outer').length) {
  var i = 0,
  cptOuter = jQuery('.cpt-outer');
  
  cptOuter.each(function(){
      i++;
      var newID='cpt'+i;
      jQuery(this).attr('id',newID);
      jQuery(this).val(i);
  });
  cptOuter.first().addClass('active');

}



/**
 * 8. Add active class to home products tabs
 */
jQuery('#products').find('.tab-pane.fade').first().addClass('active in');




/**
 * 9. Home parallex background effect
 */
function homeParallexEffect() {
  var body = document.body,
          e = document.documentElement,
          scrollPercent;
  jQuery(window).scroll(function () {
      scrollPercent = 500 * jQuery(window).scrollTop() / (jQuery(document).height() - jQuery(window).height());
      jQuery('#top').css('background-position' , "0px " + scrollPercent + "%" );
  });
}
if (jQuery('body.home').length) {
  homeParallexEffect();
}

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



jQuery(window).on('resize scroll', function() {

  var scroll = jQuery(window).scrollTop();

  /* 1. CPT scrolling active divs */
  jQuery('.cpt-outer').each(function() {
      var activeColor = jQuery(this).attr('id');
    if (jQuery(this).isFullyInViewport()) {
      jQuery('#' + activeColor).addClass('active');
    } else {
      jQuery('#' + activeColor).removeClass('active');
    }
  });

  
  
  /* 2. Sticky heder */
  var header = jQuery('#header');

  if (scroll >= 100) header.addClass('fixed');
  else header.removeClass('fixed');


// End of window.resize + scroll 
});