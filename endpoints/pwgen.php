<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Return pwgen generated password
 */
function corenominal_api_pwgen( $request_data )
{

	$data = $request_data->get_params();

	$cmd = 'pwgen';

	if( isset( $data['capitalize'] ) && $data['capitalize'] )
	{
		$cmd = $cmd . ' --capitalize';
	}
	else
	{
		$cmd = $cmd . ' --no-capitalize';
	}

	if( isset( $data['numerals'] ) && $data['numerals'] )
	{
		$cmd = $cmd . ' --numerals';
	}
	else
	{
		$cmd = $cmd . ' --no-numerals';
	}

	if( isset( $data['symbols'] ) && $data['symbols'] )
	{
		$cmd = $cmd . ' --symbols';
	}

	if( isset( $data['length'] ) && is_numeric( $data['length'] ) && $data['length'] > 0 )
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
