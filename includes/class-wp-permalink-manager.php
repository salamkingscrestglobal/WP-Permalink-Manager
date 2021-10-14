<?php
/**
 * WP Permalink Manager setup.
 *
 * @package KCGCustomPermalinks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main WP Permalink Manager class.
 */
class WP_Permalink_Manager {
	/**
	 * WP Permalink Manager version.
	 *
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Define WP Permalink Manager Constants.
	 *
	 * @since 2.0.0
	 * @access private
	 */
	private function define_constants() {
		$this->define( 'WP_PERMALINK_MANAGER_BASENAME', plugin_basename( WP_PERMALINK_MANAGER_FILE ) );
		$this->define( 'WP_PERMALINK_MANAGER_PATH', plugin_dir_path( WP_PERMALINK_MANAGER_FILE ) );
		$this->define( 'WP_PERMALINK_MANAGER_VERSION', $this->version );
	}

	/**
	 * Define constant if not set already.
	 *
	 * @since 2.0.0
	 * @access private
	 *
	 * @param string      $name  Constant name.
	 * @param string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 *
	 * @since 1.2.18
	 * @access private
	 */
	private function includes() {
		include_once WP_PERMALINK_MANAGER_PATH . 'includes/class-wp-permalink-manager-form.php';
		include_once WP_PERMALINK_MANAGER_PATH . 'includes/class-wp-permalink-manager-frontend.php';
		include_once WP_PERMALINK_MANAGER_PATH . 'admin/class-wp-permalink-manager-admin.php';

		$wp_pl_form = new WP_Permalink_Manager_Form();
		$wp_pl_form->init();

		$cp_frontend = new WP_Permalink_Frontend();
		$cp_frontend->init();
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 2.0.0
	 * @access private
	 */
	private function init_hooks() {
		register_activation_hook(
			WP_PERMALINK_MANAGER_FILE,
			array( 'WP_Permalink_Manager', 'add_roles' )
		);
		add_action( 'plugins_loaded', array( $this, 'check_loaded_plugins' ) );
	}

	
	public static function add_roles() {
		$admin_role      = get_role( 'administrator' );
		$cp_role         = get_role( 'wp_permalink_manager_mr' );
		$current_version = get_option( 'wp_permalink_manager_plugin_version', -1 );

		if ( ! empty( $admin_role ) ) {
			$admin_role->add_cap( 'wp_pm_view_post_permalinks' );
			$admin_role->add_cap( 'wp_pm_view_category_permalinks' );
		}

		if ( empty( $cp_role ) ) {
			add_role(
				'wp_permalink_manager_mr',
				__( 'Wp Permalink Manager' ),
				array(
					'wp_pm_view_post_permalinks'     => true,
					'wp_pm_view_category_permalinks' => true,
				)
			);
		}
	}

	public function check_loaded_plugins() {
		if ( is_admin() ) {
			$current_version = get_option( 'wp_permalink_manager_plugin_version', -1 );

			if ( -1 === $current_version
				|| $current_version < WP_PERMALINK_MANAGER_VERSION
			) {
				
				self::add_roles();
			}
		}

		load_plugin_textdomain(
			'custom-permalinks',
			false,
			basename( dirname( WP_PERMALINK_MANAGER_FILE ) ) . '/languages/'
		);
	}
}

new WP_Permalink_Manager();
