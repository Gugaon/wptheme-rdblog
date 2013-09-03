(function (){

	var StickyController ={
		scrollerTopOffset : null,
		scrollerHeight : null,
		scrollerTopMargin : null,
		footerTop : null,

		reset : function(){
			$banner = $(".sticky-banner");
			if (!$banner.size()) return;

			var resetPrevState = false;
			var prevState = {
				position : $banner.css('position'),
				top : $banner.css('top')
			};

			if (prevState.position == 'fixed'){
				$banner.css({ position: 'relative', top: ''});
				resetPrevState = true;
			}

			StickyController.scrollerTopOffset = $(".sticky-banner").offset().top;
			StickyController.scrollerHeight = $(".sticky-banner").height();
			StickyController.scrollerTopMargin = (StickyController.scrollerTopOffset) - 20;
			StickyController.footerTop = $('footer').offset().top;

			if (resetPrevState){
				$banner.css(prevState);
			}
		}
	}

	$(document).ready(StickyController.reset);
	$(window).resize(StickyController.reset);
	
	$(window).scroll(function(){
		if (!StickyController.scrollerTopOffset) return; //avoid processing invalid data

		var bodyScrollTop = $(window).scrollTop();
		var windowHeight = $(window).height();

		if (bodyScrollTop > StickyController.scrollerTopMargin ) {
			var top = 20;
			var diffFooter = StickyController.footerTop - bodyScrollTop - 20;
			if(diffFooter<StickyController.scrollerHeight){
				top -= StickyController.scrollerHeight-diffFooter;
			}
			$(".sticky-banner").css({ position: "fixed", top: top+"px" });
		}
		else if (bodyScrollTop <= StickyController.scrollerTopMargin) {
			$(".sticky-banner").css({ position: "relative", top: "" });
		}					

	});

})(jQuery);
