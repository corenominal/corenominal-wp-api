<?php
/**
 * The admin screen for setting an API key
 */

/**
 * Add submenu item to the default WordPress "Settings" menu.
 */
function corenominal_api_key()
{
	add_submenu_page( 
		'options-general.php', // parent slug to attach to
		'API Key', // page title
		'API Key', // menu title
		'manage_options', // capability
		'corenominal-apikey', // slug
		'corenominal_apikey_callback' // callback function
		);

	// Activate custom settings
	add_action( 'admin_init', 'corenominal_apikey_register' );
}
add_action( 'admin_menu', 'corenominal_api_key' );

/**
 * Include admin view
 */
require_once( plugin_dir_path( __FILE__ ) . 'admin/corenominal_api_key.php' );
