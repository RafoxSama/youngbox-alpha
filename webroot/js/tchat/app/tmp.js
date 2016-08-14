(function($){
var socket = io.connect('http://api.youngbox.dev:3003')
var data = {
      'appid' : 'IRHbzMo7McCS80c1OxG4t7qb7U',
      'token' : $('.container-tchat').attr("data-token"),
      'uid'   : '1',
}

$(".input-tchat").emojioneArea({autocomplete: false, shortnames: true, shortcuts: true, filtersPosition: "bottom", tonesStyle: "radio"});

$('emojionearea-editor').html(emojione.shortnameToImage($(".input-tchat").value));



socket.emit('login', data);


socket.on('updatechat', function(rooms, username, data) {
  $('.salons-list').empty();
  $.each(rooms, function(i) {
    // console.log(rooms[i].name);
    if (rooms[i].default == 1) {
      $('.salons-list').append('<div data-active="1" data-room="' + rooms[i].name + '" class="salon active"><span class="' + rooms[i].icon + '"></span><span class="salon-text">#' + rooms[i].name + '</span></div>');
    }else {
      $('.salons-list').append('<div data-active="0" data-room="' + rooms[i].name + '" class="salon"><span class="' + rooms[i].icon + '"></span><span class="salon-text">#' + rooms[i].name + '</span></div>');
    }


  });

  function switchRoom(room) {
  socket.emit('switchRoom', room);
}

  // when the client clicks SEND
  $('.salon').click(function() {
    var room = $(this).attr("data-room")
    var active = $(this).attr("data-active")
    if (active == 1) {
      return false
    }else{
      switchRoom(room);
      $('.active').attr('data-active', 0)
      $('.active').removeClass( 'active' )
      $(this).addClass('active')
      $(this).attr('data-active', 1)
    }
    // tell the server to execute 'sendchat' and send along one parameter
  });




  // console.log(rooms);
  // console.log(username);
  // console.log(data);
});




})(jQuery);
