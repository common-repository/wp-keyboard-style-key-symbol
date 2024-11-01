<?php
/*
Plugin Name: WP Keyboard Style Key Symbol
Plugin URI: https://www.allwebtuts.com/add-keyboard-style-symbol-in-wordpress-posts/
Description: A Plugin Which Help us to add the Keyboard Style Key Symbol in our Wordpress posts and Pages.
Version: 1.3
Author: Santhosh veer
Author URI: https://santhoshveer.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

//define the plugin version
if (!defined('WP_KEYBOARD_STYLE_VERSION_NUM')){ //define plugin version
    define('WP_KEYBOARD_STYLE_VERSION_NUM', '1.3');
}

// register admin script
add_action( 'admin_enqueue_scripts', 'wpksylmls_enqueue_color_picker' );
function wpksylmls_enqueue_color_picker( $hook_suffix ) {
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script( 'my-script-handle', plugins_url('slcolr.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// Plugin CSS File
add_action('wp_head','wpkeysymbl_css');
function wpkeysymbl_css() {

$lncolor = get_option('wpkeysymbl_line_color');
$boxkcolor = get_option('wpkeysymbl_box_color');
$brdrcolor = get_option('wpkeysymbl_border_color');
$txtscolor = get_option('wpkeysymbl_text_color');

$output="<style>
bawt-key{
border:1px solid gray;
font-size:1.2em;
box-shadow:1px 0 1px 0 $lncolor, 0 2px 0 2px $boxkcolor, 0 2px 0 3px $brdrcolor;
-webkit-border-radius:3px;
-moz-border-radius:3px;
border-radius:3px;
margin:2px 3px;
padding:1px 5px;
color: $txtscolor;
}
</style>";

echo $output;

}

//plugin open registration
function activate_mswpkeystylesymbols() {
  add_option('wpkeysymbl_line_color', '#eeeeee');
  add_option('wpkeysymbl_box_color', '#cccccc');
  add_option('wpkeysymbl_border_color', '#444444');
  add_option('wpkeysymbl_text_color', '#000000');
}

function deactive_mswpkeystylesymbols() {
  delete_option('wpkeysymbl_line_color');
  delete_option('wpkeysymbl_box_color');
  delete_option('wpkeysymbl_border_color');
  delete_option('wpkeysymbl_text_color');
 
}

function admin_init_mswpkeystylesymbols() {
  register_setting('wpkeysybl_option_pnl', 'wpkeysymbl_line_color');
  register_setting('wpkeysybl_option_pnl', 'wpkeysymbl_box_color');
  register_setting('wpkeysybl_option_pnl', 'wpkeysymbl_border_color');
  register_setting('wpkeysybl_option_pnl', 'wpkeysymbl_text_color');
}

// plugin option panel
function admin_menu_wpkeystylesymbols() {
  add_options_page('WP Keyboard Style Key Symbol', 'WP Keyboard Style Key Symbol', 'manage_options', 'wpkeysybl_option_pnl', 'options_page_wpkeystylesymbols');
}

// option panel page
function options_page_wpkeystylesymbols() {
  include( plugin_dir_path( __FILE__ ) .'options.php');
}

// WP Keyboard Style Key Symbol
function awts_keystyle($atts, $content = null) {
extract(shortcode_atts(array(
'link' => '#'
), $atts));
return '<bawt-key>'.$content.'</bawt-key>';
}
add_shortcode('keybt', 'awts_keystyle');

// TinyMCE Plugin
function wpkey_symblzz_scripts($plugin_array)
{
  //enqueue TinyMCE plugin script with its ID.
  $plugin_array["wpkeyboard_style_keysymbol"] =  plugin_dir_url(__FILE__) . "wpkeytiny.js";
  return $plugin_array;
}

add_filter("mce_external_plugins", "wpkey_symblzz_scripts");

function register_buttons_wpkeysylsym($buttons)
{
  //register buttons with their id.
  array_push($buttons, "wpkeysymbolstylekeys");
  return $buttons;
}

add_filter("mce_buttons", "register_buttons_wpkeysylsym");

// plugin register hooks
register_activation_hook(__FILE__, 'activate_mswpkeystylesymbols');
register_deactivation_hook(__FILE__, 'deactive_mswpkeystylesymbols');

if (is_admin()) {
  add_action('admin_init', 'admin_init_mswpkeystylesymbols');
  add_action('admin_menu', 'admin_menu_wpkeystylesymbols');

}

/* plugin menu link*/
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpkeysymbl_optge_lnks' );

function wpkeysymbl_optge_lnks ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'options-general.php?page=wpkeysybl_option_pnl' ) . '">Plugin Settings</a>',
 );
return array_merge( $links, $mylinks );
}

