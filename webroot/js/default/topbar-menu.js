;(function ($) {

  (function(factory) {
      if (typeof define === 'function' && define.amd) {
          define(['jquery', 'hammerjs'], factory);
      } else if (typeof exports === 'object') {
          factory(require('jquery'), require('hammerjs'));
      } else {
          factory(jQuery, Hammer);
      }
  }(function($, Hammer) {
      function hammerify(el, options) {
          var $el = $(el);
          if(!$el.data("hammer")) {
              $el.data("hammer", new Hammer($el[0], options));
          }
      }

      $.fn.hammer = function(options) {
          return this.each(function() {
              hammerify(this, options);
          });
      };

      // extend the emit method to also trigger jQuery events
      Hammer.Manager.prototype.emit = (function(originalEmit) {
          return function(type, data) {
              originalEmit.call(this, type, data);
              $(this.element).trigger({
                  type: type,
                  gesture: data
              });
          };
      })(Hammer.Manager.prototype.emit);
  }));


  var topbarmenu = true
  var $body = $('body');
  $('.topbar-logo').click(function (e) {
    if (topbarmenu) {
      topbarmenu = false
      $('.topbar-menu').addClass('is-active')
    }else {
      $('.topbar-menu').removeClass('is-active')
      topbarmenu = true
    }
    return e.preventDefault()
  })




      $('body').hammer().on('swiperight', function(e){
        if (topbarmenu) {
          topbarmenu = false
          $('.topbar-menu').addClass('is-active')
        }

      })
      $('body').hammer().on('swipeleft', function(e){
        if (!(topbarmenu)) {
          topbarmenu = true
          $('.topbar-menu').removeClass('is-active')
        }

  });



})(jQuery)
