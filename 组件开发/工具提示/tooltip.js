;(function($){
	$.fn.extend({
		tooltip: function(){
			var $tooltip = $('<div id="tooltip"></div>');
			this.hover(function(e){
				if(this.title){
					$tooltip.html(this.title)
							.css({
								left: e.pageX + 10,
								top: e.pageY + 20 
							})
							.appendTo(document.body);
					this.title = "";
				}
			}, function(){
				this.title = $tooltip.html();
				$tooltip.empty().remove();
			}).on('mousemove', function(e){
				$tooltip.css({
					left: e.pageX + 10,
					top: e.pageY + 20
				});
			});
		}
	});
})(jQuery);