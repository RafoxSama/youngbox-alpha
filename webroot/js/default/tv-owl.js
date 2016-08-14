(function($){



    var carousel = $('.tv-owl-carousel');

   carousel.owlCarousel({
    loop:true,
    nav : true,
    dots: false,
    touchDrag: false,
    mouseDrag: false,
    navText: ["<i class='angle double left icon'></i>","<i class='angle double right icon'></i>"],
    center:true,
    responsive:{
       0:{ //from 0 px
           items:1 //how many items per device width
       },
       600:{ //from 600
           items:2
       },
       1000:{
           items:3
       }
     }
    });





})(jQuery);
