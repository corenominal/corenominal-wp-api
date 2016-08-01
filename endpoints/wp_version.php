<?php
/**
 * Return WordPress Vesion
 */
function corenominal_api_wp_version( $request_data )
{
	$data = $request_data->get_params();

	if( !isset( $data['output'] ) )
	{
		$data['output'] = 'json';
	}

	switch ( $data['output'] )
	{
		case 'svg':
			$svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
			<svg id="svg2" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" height="5.6439mm" width="42.587mm" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" viewBox="0 0 150.89805 19.99806">
			 <g id="layer1" transform="translate(-250.46 -534.84)">
			  <path id="rect3347-3-6" d="m323.44 534.84v19.998h-70.064c-1.6165 0-2.9163-1.3974-2.9163-3.1328v-13.732c0-1.7354 1.2998-3.1328 2.9163-3.1328h70.064z" fill="#5d5d5d"/>
			  <path id="rect3347-3" fill="#40bb12" d="m323.01 534.84v19.998h75.219c1.7354 0 3.1309-1.3974 3.1309-3.1328v-13.732c0-1.7354-1.3954-3.1328-3.1309-3.1328h-75.219z"/>
			  <text id="text3383" style="word-spacing:0px;letter-spacing:0px" xml:space="preserve" font-size="12.5px" y="548.28931" x="258.23508" font-family="sans-serif" line-height="125%" fill="#ffffff"><tspan id="tspan3385" font-size="11.25px" y="548.28931" x="258.23508">wordpress</tspan></text>
			  <text id="text3383-7" style="word-spacing:0px;letter-spacing:0px" xml:space="preserve" font-size="12.5px" y="548.03357" x="328.50192" font-family="sans-serif" line-height="125%" fill="#ffffff"><tspan id="tspan3385-5" font-size="11.25px" y="548.03357" x="328.50192">' . get_bloginfo( 'version' ) . ' tested</tspan></text>
			 </g>
			</svg>';
			header( 'Content-Type: image/svg+xml' );
			echo $svg;
			exit;
			break;

		default:
			unset( $data['output'] );
			$data['version'] = get_bloginfo( 'version' );
			return $data;
			break;
	}

}
