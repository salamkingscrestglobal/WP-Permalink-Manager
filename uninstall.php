<?php
/**
 * KCGCustomPermalinks Uninstall
 *
 * Deletes Option and Post Permalinks on uninstalling the Plugin.
 *
 * @package KCGCustomPermalinks

 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_post_meta_by_key( 'wp_permalink_manager' );
delete_option( 'kcg_custom_permalink_table' );

$wp_role = get_role( 'administrator' );
if ( ! empty( $wp_role ) ) {
	$wp_role->remove_cap( 'wp_pm_view_post_permalinks' );
	$wp_role->remove_cap( 'wp_pm_view_category_permalinks' );
}

$wp_role = get_role( 'wp_permalink_manager_mr' );
if ( ! empty( $wp_role ) ) {
	$wp_role->remove_cap( 'wp_pm_view_post_permalinks' );
	$wp_role->remove_cap( 'wp_pm_view_category_permalinks' );

	remove_role( 'wp_permalink_manager_mr' );
}

// Clear any cached data that has been removed.
wp_cache_flush();
