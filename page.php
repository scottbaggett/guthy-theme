<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Milkit
 */

get_header(); ?>

	<?php echo milkit_breadcrumbs(); ?>

	<?php milkit_home_slider(); ?>

	<?php
	$milkit_home_layout = ( get_option( 'milkit_opt_home_layout' ) ) ? get_option( 'milkit_opt_home_layout' ) : 'layout1';
	?>

	<?php
	// check if is the home page and if we have the "Page Top Sidebar" enabled
	if ( ( get_option( 'show_on_front' ) === 'page' ) && is_front_page() && ( ( $milkit_home_layout == 'layout6' ) || ( $milkit_home_layout == 'layout7' ) || ( $milkit_home_layout == 'layout8' ) || ( $milkit_home_layout == 'layout9' ) ) ) : ?>

	<div id="home-top-area">
		<?php dynamic_sidebar( 'milkit-sidebar-home-top' ); ?>
	</div>

	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-page" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( ( get_option( 'show_on_front' ) === 'page' ) && is_front_page() && ( get_option( 'milkit_opt_use_widgets_home' ) == 'true' ) ) : ?>

					<?php get_template_part( 'page', 'widgets' ); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php if ( get_option( 'milkit_opt_page_disable_comments' ) != 'true' ) : ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endif; ?>

				<?php endif; ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	// check if is the home page and if we have the "Page Sidebar" enabled
	if ( ( get_option( 'show_on_front' ) === 'page' ) && is_front_page() && ( $milkit_home_layout != 'layout1' ) ) : ?>

		<?php get_sidebar( 'home' ); ?>

	<?php elseif ( !is_front_page() && !( get_option( 'milkit_opt_single_page_layout' ) == 'no-sidebar' ) ) :

		$milkit_sidebar_type = ( get_option( 'milkit_opt_page_sidebar' ) ) ? get_option( 'milkit_opt_page_sidebar' ) : 'blog';
		get_sidebar( $milkit_sidebar_type );

	endif; ?>

	<?php
	// check if is the home page and if we have the "Page Bottom Sidebar" enabled
	if ( ( get_option( 'show_on_front' ) === 'page' ) && is_front_page() &&  ( ( $milkit_home_layout == 'layout4' ) || ( $milkit_home_layout == 'layout5' ) || ( $milkit_home_layout == 'layout8' ) || ( $milkit_home_layout == 'layout9' ) ) ) : ?>

	<div id="home-bottom-area">
		<?php dynamic_sidebar( 'milkit-sidebar-home-bottom' ); ?>
	</div>

	<?php endif; ?>

<?php get_footer(); ?>
