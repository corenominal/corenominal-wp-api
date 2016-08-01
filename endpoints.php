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
		'show_in_index' => false,
    ));
	// endpoint:/wp-json/corenominal/wp-version
	register_rest_route( 'corenominal', '/wp-version', array(
        'methods' => 'GET',
        'callback' => 'corenominal_api_wp_version',
		'show_in_index' => false,
    ));
}
add_action( 'rest_api_init', 'corenominal_api_register_endpoints' );

/**
 * Include endpoints for the above registrations
 */
require_once( plugin_dir_path( __FILE__ ) . 'endpoints/ip.php' );
require_once( plugin_dir_path( __FILE__ ) . 'endpoints/wp_version.php' );
