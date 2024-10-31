jQuery(window).resize(nsAdjustLayout);

function nsAdjustLayout(){
   jQuery('#ns-wcapb-container2').css({
	   position:'fixed',
	   left: (jQuery(window).width() - jQuery('#ns-wcapb-container2').outerWidth())/2,
	   top: (jQuery(window).height() - jQuery('#ns-wcapb-container2').outerHeight())/2
   });

}

jQuery(document).ready(function( $ ) {
	
	nsAdjustLayout();
	
	$('#ns-custom-layer-box').click(function() {
		$('#ns-custom-layer-box').fadeOut();
		$('#ns-wcapb-container2').fadeOut();
		$('html').removeClass('ns-stop-scrolling');
	});
	$('#ns-apb-close').click(function() {
		$('#ns-custom-layer-box').fadeOut();
		$('#ns-wcapb-container2').fadeOut();
		$('html').removeClass('ns-stop-scrolling');

	});
	$('#ns-wcapb-container').click(function() {
		
	});

});
