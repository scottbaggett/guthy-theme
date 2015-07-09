<?php
/**
 * Custom functions for the mega menu
 *
 *
 * @package Milkit
 */

/**
 * The markup of the mega menu checkbox.
 */
function milkit_edit_menu_item_settings( $item ) {
	$item_id = esc_attr( $item->ID );
	ob_start();
	?>

	<p class="field-checkbox description description-thin">
		<label for="edit-menu-item-mega-<?php echo esc_attr( $item_id ); ?>">
			<?php _e( 'Make this category a mega menu', 'milkit' ); ?><br />
			<input type="checkbox" id="edit-menu-item-mega-<?php echo esc_attr( $item_id ); ?>" class="edit-menu-item-mega" name="menu-item-mega[<?php echo esc_attr( $item_id ); ?>]"<?php echo esc_attr( get_post_meta( $item_id, '_milkit_menu_item_mega', true ) ); ?> value='Yes' />
		</label>
	</p>

	<?php
	$html = ob_get_clean();
	return $html;
}

/**
 * Add the mega menu checkbox to the edit menu (only if the item is a taxonomy voice).
 */
function milkit_walker_nav_menu_edit_callback() {

	class Milkit_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$desc_snipp = '<div class="menu-item-actions description-wide submitbox">';
			parent::start_el( $output, $item, $depth, $args, $id );

			$pos = strrpos( $output, $desc_snipp );
			if( $pos !== false && 'taxonomy' == $item->type ) {
				$output = substr_replace($output, milkit_edit_menu_item_settings( $item ) . $desc_snipp, $pos, strlen( $desc_snipp ) );
			}
		}

	}

	return 'Milkit_Walker_Nav_Menu_Edit';

}
add_filter( 'wp_edit_nav_menu_walker', 'milkit_walker_nav_menu_edit_callback' );

/**
 * Save the mega menu option.
 */
function milkit_save_custom_menu_param() {
	if ( isset ( $_POST[ 'menu-item-title' ] ) ) {
		foreach ( $_POST[ 'menu-item-title' ] as $item_id=>$value ) {

			$mega_menu_cat = isset( $_POST[ 'menu-item-mega' ] ) ? $_POST[ 'menu-item-mega' ] : '';
			$value = ( isset ( $mega_menu_cat[ $item_id ] ) ) ? 'checked' : '';
			update_post_meta( $item_id, '_milkit_menu_item_mega', $value );

		}
	}
}
add_action( 'wp_update_nav_menu', 'milkit_save_custom_menu_param' );

/**
 * Extend the menu markup. The function creates the mega menu under the category voice.
 */
class Milkit_Walker_Nav_Menu extends Walker_Nav_Menu {

	function end_el( &$output, $item, $depth = 0, $args = array() ) {

		if ( $depth === 0 && 'taxonomy' == $item->type && get_post_meta( $item->ID, '_milkit_menu_item_mega', true ) == 'checked' ) {

			/* this the mega dropdown */
			$dropdown = '<div class="megamenu">';

			/* the currently-queried category */
			$cat = $item->object_id;

			/* display the cat thumbnails */
			$args = array(
				'cat' => $cat,
				'posts_per_page' => 5
			);

			$cat_query = new WP_Query( apply_filters( 'milkit_mega_menu_query', $args ) );

			if ( $cat_query->have_posts() ) {
				$dropdown .= '<ul class="subnav-posts">';
				while ( $cat_query->have_posts() ) {
					$cat_query->the_post();
					global $post;
					$dropdown .= '<li>';

					/* check if has thumbnail */
					if ( has_post_thumbnail() ) {

						$thumb_id = get_post_thumbnail_id();
						$image = wp_get_attachment_image_src( $thumb_id, 'milkit_248x158' );

						/* display a placeholder and load the image with JS (to improve the speed on mobile devices) */
						$dropdown .= '<a href="' . get_permalink() . '" class="menu-item-with-img"><img src="' . esc_url( get_template_directory_uri() ) . '/images/transparent.gif" data-src="' . esc_url( $image[ 0 ] ) . '" alt="' . esc_attr( the_title_attribute (array('echo' => 0) ) ) . '" width="1" data-width="' . esc_attr( $image[ 1 ] ) . '" height="1" data-height="' . esc_attr( $image[ 2 ] ) . '"></a>';

					}
					$dropdown .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
					$dropdown .= '</li>';
				}
				$dropdown .= '</ul>';
			}
			wp_reset_postdata();

			$dropdown .= '</div>';

			$output .= apply_filters( 'milkit_walker_nav_menu_mega', $dropdown, $item, $depth, $args );
		}

		$output .= "</li>\n";

	}

}

/**
 * Add special class to the parent el if it is a category mega menu.
 */
function milkit_add_megamenu_parent_class( $classes, $item ) {

	if ( 'taxonomy' == $item->type && get_post_meta( $item->ID, '_milkit_menu_item_mega', true ) == 'checked' ) {
		$classes[] = 'megamenu-parent';
	}

	return $classes;

}

add_filter( 'nav_menu_css_class', 'milkit_add_megamenu_parent_class', 10, 2 );
