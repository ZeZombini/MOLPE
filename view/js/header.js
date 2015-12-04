$(function(){ $(window).scroll(function () {
	 	if ($(this).scrollTop() >= 149) {
	 		$('header').addClass("fixHeader");
	 		// $('#header-top').addClass("hide");
	 		$('#header-top').attr('id', 'header-top-mini');
			$('#logo').attr('id', 'logo-mini');
			$('nav').addClass("nav-mini");

	 		// $("#logo-mini").attr('src', '../view/style/img/minilogo.png');

	 	} else{
	 		$('nav').removeClass("nav-mini");

	 		// $("#logo").attr('src', '../view/style/img/logo.png');

			$('#header-top-mini').attr('id', 'header-top');
	 		$('#logo-mini').attr('id', 'logo');
			// $('#header-top').removeClass("hide");
	 		$('header').removeClass("fixHeader");
	 	} }); });
