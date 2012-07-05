function sizer(elem, h) {
	if (window.innerWidth <= 768) {
		//$('.' + elem).css('min-height', '100%');
		var spacer_height = (window_height * .25);
		$('.' + elem).css('max-height', spacer_height + 'px');
	}else {
		var window_height = window.innerHeight;
   		var spacer_height = (window_height * h);
   		$('.' + elem).css('min-height', spacer_height + 'px');
	}
}
