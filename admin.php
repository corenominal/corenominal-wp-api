<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * The admin screen for setting an API key
 */

/**
 * Admin pages for editing basic business information.
 */
function corenominal_api_admin_options()
{
	// Add top level page
	add_menu_page(
		'corenominal API Info', // page title
		'corenominal', // menu title
		'manage_options', // capability
		'corenominal_api_info', // slug
		'corenominal_api_info_callback', // callback
		'dashicons-admin-settings', // icon - 20x20 png or SVG - for dashicon just ref the icon 'dashicons-sos'
		60 //position
	);

	// Add sub menu page
	// Note, the first submenu item needs to copy the top level.
	add_submenu_page(
		'corenominal_api_info', // parent slug
		'corenominal API Info', // page title
		'Information', // menu title
		'manage_options', // capability
		'corenominal_api_info', // slug
		'corenominal_api_info_callback' // callback function
	);

	// Activate custom settings
	//add_action( 'admin_init', 'corenominal_info_register' );

	// Add sub menu page for generating the API key
	add_submenu_page(
		'corenominal_api_info', // parent slug
		'corenominal - API Key', // page title
		'API Key', // menu title
		'manage_options', // capability
		'corenominal-apikey', // slug
		'corenominal_apikey_callback' // callback function
	);

	// Activate custom settings
	add_action( 'admin_init', 'corenominal_apikey_register' );

	// Add sub menu page for listing my GitHub hosted WP plugins
	add_submenu_page(
		'corenominal_api_info', // parent slug
		'corenominal - GitHub Hosted WP Plugins', // page title
		'WP Plugins', // menu title
		'manage_options', // capability
		'corenominal-github-wp-plugins', // slug
		'corenominal_github_wp_plugins_callback' // callback function
	);

}
add_action( 'admin_menu', 'corenominal_api_admin_options' );

/**
 * Include admin views
 */
require_once( plugin_dir_path( __FILE__ ) . 'admin/corenominal_api_info.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/corenominal_api_key.php' );
require_once( plugin_dir_path( __FILE__ ) . 'admin/corenominal_github_wp_plugins.php' );
