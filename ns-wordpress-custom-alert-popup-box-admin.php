<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function ns_wcapb_options_group() {
    register_setting('ns_wcapb_free_options', 'ns_wcapb_text');
    register_setting('ns_wcapb_free_options', 'ns_wcapb_delay');
    register_setting('ns_wcapb_free_options', 'ns_wcapb_test_mode');
    register_setting('ns_wcapb_free_options', 'wt_wcapb_color_layer');
    register_setting('ns_wcapb_free_options', 'wt_wcapb_opacity_layer');
    register_setting('ns_wcapb_free_options', 'wt_wcapb_color_content');
    register_setting('ns_wcapb_free_options', 'wt_wcapb_border_size');
    register_setting('ns_wcapb_free_options', 'wt_wcapb_border_color');
    register_setting('ns_wcapb_free_options', 'wt_wcapb_padding');
	register_setting('ns_wcapb_free_options', 'ns_wcapb_test_mode_premium');
	
	// Write Custom CSS
	$ns_file = NS_LAYER_COOKIE_PLUGIN_DIR .'/css/ns-custom-alert.css';
	$myfile = fopen($ns_file, "w") or die("Unable to open file!");
	$wt_wcapb_opacity_layer = (get_option('wt_wcapb_opacity_layer') != '') ? get_option('wt_wcapb_opacity_layer') : 1;
	$wt_wcapb_color_layer = (get_option('wt_wcapb_color_layer') != '') ? hex2rgba(get_option('wt_wcapb_color_layer'), $wt_wcapb_opacity_layer) : hex2rgba('#0000ff', $wt_wcapb_opacity_layer);
	$wt_wcapb_color_content = (get_option('wt_wcapb_color_content') != '') ? hex2rgba(get_option('wt_wcapb_color_content'), 1) : hex2rgba('#0000ff', 1);
	$wt_repeat = get_option('ns_wcapb_test_mode_premium');
	
	$wt_wcapb_border_size = (get_option('wt_wcapb_border_size') != '') ? get_option('wt_wcapb_border_size') : 'none';
	$wt_wcapb_border_color = (get_option('wt_wcapb_border_color') != '') ? get_option('wt_wcapb_border_color') : '#000000';
	$wt_wcapb_padding = (get_option('wt_wcapb_padding') != '') ? get_option('wt_wcapb_padding') : 10;
	
	$txt = '#ns-custom-layer-box {
		display: none;
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		z-index: 999;
		background: '.$wt_wcapb_color_layer.';
	}
	#ns-wcapb-container {
		
		position: relative;
		max-height: 500px;
		
		border-radius: 5px;
		overflow-y: auto;
		

	}
	#ns-wcapb-container2 {
		display: none;
		position: absolute;
		padding: '.$wt_wcapb_padding.'px;
		background: '.$wt_wcapb_color_content.';
		border-width: '.$wt_wcapb_border_size.'px;
		border-color: '.$wt_wcapb_border_color.';
		border-style: solid;
		color: #000;
		z-index: 9999;
		max-width: 75%;
		min-width: 400px;
		min-height: 200px;
		max-height: 90%;
		border-radius: 5px;
		

	}
	#ns-apb-close {
		border-radius: 50px;
		padding: 0 8px;
		float: right;
		margin-top: -26px;
		margin-right: -26px;
		background: #fff;
		cursor: pointer;
		font-weight: bold;
		z-index: 1000;
	}
	.ns-stop-scrolling{
		overflow: hidden;
	}
	@media (max-width: 1024px) {
		#ns-wcapb-container {
			min-width: auto;
			height: fit-content;
		}
		.ns_mp_single_product {
			width: calc(100% - 30px);
			align-content: center;
			margin-bottom: 30px;
		}
		.ns_mp_sp_img {
			width: 50%;
			margin-left: 25%;
			margin-right: 25%;
		}
		.ns_mp_text, .ns_mp_sp_price, .ns_mp_sp_title{
			text-align: center;
		}
	}
	@media (max-width: 768px) {
		
		#ns-wcapb-container2 {
			
			width: 90%;
			min-width: 100px;
			min-height: 200px;
			max-height: 90%;
			border-radius: 5px;
		}
		#ns-wcapb-container {
			max-height: 300px;
		}
	}
	';
	fwrite($myfile, $txt);
	fclose($myfile);
}
 
add_action ('admin_init', 'ns_wcapb_options_group');



function ns_wcapb_update_options_form() {
	$wt_repeat = get_option('ns_wcapb_text');
	$wt_repeat = get_option('ns_wcapb_delay');
	$wt_repeat = get_option('ns_wcapb_test_mode');
	$wt_repeat = get_option('wt_wcapb_color_layer');
	$wt_repeat = get_option('wt_wcapb_opacity_layer');
	$wt_repeat = get_option('wt_wcapb_color_content');
	$wt_repeat = get_option('wt_wcapb_border_size');
	$wt_repeat = get_option('wt_wcapb_border_color');
	$wt_repeat = get_option('wt_wcapb_padding');
	
	$ns_text_domain = 'alert-popup-box';
	$ns_url_theme_promo = 'https://www.nsthemes.com/join-the-club/';	

}

function hex2rgba($hex, $alpha) {
   $hex = str_replace("#", "", $hex);
   $alpha = str_replace(",", ".", $alpha);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgba = 'rgba('.$r.', '.$g.', '.$b.', '.$alpha.')';
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgba; // returns an array with the rgb values
}

require_once( plugin_dir_path( __FILE__ ).'ns-admin-options/ns-admin-options-setup.php');
?>