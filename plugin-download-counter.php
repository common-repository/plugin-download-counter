<?php
/*
Plugin Name: Plugin Download Counter
Version: 1.0
Description: Counts Plugin Downloads and ratings on wordpress from wordpress.org
Author: munishsandy
Author URI: https://profiles.wordpress.org/munishsandy
Plugin URI: https://wordpress.org/plugins/plugin-download-counter
*/
class mk_plugin_counter {
	/* WP API */
	protected $WP_API = 'http://api.wordpress.org/plugins/info/1.0/';	
	
	public function __construct() {
		 add_shortcode( 'plugin_download_counter', array($this, 'plugin_download_counter_download_counter_call' ));	
		 add_action('admin_menu', array(&$this, 'plugin_download_counter_admin_menu'));
	}
	
	/* Shortcode Callback */
	public function plugin_download_counter_download_counter_call( $atts ) {
		extract(shortcode_atts(array(  
			"plugin_slug" 		=> '',  
			"type" => 'downloads',
				), $atts));										 
		$args = (object) array( 'slug' => $plugin_slug );
	 
		$request = array( 'action' => 'plugin_information', 'timeout' => 15, 'request' => serialize( $args) );
	 
		$response = wp_remote_post( $this->WP_API, array( 'body' => $request ) );
		
		$plugin_info = unserialize( $response['body'] );
		if($type == 'downloads') {						
		    echo $plugin_info->downloaded;	  
		 } else if($type == 'ratings'){		
		    echo $plugin_info->num_ratings;	  	
		 }
	 }
	 /* Admin Menu */
	public function plugin_download_counter_admin_menu() {
		 	add_menu_page( 
				__( 'Download Counter', 'mkplugincounter' ),
				'Download Counter',
				'manage_options',
				'mk_plugin_counter',
				 array(&$this,'mk_plugin_counter_callback'),
				 'dashicons-editor-customchar' // will replace this later
				 );	
	 }
	public function mk_plugin_counter_callback() {
		if(is_admin()){
		  include('inc/shortcode.php');
      	}
	}
}
new mk_plugin_counter;