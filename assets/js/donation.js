$(document).ready(function(){
	$('input[type="range"]').rangeslider({
            polyfill: false,

            onInit: function() {
            },

            onSlide: function(position, value) {
                if (isNaN(value))
            	   $('label[for="amount"]').text("Amount : $" + 0 + " (Fully Paid)");
                else
                   $('label[for="amount"]').text("Amount : $" + value);
            },
            
            onSlideEnd: function(position, value) {
                if (isNaN(value))
                   $('label[for="amount"]').text("Amount : $" + 0 + " (Fully Paid)");
                else
                   $('label[for="amount"]').text("Amount : $" + value);
            }
	});
});