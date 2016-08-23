<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * The default theme admin page
 */

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

		<h3>/wp-json/corenominal/ip</h3>

		<p>
			<strong>method</strong> GET<br>
			<strong>@param</strong> string $apikey the api key<br>
		</p>


	</div>
	<?php
}
