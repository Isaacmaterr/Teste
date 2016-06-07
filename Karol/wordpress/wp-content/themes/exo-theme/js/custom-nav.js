jQuery(document).ready(function($) {
	"use strict";
		
	$('body').on('click', '.onepage', function () {
		//$('#cshero-menu-mobile').removeClass('close-open');
		//$('#cshero-header-navigation').removeClass('open-menu');
		//$('.cshero-menu-close').removeClass('open');
	});
	
	var one_page_options = {'filter' : '.onepage'};
	
	if(one_page.scrollSpeed != undefined) one_page_options.speed = parseInt(one_page.scrollSpeed);
	
	if(one_page.easing != undefined) one_page_options.easing =  one_page.easing;
	
	$('body').singlePageNav(one_page_options);
	
	
	/**  */
	$('.slider-scroll').singlePageNav({'speed':'1000'});

	$('.header-wrapper').onePageNav({
		currentClass:'current-menu-item',
		easing: one_page.easing,
		scrollSpeed: parseInt(one_page.scrollSpeed),
		scrollOffset: parseInt(one_page.scrollOffset),
		changeHash: false
	});
	
});
