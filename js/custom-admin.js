jQuery(document).ready(function( $ ) {
	$('#woocommerce-ns-alert-popup-notice button.ns-notice-dismiss').click(function() {
		$.ajax({
			url : nsdismisswat.ajax_url,
			type : 'post',
			data : {
				action : 'ns_dismiss_ns_alert_popup_ajax'
			},
			success : function( response ) {
				$('#woocommerce-ns-alert-popup-notice').fadeOut();
			}
		});		
	});
	$('#wt_wcapb_color_layer').wpColorPicker();
	$('#wt_wcapb_color_content').wpColorPicker();
	$('#wt_wcapb_border_color').wpColorPicker();
});