$(document).ready(function(){

	$(".panel-heading-account").on("click", function(){
		var item = $(this).next(".panel-body");
		if (item.hasClass('panel-body')) 
		{
	      	if (item.is(":hidden"))
	      		item.slideDown(500);
	      	else
	      	   	item.slideUp(500);	
     	}
	});
});