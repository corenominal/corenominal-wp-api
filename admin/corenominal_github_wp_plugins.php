<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * An admin page for listing your GitHub hosted WP plugins
 */

/**
 * Enqueue additional CSS and JavaScript
 */
function corenominal_github_wp_plugins_scripts( $hook )
{
	if( 'corenominal_page_corenominal-github-wp-plugins' != $hook )
	{
		return;
	}

	wp_register_style( 'corenominal_github_hosted_plugins_css', plugin_dir_url( __FILE__ ) . 'css/corenominal_github_hosted_plugins.css', array(), '0.0.1', 'all' );
	wp_enqueue_style( 'corenominal_github_hosted_plugins_css' );

	wp_register_script( 'corenominal_github_hosted_plugins_js', plugin_dir_url( __FILE__ ) . 'js/corenominal_github_hosted_plugins.js', array('jquery'), '0.0.1', true );
	wp_enqueue_script( 'corenominal_github_hosted_plugins_js' );

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'corenominal_github_wp_plugins_scripts' );

/**
 * Output the page
 */
function corenominal_github_wp_plugins_callback()
{
	?>
	<div class="wrap">

		<h1>corenominal API Plugin &mdash; GitHub Hosted WP Plugins</h1>

		<p>WordPress plugins to check via my Python updater script.</p>

		<p><button id="corenominal-api-add-plugin-button" class="button">Add New Plugin</button></p>

		<div id="corenominal-api-add-plugin-form" class="corenominal-api-add-plugin-form" data-apikey="<?php echo get_option( 'iewp_dashboard_links_apikey', '' ); ?>" data-endpoint-add="<?php echo site_url('/wp-json/corenominal/github-wp-plugin-add') ?>">
			<input type="text" id="corenominal-api-repo-name" autocomplete="off" placeholder="GitHub Repo name">
			<input type="text" id="corenominal-api-repo-url" autocomplete="off" placeholder="https://github.com/...">
			<button id="corenominal-api-repo-save" class="button button-primary">Add Plugin</button>
			<button id="corenominal-api-repo-cancel" class="button">Cancel</button>
			<div id="corenominal-api-repo-form-notify" class="corenominal-api-repo-form-notify"></div>
		</div>

        <table class="plugins-list wp-list-table widefat fixed striped posts">
        	<thead>
        		<tr>
        			<th class="manage-column column-name column-primary" scope="col">Repo Name</th>
        			<th class="manage-column column-address" scope="col">Repo URL</th>
        			<th class="manage-column column-options" scope="col">Options</th>
        		</tr>
        	</thead>

        	<tbody id="the-list">
        		<tr>
        			<td class="" id="">corenominal-wp-api</td>
        			<td class="" id="">https://github.com/corenominal/corenominal-wp-api</td>
        			<td class="" id=""><button class="button">Remove</button></td>
        		</tr>
        		<tr>
        			<td class="" id="">corenominal-wp-api</td>
        			<td class="" id="">https://github.com/corenominal/corenominal-wp-api</td>
        			<td class="" id=""><button class="button">Remove</button></td>
        		</tr>
        		<tr>
        			<td class="" id="">corenominal-wp-api</td>
        			<td class="" id="">https://github.com/corenominal/corenominal-wp-api</td>
        			<td class="" id=""><button class="button">Remove</button></td>
        		</tr>
        	</tbody>
        </table>

	</div>
	<?php
}
