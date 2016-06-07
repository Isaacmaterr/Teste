jQuery(document).ready(function($) {
	"use strict";
	
	var header = $('#cshero-header');
	
	var admin = $('#wpadminbar');
	
	var admin_h = 0;
	
	var header_h = 100;
	
	$(window).load(function() {
		
		admin_h = (admin != undefined) ? admin.height() : 0 ;
		cms_stiky_menu($(window).scrollTop());
	});
	
	$(window).scroll(function() {
		cms_stiky_menu($(window).scrollTop());
	});
	
	function cms_stiky_menu(scroll_top) {
		
		if (header_h <= scroll_top) {
			header.addClass('header-fixed');
			$('body').addClass('fixed-margin-top');
		} else {
			header.removeClass('header-fixed');
			$('body').removeClass('fixed-margin-top');
		}
	}
});
