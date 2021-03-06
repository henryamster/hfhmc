<?php
/**
 * Navigation Functions
 *
 * @package Bulmapress
 */

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'menu-1' => esc_html__( 'Primary', 'bulmapress' ),
	) );

// Bulmapress navigation
function bulmapress_navigation()
{
	wp_nav_menu( array(
		'theme_location'    => 'menu-1',
		'depth'             => 2,
		'container'         => 'div id="navigation"',
		'menu_class'        => 'navbar-end is-uppercase has-text-weight-semibold',
		'fallback_cb'       => 'bulmapress_navwalker::fallback',
		'walker'            => new bulmapress_navwalker()
		)
	);
}
