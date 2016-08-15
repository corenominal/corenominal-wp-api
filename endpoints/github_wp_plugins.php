<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Return a list of my GitHub hosted WordPress plugins
 */
function corenominal_api_github_wp_plugins( $request_data )
{
	$data = $request_data->get_params();

	$data = array( 'foo', 'bar', 'iewp-simple-google-analytics', 'iewp-disable-admin-bar' );

	return $data;
}
