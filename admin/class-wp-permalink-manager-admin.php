<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WP_Permalink_Manager_Admin {

	public function __construct() {
		
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		
	}

	public function admin_menu() {
		add_menu_page(
			'Permalink Editor',
			'Permalink Editor',
			'wp_pm_view_post_permalinks',
			'wp-pl-manager',
			array( $this, 'post_permalinks_page' ),
			'dashicons-admin-links'
		);
		$post_permalinks_hook     = add_submenu_page(
			'wp-pl-manager',
			'Post Types Permalinks',
			'Post Types Permalinks',
			'wp_pm_view_post_permalinks',
			'wp-pl-manager',
			array( $this, 'post_permalinks_page' )
		);
		
		
	}

	public function wp_pm_load_style() {
		wp_enqueue_style(
			'wp-permalink-manager-about-style',
			plugins_url(
				'/assets/css/wp-pl-manager.min.css',
				WP_PERMALINK_MANAGER_FILE
			),
			array(),
			WP_PERMALINK_MANAGER_VERSION
		);
	}

	
	public  function wp_pm_admin_content(){
		$content = '<div class="wrap">
			<h1 class="wp-heading-inline">
				'.__('Thank you for installing Permalink Editor','wp-permalink-manager').' '.WP_PERMALINK_MANAGER_VERSION.'
			</h1>
			
			<hr>
				<div class="kcg_admin_parent_container">
					<div class="kcg_admin_container">
						<h2>'.__('Plugin Interface','wp-permalink-manager').'</h2>
						<p>
						'.__('You can create/edit URL by adding /, - or both at the same time. <br/> Here is a demo screenshot of Permalink Editor.','wp-permalink-manager').'
						</p>
						<img src="'. plugin_dir_url( dirname( __FILE__ ) ).'assets/images/permalink-manager.png'.'" class="plugin_image" alt="">
					</div>
					<div class="kcg_admin_container">
						<h2>
						'.__('Uses Guide','wp-permalink-manager').'
						</h2>
						<p>
							<b>
							'.__('You can change post permalink by the following steps:','wp-permalink-manager').'
							</b>
						</p>
						<ul>
							<li>- '.__('Edit your posts/pages and create SEO friendly custom URL.','wp-permalink-manager').'</li>
							<li>- '.__('In the permalink box insert your desired permalink and update the post.','wp-permalink-manager').'</li>
							<li>- '.__('Preview your post and see the post URL is changed.','wp-permalink-manager').'</li>
							<li>- '.__('If you want to revert to the Wordpress default URL system, just deactivate the plugin.','wp-permalink-manager').'</li>
						</ul>
					</div>
				</div>
			</div>';
			echo  $content;
	}

	public function post_permalinks_page() {
		$this->wp_pm_load_style();
		$this->wp_pm_admin_content();
		
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ), 5 );
		
	}

	public function admin_footer_text() {
		$wp_pm_footer_text = __( 'Permalink Editor version', 'wp-permalink-manager' ) .
		' ' . WP_PERMALINK_MANAGER_VERSION . ' ' .
		__( 'by', 'wp-permalink-manager' ) .
		' <a href="https://kingscrestglobal.com/" target="_blank">' .
			__( 'Team KCG', 'wp-permalink-manager' ) .
		'</a>' .
		' - ' .
		'Visit Us:' .
		' <a href="https://kingscrestglobal.com/" target="_blank">' .
			__( 'Kings Crest Global', 'wp-permalink-manager' ) .
		'</a>';

		return $wp_pm_footer_text;
	}
	
}

new WP_Permalink_Manager_Admin();


