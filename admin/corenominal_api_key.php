<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * The default theme admin page
 */

/**
 * Register custom settings
 */
function corenominal_apikey_register()
{
	/**
	 * Register the settings fields
	 */
	register_setting(
		'corenominal_apikey_group', // option group
		'corenominal_apikey' // option name
		);

	/**
	 * Create the settings section for this group of settings
	 */
	add_settings_section(
		'corenominal-apikey', // id
		'General Theme API Key', // title
		'corenominal_apikey_section', // callback
		'corenominal_apikey' // page
		);

	/**
	 * Add the settings fields
	 */
	add_settings_field(
		'corenominal-apikey', // id
		'API Key', // title/label
		'corenominal_apikey', // callback
		'corenominal_apikey', // page
		'corenominal-apikey' // settings section
		);
}

/**
 * The callbacks
 */
function corenominal_apikey_section()
{
	return;
}

function corenominal_apikey()
{
    $setting = esc_attr( get_option( 'corenominal_apikey' ) );
	echo '<button id="key-gen" class="button button-secondary key-gen">Key Gen</button>';
	echo '<input id="apikey" type="text" class="regular-text" name="corenominal_apikey" value="'.$setting.'" placeholder="API Key">';
}

/**
 * Enqueue additional JavaScript
 */
function corenominal_apikey_enqueue_scripts( $hook )
{
	if( 'settings_page_corenominal-apikey' != $hook )
	{
		return;
	}

	wp_register_script( 'corenominal_apikey_js', plugin_dir_url( __FILE__ ) . 'js/corenominal_apikey.js', array('jquery'), '0.0.1', true );
	wp_enqueue_script( 'corenominal_apikey_js' );

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'corenominal_apikey_enqueue_scripts' );

/**
 * Output the page
 */
function corenominal_apikey_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal API Plugin &mdash; Keygen</h1>

		<p>Create and save an API Key for use within the theme. You can either create your own key, or click the "Key Gen" button (<em>recommended</em>).</p>

		<hr>

		<form method="POST" action="options.php">

			<?php settings_fields( 'corenominal_apikey_group' ); ?>
			<?php do_settings_sections( 'corenominal_apikey' ); ?>
			<?php submit_button(); ?>

		</form>

	</div>
	<?php
}
