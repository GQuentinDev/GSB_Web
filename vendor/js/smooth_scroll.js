$(document).ready(function() {

	var headerHeight = $('.navbar').outerHeight();

	$('.dropdown-item').click(function(e) {
		var anchor = (this).hash.substring(0);

		$('html, body').animate({
			scrollTop: $(anchor).offset().top - headerHeight
		}, 1000);

		e.preventDefault();
	});

	$('.mouv').click(function(e) {
		var anchor = (this).hash.substring(0);

		$('html, body').animate({
			scrollTop: $(anchor).offset().top - headerHeight
		}, 1000);

		e.preventDefault();
	});

});