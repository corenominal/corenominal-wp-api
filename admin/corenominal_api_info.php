<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * The default theme admin page for detailing this plugin
 */

 /**
  * Enqueue additional CSS and JavaScript
  */
 function corenominal_api_info_scripts( $hook )
 {
	if( 'toplevel_page_corenominal_api_info' != $hook )
 	{
 		return;
 	}

 	wp_register_style( 'corenominal_api_info_css', plugin_dir_url( __FILE__ ) . 'css/corenominal_api_info.css', array(), '0.0.1', 'all' );
 	wp_enqueue_style( 'corenominal_api_info_css' );

 }
 add_action( 'admin_enqueue_scripts', 'corenominal_api_info_scripts' );

/**
 * Output the page
 */
function corenominal_api_info_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal API Plugin &mdash; Information</h1>

		<p>See below for information about the endpoints included in this plugin.</p>

		<hr>

		<h2>Endpoints</h2>

		<div class="endpoint postbox">
			<h3>/wp-json/corenominal/ip</h3>
			<ul>
				<li><strong>method</strong> GET</li>
				<li><strong>@param</strong> string $apikey the api key</li>
			</ul>
		</div>

        <div class="endpoint postbox">
			<h3>/wp-json/corenominal/wp-version</h3>
			<ul>
				<li><strong>method</strong> GET</li>
				<li><strong>@param</strong> string $apikey the api key</li>
                <li><strong>@param</strong> string $output </li>
                <ul>
                    <li>['svg'] output as svg image</li>
                    <li>['json'] output as json</li>
                </ul>
			</ul>
		</div>

		<div class="endpoint postbox">
			<h3>/wp-json/corenominal/pwgen</h3>
			<ul>
				<li><strong>method</strong> GET</li>
				<li><strong>@param</strong> bool(0/1) $capitalize include at least one capital letter in the password</li>
				<li><strong>@param</strong> bool(0/1) $numerals include at least one number in the password</li>
				<li><strong>@param</strong> bool(0/1) $symbols include at least one special symbol in the password</li>
				<li><strong>@param</strong> int $length password length</li>
			</ul>
		</div>


	</div>
	<?php
}
