function throttle (func, interval) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function () {
        timeout = false;
      };
      if (!timeout) {
        func.apply(context, args)
        timeout = true;
        setTimeout(later, interval)
      }
    }
  }

  var myHeavyFunction = throttle(function() {
    // do heavy things
    jQuery("img.lazyload-img").each(function() {
        var $this = jQuery(this);
        var src = $this.attr("data-src");
        var srcset = $this.attr("data-srcset");
        var top_of_element = $this.offset().top;
        var bottom_of_element = $this.offset().top + $this.outerHeight();
        var bottom_of_screen = jQuery(window).scrollTop() + jQuery(window).innerHeight();
        var top_of_screen = jQuery(window).scrollTop();
    
        if ((bottom_of_screen > (top_of_element - 100)) && (top_of_screen < bottom_of_element)){
            console.log('test');
            $this.attr( "src", src );
            $this.attr( "srcset", srcset );
            $this.removeClass("lazy-img");
        }

    });
  }, 100);

  window.addEventListener('scroll', myHeavyFunction);