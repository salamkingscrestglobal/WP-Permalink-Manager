<?php
/**
 * Plugin Name: WP Permalink Manager
 * Plugin URI: https://kingscrestglobal.com/
 * Description: Set Permalinks on a per-post and  per-page basis. This is very easy to use and this will not effect your rewrite url rules.
 * Version: 1.0.0
 * Requires PHP: 5.4
 * Author: Kings Crest Global
 * Author URI: https://kingscrestglobal.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * Text Domain: wp-permalink-manager
 * Domain Path: /languages/
 *
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WP_PERMALINK_MANAGER_FILE' ) ) {
	define( 'WP_PERMALINK_MANAGER_FILE', __FILE__ );
}

// Include the main WP Permalink Manager class.
require_once plugin_dir_path( WP_PERMALINK_MANAGER_FILE ) . 'includes/class-wp-permalink-manager.php';
