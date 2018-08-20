<?php
/**
 * Custom Navwalker Class
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bulmapress
 *
 * Class Name: bulmapress_navwalker
 * Description: A custom WordPress nav walker class to implement the Bulma navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 0.0.1
 * Author: Scops UG (haftungsbeschränkt)
 * Credit: Based on Bootstrap navwalker from Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/**
 * Bulma-Navwalker
 *
 * @package Bulma-Navwalker
 */
/**
 * Class Name: Navwalker
 * Plugin Name: Bulma Navwalker
 * Plugin URI:  https://github.com/Poruno/Bulma-Navwalker
 * Description: An extended Wordpress Navwalker object that displays Bulma framework's Navbar https://bulma.io/ in Wordpress.
 * Author: Carlo Operio - https://www.linkedin.com/in/carlooperio/, Bulma-Framework
 * Author URI: https://github.com/wp-bootstrap
 * License: GPL-3.0+
 * License URI: https://github.com/Poruno/Bulma-Navwalker/blob/master/LICENSE
 */

class bulmapress_navwalker  extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "<div class='navbar-dropdown is-right'>";
	}
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$liClasses = 'navbar-item '.$item->title;
		$hasChildren = $args->walker->has_children;
		$target ="";
		
		if (!empty($item->target)){
			$target = " target='" . $item->target . "' ";
		}
		$liClasses .= $hasChildren? " has-dropdown is-hoverable": "";
		if($hasChildren){
			$output .= "<div class='".$liClasses."'>";
			$output .= "\n<a class='navbar-link' href='".$item->url."' ". $target .">".$item->title."</a>";
		}
		else {
			$output .= "<a class='".$liClasses."' href='".$item->url."' ". $target  .">".$item->title;
		}
		// Adds has_children class to the item so end_el can determine if the current element has children
		if ( $hasChildren ) {
			$item->classes[] = 'has_children';
		}
	}
	
	public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ){
		if(in_array("has_children", $item->classes)) {
			$output .= "</div>";
		}
		$output .= "</a>";
	}
	public function end_lvl (&$output, $depth = 0, $args = array()) {
		$output .= "</div>";
	}


	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
			return;
		$id_field = $this->db_fields['id'];
        // Display this element.
		if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<li';
			if ( $menu_class )
				$fb_output .= ' class="nav-item"';
			$fb_output .= '>';
			$fb_output .= '<a class="button is-danger is-outlined" href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a>';
			$fb_output .= '</li>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}
