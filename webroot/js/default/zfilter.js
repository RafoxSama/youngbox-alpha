(function($){
$(function (t)
{
    test = false;
    t('.cat-filter-btn').click(function (e)
    {
        e.preventDefault();
        e.stopPropagation();
        t('.topbar-menu').removeClass( "is-active" );
        if (!test)
        {
            test = true;
            t('.cat-filter').velocity(
            {
                translateY: ["0px", "-10px"],
                opacity: [1, 0],
            }, {
                duration: 350,
                display: "block"
            })
        }
        else if (test)
        {
            test = false;
            t('.cat-filter').velocity(
            {
                translateY: ["-10px", "0px"],
                opacity: [0, 1],
            }, {
                duration: 350,
                display: "none"
            })
        }
    });




    t('body').click(function (e)
    {

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
    }).on('click', '.topbar_icon', function(e) {
        e.preventDefault();
        e.stopPropagation()
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
      })



    t('.cat-filter').click(function (e)
    {
        e.stopPropagation()
    })
})

})(jQuery);
