<?php
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
 * The main api hook
 */
function corenominal_wp_api( $hook )
{
	$pagename = false;
	if( isset( $hook->query_vars['pagename'] ) )
	{
		$pagename = $hook->query_vars['pagename'];
	}

	if( 'api' != $pagename )
	{
		return;
	}
	
	/**
	 * Capture all requests
	 */
	$data = $_REQUEST;

	/**
	 * Get the API key
	 */
	$apikey = get_option( 'corenominal_apikey', '' );

	/**
	 * Sanity checks
	 * 1. test $data array is not empty and method is set
	 * 2. test method for invalid characters
	 */
	if( !sizeof( $data ) || !isset( $data['method'] ) )
	{
		die( 'Error: no method defined' );
	}

	if( preg_match( '/[^a-z_\-0-9]/i', $data['method'] ) )
	{
		die( 'Error: invalid method' );
	}

	/**
	 * Test if function file exists for supplied method,
	 * if so, require it, else die
	 */
	$method = plugin_dir_path( __FILE__ ) . 'methods/' . $data['method'] . '.php';
	
	if( file_exists( $method ) )
	{
		require_once( $method );
	}
	else
	{
		die( 'Error: method not found' );
	}
}
add_action( 'parse_request', 'corenominal_wp_api' );