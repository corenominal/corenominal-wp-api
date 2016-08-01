<?php
/**
 * Return WordPress Vesion
 */
function corenominal_api_wp_version( $request_data )
{
	$apikey = get_option( 'corenominal_apikey', '' );

	$data = $request_data->get_params();

	if( !isset( $data['apikey'] ) )
	{
		$data['error'] = 'Please provide an API key';
		return $data;
	}

	if( $data['apikey'] != $apikey )
	{
		$data['error'] = 'Invalid API key';
		return $data;
	}

	unset( $data['apikey'] );
	$data['version'] = get_bloginfo( 'version' );
	return $data;
}
