$(function(){ $(window).scroll(function () {
	 	if ($(this).scrollTop() >= 149) {
	 		$('header').addClass("fixHeader");
	 		$('#header-top').attr('id', 'header-top-mini');
			$('#logo').attr('id', 'logo-mini');
			$('nav').addClass("nav-mini");
	 	} else{
	 		$('nav').removeClass("nav-mini");
			$('#header-top-mini').attr('id', 'header-top');
	 		$('#logo-mini').attr('id', 'logo');
	 		$('header').removeClass("fixHeader");
	 	} }); });
