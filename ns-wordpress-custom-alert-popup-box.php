<?php
/*
Plugin Name: NS WordPress Custom Alert Popup Box
Plugin URI: https://wordpress.org/plugins/ns-custom-alert-popup-box/
Description: Create a Layer the first access to site
Version: 1.7.3
Author: NsThemes
Author URI: http://nsthemes.com
Text Domain: ns-custom-alert-popup-box
Domain Path: /languages
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-custom-alert-popup-box',
    'main_file_name'            => 'ns-wordpress-custom-alert-popup-box.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-custom-alert-popup-box%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '239',
    'plugin_token'              => 'NWNmZjliYjliZDQ4ZGZlYTBjMTViZmQxOTlmZGQ2NDJjOWRmNDc5ODlkZjM3YzA4OWNhZDI3ZTgzYWVjYWNlZGZlZmUzNjlhOTM4ODE=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj239 = new pluginEye($plugineye);
$plugineyeobj239->pluginEyeStart();      


if ( ! defined( 'NS_LAYER_COOKIE_PLUGIN_DIR' ) )
    define( 'NS_LAYER_COOKIE_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );

if ( ! defined( 'NS_LAYER_COOKIE_PLUGIN_URL' ) )
    define( 'NS_LAYER_COOKIE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


setcookie('first_access_my_user', 1, time() + (86400), "/"); // (86400 * 30) 86400 = 1 day


/* *** include css admin *** */
function ns_wcapb_css_admin( $hook ) {
	wp_enqueue_style('ns-wcapb-style-admin', NS_LAYER_COOKIE_PLUGIN_URL . '/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'ns_wcapb_css_admin' );

/* *** include js admin *** */
function ns_wcapb_js_admin( $hook ) {
	wp_enqueue_script('ns-custom-admin-script-wcapb', NS_LAYER_COOKIE_PLUGIN_URL . '/js/custom-admin.js', array('jquery', 'wp-color-picker'));
}

add_action( 'admin_enqueue_scripts', 'ns_wcapb_js_admin' );

/* *** include css *** */
function ns_wcapb_css( $hook ) {
	wp_enqueue_style('ns-wcapb-style-single-product', NS_LAYER_COOKIE_PLUGIN_URL . '/css/ns-custom-alert.css');
}

add_action( 'wp_enqueue_scripts', 'ns_wcapb_css' );

/* *** include js *** */
function ns_wcapb_js( $hook ) {
	wp_enqueue_script('ns-custom-script', NS_LAYER_COOKIE_PLUGIN_URL . '/js/custom.js', array('jquery', 'jquery-ui-core'));
}

function ns_wcapb_js_inline () {
	 ?>
    <script>
		jQuery(document).ready(function( $ ) {
			$('#ns-custom-layer-box').delay(<?php echo get_option('ns_wcapb_delay'); ?>).fadeIn();
			$('#ns-wcapb-container2').delay(<?php echo get_option('ns_wcapb_delay'); ?>).fadeIn();
			$('html').addClass('ns-stop-scrolling');
		});
	</script>
	<?php
}

if (!isset($_COOKIE['first_access_my_user']) OR get_option('ns_wcapb_test_mode')) {
	// First access
	add_action( 'wp_enqueue_scripts', 'ns_wcapb_js' );
	add_action('wp_head', 'ns_wcapb_js_inline');
} else {
	// Other access
}

/* *** include admin option *** */
require_once( NS_LAYER_COOKIE_PLUGIN_DIR.'/ns-wordpress-custom-alert-popup-box-admin.php');

function ns_wcapb_default_options() {
    add_option('ns_wcapb_text', 'Hello Word!');
    add_option('ns_wcapb_delay', 0);
    add_option('ns_wcapb_test_mode', 'on');
    add_option('wt_wcapb_color_layer', '#000000');
    add_option('wt_wcapb_opacity_layer', '1');
    add_option('wt_wcapb_color_content', '#ffffff');
    add_option('wt_wcapb_border_size', '10');
    add_option('wt_wcapb_border_color', '#ffffff');
    add_option('wt_wcapb_padding', '10');
	add_option('ns_wcapb_test_mode_premium', 'on');
}
 
register_activation_hook( __FILE__, 'ns_wcapb_default_options');

function ns_wcapb_free_layer(){
	// echo '<div id="ns-custom-layer-box"></div><div id="ns-wcapb-container"><div id="ns-apb-close">X</div>'.do_shortcode(get_option('ns_wcapb_text')).'</div>';
	echo '<div id="ns-custom-layer-box"></div><div id="ns-wcapb-container2"><div id="ns-apb-close">X</div><div id="ns-wcapb-container">'.do_shortcode(get_option('ns_wcapb_text')).'</div></div>';
}
add_action( 'wp_footer', 'ns_wcapb_free_layer' );

/* *** include text domain *** */
function ns_custom_alert_popup_box_load_plugin_textdomain() {
    load_plugin_textdomain( 'ns-custom-alert-popup-box', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'ns_custom_alert_popup_box_load_plugin_textdomain' );


/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nscustomalertpopupbox_add_action_links' );

function nscustomalertpopupbox_add_action_links ( $links ) {	
 $mylinks = array('<a id="nscapblinkpremiumlinkpremium" href="https://www.nsthemes.com/product/woocommerce-watermark/?ref-ns=2&campaign=CAPB-linkpremium" target="_blank">'.__( 'Premium Version', 'ns-custom-alert-popup-box' ).'</a>');
return array_merge( $links, $mylinks );
}

?>