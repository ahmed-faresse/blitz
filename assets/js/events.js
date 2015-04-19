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
});