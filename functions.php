<?php
/**
 * Bulmapress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bulmapress
 */



require get_template_directory() . '/functions/bulmapress_navwalker.php';
require get_template_directory() . '/functions/bulmapress_helpers.php';
require get_template_directory() . '/functions/bulmapress_custom_query.php';

if ( ! function_exists( 'bulmapress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bulmapress_setup() {
	require get_template_directory() . '/functions/base.php';
	require get_template_directory() . '/functions/post-thumbnails.php';
	require get_template_directory() . '/functions/navigation.php';
	require get_template_directory() . '/functions/content.php';
	require get_template_directory() . '/functions/pagination.php';
	require get_template_directory() . '/functions/widgets.php';
	require get_template_directory() . '/functions/search.php';
	require get_template_directory() . '/functions/scripts-styles.php';
}
endif;
add_action( 'after_setup_theme', 'bulmapress_setup' );

require get_template_directory() . '/functions/template-tags.php';
require get_template_directory() . '/functions/extras.php';
require get_template_directory() . '/functions/customizer.php';
require get_template_directory() . '/functions/jetpack.php';

  
function wpb_adding_scripts() {
wp_register_script('signup', get_template_directory_uri() . '/frontend/js/signup.js', array('jquery'),'1.1', true);
wp_enqueue_script('signup');
}
  
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  

function bulmapress_retrieve_last_post() {
	$args = array( 'numberposts' => '1' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		return '<a class="has-text-link" href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a>  ';
	}
	wp_reset_query();
}
add_shortcode( 'retrieve_last_post', 'bulmapress_retrieve_last_post' );
	
