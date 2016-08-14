(function($){
$(".LikePost-btn").bind("click", function () {
      var like = $(this),
          type = like.attr("data-type"),
          id = like.attr("data-id");
          likes = like.attr("data-like-count");

      $.ajax({
          type    : "POST",
          url     : like.attr("data-url"),
          data : {
              id : id,
              type : type
          },
          dataType: "json",
          success : function (data) {
              if (!data.error) {

                  if (type === 'like') {

                      like.addClass('active');
                      like.attr("data-url", data.url);
                      like.attr("data-type", "unlike");
                      $(".likeCounter-" + id + "-text").text(Number(likes) + 1);
                      like.attr("data-like-count", Number(likes) + 1);


                  } else if (type === "unlike") {

                      like.removeClass('active');

                      like.attr("data-url", data.url);
                      like.attr("data-type", "like");
                      $(".likeCounter-" + id + "-text").text(Number(likes) - 1);
                      like.attr("data-like-count", Number(likes) - 1);


                  }

              }
          },
          error   : function () {

          }
      });
      return false;
  });




















})(jQuery);
