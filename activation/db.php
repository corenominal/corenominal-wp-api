<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Set-up database tables.
 */
function corenominal_wp_api_create_tables()
{
	global $wpdb;

	$sql = "CREATE TABLE IF NOT EXISTS `corenominal_api_wp_plugins` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `name` varchar(255) NOT NULL DEFAULT '',
			  `url` varchar(255) NOT NULL DEFAULT '',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
	$query = $wpdb->query( $sql );
}

corenominal_wp_api_create_tables();
