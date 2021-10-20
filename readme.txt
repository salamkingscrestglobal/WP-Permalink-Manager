=== WP Permalink Manager ===
Contributors: Team KCG
Tags: permalink, url, link, address, custom, redirect, custom post type, GDPR, GDPR Compliant
Tested up to: 5.8
Stable tag: 0.0.1
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Set WP Permalink Manager on a per-post, per-tag per-page, and per-category basis.

== Description == 

-  This plugin is Developed by Team KCG to change the URL of the post, page, and custom post.
-  This plugin allows you to edit permalink on posts, pages, custom posts.
-  This plugin Do not change the theme default permalink structure
-  You have to edit every post/page manually and edit the permalink.
-  If you Uninstall this plugin. Your post will back to the default permalink.

If you need any custom modification or any other thing contact with https://kingscrestglobal.com/ and mention WP Permalink Manager

== Privacy Policy ==

> This plugin does not collect any user Information
> If you need any custom modification or any other thing contact with https://kingscrestglobal.com/ and mention WP Permalink Manager

== Filters ==

=== Add `PATH_INFO` in `$_SERVER` Variable ===
`
add_filter( 'wp_permalink_manager_path_info', '__return_true' );
`

=== Exclude Permalink  ===

To exclude any Permalink to be processed by the plugin, add the filter that looks like this:

`
function team_kcg_exclude_permalink( $permalink ) {
  if ( false !== strpos( $permalink, 'sitemap.xml' ) ) {
    return '__true';
  }

  return;
}
add_filter( 'wp_permalink_manager_exclude_permalink', 'team_kcg_exclude_permalink' );
`

=== Exclude Post Type ===

To remove Wp Permalink Manager **form** from any post type, add the filter that looks like this:

`
function team_kcg_exclude_post_type( $post_type ) {
  // Replace 'custompost' with your post type name
  if ( 'custompost' === $post_type ) {
    return '__true';
  }

  return '__false';
}
add_filter( 'wp_permalink_manager_exclude_post_type', 'team_kcg_exclude_post_type' );
`

=== Exclude Posts ===

To exclude Wp Permalink Manager **form** from any posts (based on ID, Template, etc), add the filter that looks like this:

`
function team_kcg_exclude_posts( $post ) {
  if ( 1557 === $post->ID ) {
    return true;
  }

  return false;
}
add_filter( 'wp_permalink_manager_exclude_posts', 'team_kcg_exclude_posts' );
`

=== Allow Accents Letters ===

To allow accents letters, please add this on your theme `functions.php`:

`
function team_kcg_allow_caps() {
  return true;
}
add_filter( 'wp_permalink_manager_allow_accents', 'team_kcg_allow_caps' );
`

=== Thanks for the Support ===


== Installation ==

Follow the following step to Install Wp Permalink Manager through wordpress or Manually from FTP.

**From within WordPress**

1. Visit 'Plugins > Add New'
2. Search for Wp Permalink Manager
3. Activate Wp Permalink Manager from your Plugins page.

**Manually**

1. Upload the `wp-permalink-manager` folder to the `/wp-content/plugins/` directory
2. Activate Wp Permalink Manager through the 'Plugins' menu in WordPress

== How To Use ==

You can change the permalink by following the steps.

- Edit your post where you want to edit the permalink. 
- In the permalink box insert your desired permalink and update the post.
- Note: Some time it's can take more time to update with Wp Permalink Manager.
- Preview your post and see your post permalink is changed.


