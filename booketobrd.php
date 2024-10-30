<?php
/*
Plugin Name: BookEtBord
Plugin URI: http://wordpress.org/plugins/booketbord/
Description: This plugin helps you make lightbox with booketbord booking system
Author: Wel Rachid, We-Serve-You ApS
Version: 1.6.1
Author URI: https://www.booketbord.dk
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
function booketbord_insert_bottom() {
	$html = '
<div id="wsylightbox" class="wsylightbox" onclick="closewsylightbox();">
  <div class="wsylightbox-popup">

		<div class="wsylightbox-close-btn">
			<img src="'.plugins_url('/assets/close.png',__FILE__).'">
		</div>
		<div style="clear:both;"></div>
				<div class="wsylightbox-content">
					<iframe id="wsylightbox-iframe" src="" frameborder="0"></iframe>
				</div>
  </div>
</div>
';
	if(strlen(get_option('booketbord_ldjson')) > 100){
		$html .= '<script type="application/ld+json">'.( get_option('booketbord_ldjson')).'</script>';
	}
	echo $html;
}
add_action( 'wp_footer', 'booketbord_insert_bottom', 100 );
add_action('wp_enqueue_scripts','booketbord_init_frontend');

function booketbord_init_frontend() {
    wp_enqueue_script( 'wsy-popup', plugins_url( '/booketbord.js', __FILE__ ),'','',true);
    wp_enqueue_style( 'wsy-popup', plugins_url( '/booketbord.css', __FILE__ ));
	wp_localize_script( 'wsy-popup', 'booketbord', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}
function booketbord_create_menu(){
	add_menu_page('Liste', 'BookEtBord', 'administrator',"booketbord/settings.php", 'booketbord_settings_page' , plugins_url('/assets/icon.png', __FILE__));
}
function booketbord_settings_page(){
	include_once("settings.php");
}

add_action('admin_menu', 'booketbord_create_menu');

function booketbord_register_my_settings() {
	register_setting( 'booketbord_standard', 'booketbord_id', 'intval' ); 
	register_setting( 'booketbord_standard', 'booketbord_ldjson', 'string' ); 
} 
add_action( 'admin_init', 'booketbord_register_my_settings' );