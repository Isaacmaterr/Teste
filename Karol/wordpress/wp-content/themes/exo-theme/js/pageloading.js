(function($) { "use strict";
jQuery(document).ready(function ($) {
    var pageloaded = function(){
        var $loader = $('#cs_loader'),
        $wrapper = $('#wrapper');
        var $parallax = $('.tp-parallax-container');
        $wrapper.removeClass('cs_hidden');
        //$parallax.addClass('slider-fix-parallax');
        $loader.css({
            position: 'relative'
        });
        $parallax.css({
            transform: 'matrix(1, 0, 0, 1, 0, 52)'
        });
        setTimeout(function () {
            $loader.css({
                'height': '0',
                'visibility': 'hidden'
            });
            $parallax.css({
                transform: 'inherit'
            });
            //$parallax.removeClass('slider-fix-parallax');
        }, 10);
    }
    
    /**
     * loading %.
     */
    var process = 0;
    var process_timer = setInterval(function(){
    	$('#cs_loader_process').html(process + ' %');
    	process++;
    	if(process == 99){
    		clearInterval(process_timer);
    		process = 0;
    	}
    },100);
    
    $(window).bind('load', function () {
        pageloaded();
    });
    
    setTimeout(function(){
        pageloaded();
        clearInterval(process_timer);
        $('#cs_loader_process').html('100 %');
    },10000);
});
})(jQuery);
