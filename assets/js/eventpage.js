$(document).ready(function(){
  var base_url = window.location.origin;

  $('#commentButton').click(function(){
    var comment = $('#comment').val();
    var id = $('#eventID').text();
    
    $.ajax({
      type:'POST',
      url: base_url + "/eventpage/add_comment",
      data: 'comment='+comment+'&id='+id,
      dataType: "html"
    }).done(function(data){
      $("#comments").html(data);
    });
  });
});