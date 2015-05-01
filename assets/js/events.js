$(document).ready(function(){
  var base_url = window.location.origin;
  $('.search').click(function(){
    var datas = $('select').val();

    $.ajax({
      type:'POST',
      url: base_url + "/events/search_events",
      data: 'datas='+ datas,
      dataType: "html"
    }).done(function(data){
          $(".events").html(data);
       });
  });

  $(".add-content .fa").hover(function(){
    $(".add-content .fa").css("color", "rgba(69, 187, 255, 0.8)");

    $(".add-content .fa").animate({
      'font-size': "5.5em"
    }, 100, function(){});
    $(".add-content p").css("color", "rgba(0, 0, 0, 0.4)");
    $("#circle").css("border-color", "rgba(0, 0, 0, 0.6)");
      angle = 10;
    $({deg: 0}).animate({deg: angle}, {
        duration: 100,
        step: function(now) {
            // in the step-callback (that is fired each step of the animation),
            // you can use the `now` paramter which contains the current
            // animation-position (`0` up to `angle`)
            $("#circle").css({
                transform: 'rotate(' + now + 'deg)'
            });
        }
    });
  },
  function(){
    $(".add-content .fa").css("color", "rgba(0, 0, 0, 0.3)");
    $(".add-content .fa").animate({
      'font-size': "5em"
    }, 100, function(){});
    $(".add-content p").css("color", "rgba(0, 0, 0, 0.2)");
    $("#circle").css("border-color", "rgba(0, 0, 0, 0.3)");
     $({deg: 0}).animate({deg: -angle}, {
        duration: 100,
        step: function(now) {
            // in the step-callback (that is fired each step of the animation),
            // you can use the `now` paramter which contains the current
            // animation-position (`0` up to `angle`)
            $("#circle").css({
                transform: 'rotate(' + now + 'deg)'
            });
        }
    });
  });
});