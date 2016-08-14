(function($){

  $.fn.btnlogin = function() {
      if ($(window).width() < 396) {
        $(this).empty();
        $(this).append('<i class="sign in icon login-icon-fix"></i>');
      }else{
        $(this).empty();
        $(this).append('Se connecter');
      }
  };
  $(window).ready(function(){
    $('#btn-login').btnlogin();
  });
  $(window).on('resize', function(){
    $('#btn-login').btnlogin();
  });


$(window).scroll(function() {
    return $(window).scrollTop() > $('.topbar').height() ? $('.topbar').addClass("is-scrolled") : $('.topbar').removeClass("is-scrolled")
});

$("#q").on("focus", function() {
    return $("#topbar-search").addClass("focus")
});
$("#q").on("blur", function() {
    return $("#topbar-search").removeClass("focus")
});

// $(".topbar-logo").click(function(e) {
//     return e.preventDefault(), $(".topbar-menu").toggleClass("is-active")
// });



$.fn.alertfalsh = function() {
  return this.each(function() {
      var t;
      var $text = $(this).find(".flash_content").text().length;
      t = Math.ceil($text / 6), 4 > t && (t = 6)
      $(this).show().velocity({
        opacity: [1, 0],
        translateX: ["0", "-20px"],
      },
      {
          duration: t*100,
          complete: function() {
                  $(this).velocity({
                    opacity: [0, 1],
                    translateX: "10px",
                  },
                  {
                      delay: t*550,
                      duration: t*100,
                      complete: function() {
                        $(this).remove().delay(t)
                      }
                  })

            }
      });
  }
);
};
  $('.flash').alertfalsh();


})(jQuery);
