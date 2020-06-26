<?php
/**
 * [Valtenna_Submenu_Walker description]
 */
class Valtenna_Submenu_Walker extends Walker_Nav_Menu{
   public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		// Default class.
		$classes = array( 'sub-menu' );

		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<div class=\"submenu-wrapper\"><ul$class_names>{$n}";
	}

   public function end_lvl( &$output, $depth = 0, $args = null ) {
      if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
         $t = '';
         $n = '';
      } else {
         $t = "\t";
         $n = "\n";
      }
      $indent  = str_repeat( $t, $depth );
      $output .= "$indent</ul></div>{$n}";
   }
}
?>
