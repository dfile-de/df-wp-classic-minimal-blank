<?php
//backend styles
if ( ! function_exists( 'df_blank_support' ) ) :
	//eets up theme defaults and registers support for various WordPress features.
	function df_blank_support() {
		//add support for block styles.
		//add_theme_support( 'wp-block-styles' );

		//enqueue editor styles.
		$editorstyle=get_template_directory_uri() . '/css/main.css';
		add_editor_style($editorstyle);

		//allow svg upload
		function allow_svg_upload($mimes) {
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}
		add_filter('upload_mimes', 'allow_svg_upload');

	}
endif;
add_action( 'after_setup_theme', 'df_blank_support' );

//backend scripts
function my_custom_admin_scripts() {
	// register the script
	wp_register_script(
			'my-custom-script',
			get_template_directory_uri() . '/js/custom-script.js', // path to the script
			array('jquery'), // dependencies
			null, // version (null for no version)
			true // load in footer
	);

	// Enqueue the script
	wp_enqueue_script('my-custom-script');
}
add_action('admin_enqueue_scripts', 'my_custom_admin_scripts');

// ######################################################
// ######################################################

//theme stylesheet and scrips
if ( ! function_exists( 'df_blank_styles_scripts' ) ) :
	// enqueue styles.
	function df_blank_styles_scripts() {
		// register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style(
			'df_blank-style',
			get_template_directory_uri() . '/css/main.css',
			array(),
			$version_string
		);

		wp_enqueue_script(
			'df_blank-script',
			get_template_directory_uri() . '/js/main.js',
			array(),
			$version_string,
			array(
			'strategy'  => 'defer',
			)
			);
	}
	
endif;
add_action( 'wp_enqueue_scripts', 'df_blank_styles_scripts' );
// ######################################################
//disable wp rest api
add_filter('rest_authentication_errors', function($result) {
	if (!is_user_logged_in()) {
		$message = apply_filters('disable_wp_rest_api_error', __('REST API restricted to authenticated users.', 'disable-wp-rest-api'));
		return new WP_Error('rest_login_required', $message, array('status' => rest_authorization_required_code()));
	}
});
// ######################################################
// Add block patterns
//require get_template_directory() . '/inc/block-patterns.php';
// ######################################################
//clean wp head
require get_template_directory() . '/inc/clean_wp_head.php';
require get_template_directory() . '/inc/remove_emoji.php';
require get_template_directory() . '/inc/remove_gb_block_library.php';
// ######################################################
//custom post types
require get_template_directory() . '/inc/custom_post_types.php';
//custom meta box
require get_template_directory() . '/inc/custom_meta_box.php'; 
// ######################################################