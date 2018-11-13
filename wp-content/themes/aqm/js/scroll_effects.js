$('.index h1.animated, .index button.animated ').viewportChecker({classToAdd: 'fadeInUp'});
$('.index .variants ul').viewportChecker({
	classToAdd: '',
	callbackFunction: function(){
		$('.index .variants ul li.animated').css('opacity', '0');
		var delay = 100,
			count = 0;
		addClassToLi();
		function addClassToLi(){
			if (count < 6) {
				setTimeout(function(){
					$('.index .variants ul li.animated:eq(' + count + ')').addClass('fadeIn');
					count++;
					addClassToLi();
				}, delay += 100)
			}
		}
	}
});
$('.about_wrapper .animated').viewportChecker({classToAdd: 'fadeInUp'});
$('.services_wrapper h1.animated').viewportChecker({classToAdd: 'fadeIn'});
$('.services_wrapper .animated').viewportChecker({classToAdd: 'fadeInUp'});
$('.video').css('height', (($('.video').width() / 560) * 315) + 'px');