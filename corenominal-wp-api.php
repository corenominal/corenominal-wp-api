<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Plugin Name: corenominal's WordPress API
 * Description: This is corenominal's WordPress API. It provides features specifically for corenominal, but feel free to take a look.
 * Plugin URI: https://github.com/corenominal/corenominal-wp-api
 * Author: Philip Newborough
 * Author URI: http://corenominal.org
 * Version: 0.0.1
 * License: GPLv2
 */

/**
 * Plugin activation functions
 */
function corenominal_wp_api_activate()
{
	require_once( plugin_dir_path( __FILE__ ) . 'activation/db_war.php' );
}
register_activation_hook( __FILE__, 'corenominal_wp_api_activate' );

/**
 * Register routes/endpoints
 */
require_once( plugin_dir_path( __FILE__ ) . 'endpoints.php' );

/**
 * An admin screen for creating an API key
 */
require_once( plugin_dir_path( __FILE__ ) . 'admin.php' );

/**
 * Add settings link in plugin's listing
 */
function corenominal_apikey_action_links( $actions, $plugin_file )
{
	static $plugin;

	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);
	if ($plugin == $plugin_file)
	{
		$settings = array('settings' => '<a href="options-general.php?page=corenominal-apikey">' . __('Settings', 'General') . '</a>');

		$actions = array_merge($settings, $actions);
	}
	return $actions;
}
add_filter( 'plugin_action_links', 'corenominal_apikey_action_links', 10, 5 );
