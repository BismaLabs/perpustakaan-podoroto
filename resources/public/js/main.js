(function($) {

	'use strict';

	$(document).ready(function(){

		// SUBMENU ARROW
		$('.site-navigation li:has(ul)').addClass('has-child');

		// TESTIMONIAL PAGE
		$('#masonry').masonry({
			columnWidth: 585,
			itemSelector:'.tbox'
		});

		// EQUAL HEIGHT
		function equalHeight(group) {
			var tallest = 0;
			group.each(function() {
				var thisHeight = $(this).height();
				if(thisHeight > tallest) {
					tallest = thisHeight;
				}
			});
			group.height(tallest);
		}
		
		equalHeight($(".service-col"));

	});

	$(window).height(function(){
		$('.onscreen, .slides li').css('height', window.innerHeight - 84);
	});

	$(window).load(function(){

		// FLEXSLIDER METHOD
		$('.flexslider').flexslider({
		    animation: "fade",
		    controlNav: false
		});

		$('.service-flexslider').flexslider({
		    animation: "fade",
		    controlNav: "thumbnails"
		});

		// MENU ON SCROLL
		$(window).scroll(function () {
			var $this = $(this);
			if ($this.scrollTop() > 240) {
				$('body').addClass('on-scroll');
			} else if($this.scrollTop() < 240){
				$('body').removeClass('on-scroll');
			}
			delete $this.this;
		});
	});

})( jQuery );
