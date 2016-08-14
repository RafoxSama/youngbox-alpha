(function($){
  var $editor = $('#postBox').attr("data-editor");
  if ($editor == "1") {
    var simplemde = new SimpleMDE({ element: $("#postBox")[0], status: false, promptURLs: true, hideIcons: ["guide"]});
  }
})(jQuery);
