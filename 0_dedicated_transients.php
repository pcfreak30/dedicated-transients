<?php
$di_plugin_constants = WP_PLUGIN_DIR . '/dedicated-transients/constants.php';

/** @var \WP_Filesystem_Base $wp_filesystem */
global $wp_filesystem;
if ( is_null( $wp_filesystem ) ) {
	require_once ABSPATH . '/wp-admin/includes/file.php';
	WP_Filesystem();
}

if ( ! $wp_filesystem->is_file( $di_plugin_constants ) ) {
	return;
}

require_once $di_plugin_constants;

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
				$query = str_replace( $wpdb->options, $wpdb->base_prefix . DEDICATED_TRANSIENTS_TABLE, $query );
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