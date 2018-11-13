$(document).ready(function(){
	var show_modal = $('.phone_text, .gallery .screen_slider .slide_description button, .index button'),
		modal = $('.consult_modal'),
		close_modal = $('.close_modal');
	$(modal).css({'opacity':'0','transform':'scale(0.1)','transition':'0.4s'});
	$(show_modal).click(function () {
		$(modal).removeClass('hide');
		setTimeout(function () {
			$(modal).animate({opacity: 1})
			$(modal).css('transform', 'scale(1)');
		}, 100)
	})
	$(close_modal).click(function(){
		$(modal).animate({opacity: 0}, function(){
			$(modal).addClass('hide');
			$(modal).css('transform', 'scale(0.1)');
		})
	});
});