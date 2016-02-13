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
}
add_action( 'rest_api_init', 'corenominal_api_register_endpoints' );

/**
 * Endpoint: /wp-json/corenominal/ip
 */
require_once( plugin_dir_path( __FILE__ ) . 'endpoints/ip.php' );
