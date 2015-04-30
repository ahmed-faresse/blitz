$(document).ready(function(){
		var url = document.URL;
		$('#footer a').attr("href", "https://validator.w3.org/check?uri=" + url);
});