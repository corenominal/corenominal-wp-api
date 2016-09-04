<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * CRUD operations for my GitHub hosted WordPress plugins
 */
function corenominal_api_github_wp_plugins( $request_data )
{

	$data = $request_data->get_params();

	$apikey = get_option( 'corenominal_apikey', '' );

	/**
	 * Test for existance of API key
	 */
	if( !isset( $data['apikey'] ) )
  	{
  		$data['apikey'] = false;
  	}

	/**
	 * Test for action
	 */
	if( !isset( $data['action'] ) )
 	{
 		$data['error'] = 'Please provide an action';
 		return $data;
 	}

	switch ( $data['action'] )
	{
		case 'list':
			global $wpdb;
			$sql = "SELECT * FROM `corenominal_api_wp_plugins` ORDER BY `name` ASC";
			$data['plugins'] = $wpdb->get_results( $sql, ARRAY_A );
			$data['num_rows'] = $wpdb->num_rows;
			unset( $data['action'] );
			unset( $data['apikey'] );
			return $data;
			break;

		case 'create':
			if( $data['apikey'] != $apikey )
			{
				$data['error'] = 'Invalid API key';
				return $data;
			}

			if( !$data['name'] || trim( $data['name'] ) == '' )
			{
				$data['error'] = 'Please provide the repo name';
				return $data;
			}

			if( !$data['url'] || trim( $data['url'] ) == '' )
			{
				$data['error'] = 'Please provide the repo URL';
				return $data;
			}

			global $wpdb;
			unset( $data['action'] );
			unset( $data['apikey'] );
			$wpdb->insert( 'corenominal_api_wp_plugins', $data, array( '%s', '%s' ) );

			return $data;
			break;

		default:
			$data['error'] = 'Please provide an action';
			return $data;
			break;
	}
}
