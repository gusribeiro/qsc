$(function() {
	$('.menu li').last().addClass('active');

	$('span.responsive_ico_menu, .menu li').click(function() {
		if ($('span.responsive_ico_menu').hasClass('active')) {
			$('.menu').animate({
				left: '-100%'
			}).height('auto');
		} else {
			var h = $(window).innerHeight() - $('.header').outerHeight(true);
			$('.menu').animate({
				left: 0
			}).height(h);
		}
		$('span.responsive_ico_menu').toggleClass('active');
	});
});