<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Return IP address
 */
function corenominal_api_ip( $request_data )
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

	header( 'Content-Type: text/plain' );
	echo $_SERVER['REMOTE_ADDR'];
	exit;
}
