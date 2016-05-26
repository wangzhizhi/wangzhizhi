/*$(function(){
	$('.dropdown a').on('click', function(){
		$(this).next().toggle();
	});
});*/

;(function($){
	$.fn.extend({
		dropdown: function(options){
			var settings = {
				animate: false
			};
			settings = $.extend(settings, options);
			this.on('click', function(){
				if(settings.animate){
					$(this).next().slideToggle();
				}else{
					$(this).next().toggle();
				}
			});
		}
	});
})(jQuery);