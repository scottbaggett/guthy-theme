<?php
/**
 * Theme panel functions
 *
 *
 * @package Milkit
 */

/**
 * Register theme panel page.
 */
function milkit_panel_admin() {

	$themename =  "Milkit";

	if ( isset( $_REQUEST[ 'page' ] ) && $_REQUEST[ 'page' ] == 'milkit-theme-panel' ) {
		if ( isset( $_REQUEST[ 'milkit_save_themeoptions' ] ) && 'reset' == $_REQUEST[ 'milkit_save_themeoptions' ] ) {
			$options =  get_option( 'milkit_template_opt' );
			milkit_reset_themeoptions( $options, 'milkit-theme-panel' );
			header( "Location: themes.php?page=milkit-theme-panel&reset=true" );
			die;
		}
	}

	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'milkit-theme-panel', 'milkit_panel_admin_markup' );


}
add_action( 'admin_menu', 'milkit_panel_admin' );

/**
 * Add theme panel shortcut in admin bar.
 */
function milkit_panel_admin_bar_menu() {

	global $wp_admin_bar, $wpdb;

	if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
	// Don't display notification in admin bar if it's disabled or the current user isn't an administrator
		return;
	}

	$wp_admin_bar->add_menu( array( 'id' => 'milkit-theme-panel-bar-shortcut', 'title' => '<span>' . __( 'Theme Options', 'milkit' ) . '</span>', 'href' => get_admin_url() . 'themes.php?page=milkit-theme-panel' ) );

}
add_action( 'admin_bar_menu', 'milkit_panel_admin_bar_menu', 1000 );

/**
 * Enqueue theme panel scripts and styles.
 */
function milkit_panel_admin_scripts() {

	if ( isset( $_REQUEST[ 'page' ] ) && $_REQUEST[ 'page' ] == 'milkit-theme-panel' ) {

		wp_enqueue_style( 'milkit-theme-panel-css', get_template_directory_uri() . '/core/theme-panel/css/panel.css' );
		wp_enqueue_style( 'milkit-theme-panel-fonts', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
		wp_enqueue_style( 'milkit-minicolors-css', get_template_directory_uri() . '/core/theme-panel/lib/minicolors/minicolors.css' );
		wp_enqueue_script( 'milkit-minicolors-js', get_template_directory_uri() . '/core/theme-panel/lib/minicolors/minicolors.min.js', array( 'jquery' ), '20150101', true );
		wp_enqueue_media();
		add_action( 'admin_footer', 'milkit_panel_admin_js' );

	}

}
add_action( 'admin_enqueue_scripts', 'milkit_panel_admin_scripts' );

/**
 * Save default options on theme activation.
 */
function milkit_panel_options_setup() {

	$options = array();
	add_option( 'milkit_panel_opt', $options );

	$template = get_option( 'milkit_template_opt' );
	$saved_options = get_option( 'milkit_panel_opt' );

	foreach ( $template as $option ) {
		if ( $option[ 'type' ] != 'heading' && isset( $option[ 'id' ] ) ) {
			$id = $option[ 'id' ];
			if ( isset( $option[ 'std' ] ) ) {
				$std = $option[ 'std' ];
			}
			$db_option = get_option( $id );
			if ( empty( $db_option ) ) {
				if ( is_array( $option[ 'type' ] ) ) {
					foreach ( $option[ 'type' ] as $child ) {
						$c_id = $child[ 'id' ];
						$c_std = $child[ 'std' ];
						update_option( $c_id, $c_std );
						$options[ $c_id ] = $c_std;
					}
				} else {
					update_option( $id, $std );
					$options[ $id ] = $std;
				}
			}
			else {
				$options[ $id ] = $db_option;
			}
		}
	}
	update_option( 'milkit_panel_opt', $options );
}
if ( is_admin() && isset( $_GET[ 'activated' ] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_head', 'milkit_panel_options_setup' );
}

/**
 * Theme panel markup.
 */
require get_template_directory() . '/core/theme-panel/admin-markup.php';

/**
 * Theme panel default options.
 */
require get_template_directory() . '/core/theme-panel/admin-options.php';

/**
 * Theme panel JS.
 */
require get_template_directory() . '/core/theme-panel/js/admin-js.php';

/**
 * Save theme options.
 */
function milkit_save_theme_options_callback() {

	$save_type = $_POST[ 'type' ];

	if ( $save_type == 'save_options' ) {

		$data = $_POST[ 'data' ];
		parse_str( $data,$output );
		$options = get_option( 'milkit_template_opt' );

		foreach ( $options as $option_array ) {
			$id = $option_array[ 'id' ];
			$old_value = get_option( $id );
			$new_value = '';

			if ( isset( $output[ $id ] ) ) {
				$new_value = $output[ $option_array[ 'id' ] ];
			}

			if ( isset( $option_array[ 'id' ] ) ) {

				$type = $option_array[ 'type' ];

				if ( is_array( $type ) ) {

					foreach ( $type as $array ) {
						if ( $array[ 'type' ] == 'text' ) {
							$id = $array[ 'id' ];
							$std = $array[ 'std' ];
							$new_value = $output[ $id ];

							if ( $new_value == '' ) {
								$new_value = $std;
							}

							update_option( $id, stripslashes( $new_value ) );
						}
					}
				}

				elseif ( $new_value == '' && $type == 'checkbox' ) {
					update_option( $id, 'false' );
				}

				elseif ( $new_value == 'true' && $type == 'checkbox' ) {
					update_option( $id, 'true' );
				}

				else {
					update_option( $id, stripslashes( $new_value ) );
				}
			}
		}
	}

	die();

}
add_action( 'wp_ajax_milkit_save_theme_options', 'milkit_save_theme_options_callback' );

/**
 * Reset theme options.
 */
function milkit_reset_themeoptions( $options, $page = '' ) {

	global $wpdb;
	$query_inner = '';
	$count = 0;

	$excludes = array( 'blogname', 'blogdescription' );

	foreach ( $options as $option ) {

		if ( isset( $option[ 'id' ] ) ) {
			$count++;
			$option_id = $option[ 'id' ];
			$option_type = $option[ 'type' ];

			if ( in_array( $option_id, $excludes ) ) {
				continue;
			}

			if ( $count > 1 ) {
				$query_inner .= ' OR ';
			}

			if ( is_array( $option_type ) ) {
				$type_array_count = 0;
				foreach ( $option_type as $inner_option ) {
					$type_array_count++;
					$option_id = $inner_option[ 'id' ];

					if ( $type_array_count > 1 ) {
						$query_inner .= ' OR ';
					}

					$query_inner .= "option_name = '$option_id'";
				}

			} else {
				$query_inner .= "option_name = '$option_id'";
			}
		}
	}

	if ( $page == 'milkit-theme-panel' ) {
		$query_inner .= " OR option_name = 'milkit_panel_opt'";
	}

	$query = "DELETE FROM $wpdb->options WHERE $query_inner";
	$wpdb->query( $query );

}
