$(document).ready(function() {
	var menu = $('.menu_button');
	var nav = $('.main_nav');
	var close = $('.hide_menu');

	$(menu).click(function() {
		$(nav).removeClass('hide');
	})

	$(close).click(function() {
		$(nav).addClass('hide');
	})
});