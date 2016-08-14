$(function(a){return e=!1,a(".sidebar").hide(),a(".toggle-sidebar").click(function(b){return b.preventDefault(),a(".sidebar").show(0,function(){var b;return a("body").toggleClass("has-sidebar"),b=Snap.select("#wave-path"),b.attr("data-from",b.attr("d")),b.animate({d:b.attr("data-to")},350,mina.easeinout,function(){return e=!0})})}),a(".sidebar").click(function(a){return a.stopPropagation()}),a("body").click(function(){var b;return e?(a("body").toggleClass("has-sidebar"),b=Snap.select("#wave-path"),b.attr("d",b.attr("data-to")).animate({d:b.attr("data-from")},400,mina.easeinout,function(){return a(".sidebar").hide(),e=!1})):void 0})});
(function($){
$('.toggle-sidebar').click(function (e)
{
  e.preventDefault();
  e.stopPropagation()
  $('.topbar-menu').removeClass( "is-active" );
  if (test)
  {
      test = false;
      $('.cat-filter').velocity(
      {
          translateY: ["-10px", "0px"],
          opacity: [0, 1],
      }, {
          duration: 350,
          display: "none"
      })
  }
    });
  $('.topbar_icon').click(function (e)
  {
    e.preventDefault();
    e.stopPropagation()
    $('.topbar-menu').removeClass( "is-active" );
      });
  })(jQuery);
