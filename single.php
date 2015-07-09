<?php
/**
 * The template for displaying all single posts.
 *
 * @package Milkit
 */

get_header(); ?>

	<?php //echo milkit_entry_cats(); ?>
	<?php echo milkit_breadcrumbs(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-page" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php
				// Check if the author bio is enabled
				if ( get_option( 'milkit_opt_single_post_show_author_bio' ) == 'true' ) {
					milkit_post_author_bio();
				}
			?>

			<?php
				// Check if the post navigation is enabled
				if ( get_option( 'milkit_opt_single_post_show_post_nav' ) == 'true' ) {
					milkit_post_nav();
				}
			?>

			<?php
			/**
			 * Related posts plugins can hook into here.
			 *
			 */
			do_action( 'milkit_post_related_hook' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php /* Don't display the sidebar if the option is not selected */ ?>
<?php
if ( ! ( get_option( 'milkit_opt_single_post_layout' ) == 'no-sidebar' ) ) {
	$milkit_sidebar_type = ( get_option( 'milkit_opt_post_sidebar' ) ) ? get_option( 'milkit_opt_post_sidebar' ) : 'blog';
	get_sidebar( $milkit_sidebar_type );
}
?>

<?php get_footer(); ?>
