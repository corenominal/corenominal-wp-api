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

		<p>See below for information about the features included in this plugin.</p>

		<hr>

		<h2>Endpoints</h2>

		<div class="endpoint postbox">
			<h3>/wp-json/corenominal/ip</h3>
			<p>
				<strong>method</strong> GET<br>
				<strong>@param</strong> string $apikey the api key<br>
			</p>
		</div>

		<div class="endpoint postbox">
			<h3>/wp-json/corenominal/pwgen</h3>
			<p>
				<strong>method</strong> GET<br>
				<strong>@param</strong> bool $capitalize include at least one capital letter in the password<br>
				<strong>@param</strong> bool $numerals include at least one number in the password<br>
				<strong>@param</strong> bool $symbols include at least one special symbol in the password<br>
				<strong>@param</strong> int $length password length<br>
			</p>
		</div>


	</div>
	<?php
}
