<?php
$di_plugin_constants = WP_PLUGIN_DIR . '/dedicated-transients/constants.php';

if ( is_file( $di_plugin_constants ) ) {
	include_once $di_plugin_constants;
}

if ( ! defined( 'DEDICATED_TRANSIENTS_WPMU_DROPIN' ) ||
     ! defined( 'DEDICATED_TRANSIENTS_TABLE' ) ||
     ! defined( 'DEDICATED_TRANSIENTS_WPMU_TABLE' ) ) {

	return;
}

/**
 * @param string $query
 */
function dedicated_transients_process_query( $query ) {
	global $wpdb;
	if ( false !== strpos( $query, $wpdb->options ) ) {
		foreach (
			array(
				'_transient_',
				'\_transient\_',
				'_transient_timeout',
				'\_transient\_timeout',
			) as $search
		) {
			if ( false !== strpos( $query, $search ) ) {
				$query = str_replace( $wpdb->options, $wpdb->get_blog_prefix() . DEDICATED_TRANSIENTS_TABLE, $query );
				break;
			}
		}
	}

	if ( is_multisite() && false !== strpos( $query, $wpdb->sitemeta ) ) {
		foreach (
			array(
				'_site__transient_',
				'\_site\_transient\_',
				'_site_transient_timeout',
				'\_site\_transient\_timeout',
			) as $search
		) {
			if ( false !== strpos( $query, $search ) ) {
				$query = str_replace( $wpdb->sitemeta, $wpdb->base_prefix . DEDICATED_TRANSIENTS_WPMU_TABLE, $query );
				break;
			}
		}
	}

	return $query;
}

add_filter( 'query', 'dedicated_transients_process_query' );