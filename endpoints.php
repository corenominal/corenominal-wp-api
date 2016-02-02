<?php
/**
 * Register endpoints
 */
function corenominal_api_register_endpoints()
{
	// endpoint:/wp-json/corenominal/ip
	register_rest_route( 'corenominal', '/ip', array(
        'methods' => 'GET',
        'callback' => 'corenominal_api_ip',
    ));

    // endpoint:/wp-json/corenominal/doodle_download
	register_rest_route( 'corenominal', '/doodle_download', array(
        'methods' => 'GET',
        'callback' => 'corenominal_api_doodle_download',
    ));
}
add_action( 'rest_api_init', 'corenominal_api_register_endpoints' );

/**
 * Endpoint: /wp-json/corenominal/ip
 */
require_once( plugin_dir_path( __FILE__ ) . 'endpoints/ip.php' );

/**
 * Endpoint: /wp-json/corenominal/doodle_download
 */
require_once( plugin_dir_path( __FILE__ ) . 'endpoints/doodle_download.php' );