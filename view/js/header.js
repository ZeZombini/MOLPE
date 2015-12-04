$(function(){ $(window).scroll(function () {
	 	if ($(this).scrollTop() >= 149) {
	 		$('header').addClass("fixHeader");
	 		$('#header-top').addClass("hide");
			$('#logo').attr('id', 'logo-mini');
			$('nav').addClass("nav-mini");

	 		$("#logo-mini").attr('src', '../view/style/img/minilogo.png');

	 	} else{
	 		$('nav').removeClass("nav-mini");

	 		$("#logo").attr('src', '../view/style/img/logo.png');


	 		$('#logo-mini').attr('id', 'logo');
			$('#header-top').removeClass("hide");
	 		$('header').removeClass("fixHeader");
	 	} }); });
