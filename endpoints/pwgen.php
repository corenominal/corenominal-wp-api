<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Return pwgen generated password
 */
function corenominal_api_pwgen( $request_data )
{
	$apikey = get_option( 'corenominal_apikey', '' );

	$data = $request_data->get_params();

	$cmd = 'pwgen';

	if( isset( $data['capitalize'] ) && $data['capitalize'] )
	{
		$cmd = $cmd . ' --capitalize';
	}

	if( isset( $data['numerals'] ) && $data['numerals'] )
	{
		$cmd = $cmd . ' --numerals';
	}

	if( isset( $data['symbols'] ) && $data['symbols'] )
	{
		$cmd = $cmd . ' --symbols';
	}

	if( isset( $data['length'] ) && $data['length'] )
	{
		$cmd = $cmd . ' ' . $data['length'];
	}
	else
	{
		$cmd = $cmd . ' 12';
	}

	$cmd = $cmd . ' 1';

	$password = exec( $cmd );
	return array( 'password' => $password );
}
