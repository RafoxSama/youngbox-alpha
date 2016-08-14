(function($){
  $.fn.timeago = function() {
    return this.each(function() {
      var $datetime = $(this).attr("data-datetime");
      moment.locale('fr');
      var $tmp = moment($datetime).format();
      var $final = moment($tmp).fromNow();
      $(this).append($final);
    });
  };

  $.fn.timedate = function() {
    return this.each(function() {
      var $date = $(this).attr("data-date");
      moment.locale('fr');
      var $tmp = moment($date).format();
      var $final = moment($tmp).format('DD MMM YYYY');
      $(this).append($final);
    });
  };

  $('.tweet_date').timeago();
    $('.lastMessagetime').timeago();
    $('.post-date').timeago();
    $('.last-topictime').timeago();

  $('.news-date').timedate();


  })(jQuery);
