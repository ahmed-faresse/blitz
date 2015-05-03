$(function(){

	$('.sound').on('click', ".glyphicon-volume-up", function(){
		$('#video').prop('muted', true);
		$('.glyphicon-volume-up').toggleClass('glyphicon-volume-off', true);
		$('.glyphicon-volume-off').toggleClass('glyphicon-volume-up', false);
	});

	$('.sound').on('click', ".glyphicon-volume-off", function(){
		$('#video').prop('muted', false);
		$('.glyphicon-volume-off').toggleClass('glyphicon-volume-up', true);
		$('.glyphicon-volume-up').toggleClass('glyphicon-volume-off', false);
	});

	$('.lecture').on('click', ".glyphicon-pause", function(){
		$('#video').get(0).pause();
		$('.glyphicon-pause').toggleClass('glyphicon-play', true);
		$('.glyphicon-play').toggleClass('glyphicon-pause', false);
	});

	$('.lecture').on('click', ".glyphicon-play", function(){
		if ($('#video').get(0).paused)
		{
			$('#video').get(0).play();
			$('.glyphicon-play').toggleClass('glyphicon-pause', true);
			$('.glyphicon-pause').toggleClass('glyphicon-play', false);
		}
	});
});