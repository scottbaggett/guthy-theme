<?php
/**
 * @package Milkit
 */


if ( ! function_exists( 'milkit_print_custom_styles' ) ) :
	/**
	 * Prints custom styles retrieved from the theme panel.
	 */
	function milkit_print_custom_styles() { ?>

		<style type="text/css" media="screen">


		body,
		button,
		input,
		select,
		textarea {
			font-family: <?php echo esc_attr( get_option( 'milkit_opt_site_font' ) );?>;
		}

		<?php echo stripslashes( get_option( 'milkit_opt_custom_css' ) ); ?>

		</style>

	<?php }
endif;
add_action( 'wp_head', 'milkit_print_custom_styles' );
