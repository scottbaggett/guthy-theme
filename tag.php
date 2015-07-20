<?php
/**
 * The template for displaying tag pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Milkit
 */

get_header(); ?>

	<?php echo milkit_breadcrumbs(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class='category-title'><?php single_cat_title(); ?></h1>
		<div class="category-share">
			<?php echo sharify_display_button_buttons(); ?>
		</div>

			</header><!-- .page-header -->

			<div class="post-modules">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/**
					 * If you want to overload this in a child theme then include a file
					 * called content-tag.php and that will be used instead.
					 */
					get_template_part( 'content', 'tag' );
				?>

			<?php endwhile; ?>

			</div><!-- .post-modules -->

			<?php milkit_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php /* Don't display the sidebar if the option is not selected */ ?>
<?php
if ( ! ( get_option( 'milkit_opt_tag_layout' ) == 'no-sidebar' ) ) {
	$milkit_sidebar_type = ( get_option( 'milkit_opt_tag_sidebar' ) ) ? get_option( 'milkit_opt_tag_sidebar' ) : 'blog';
	get_sidebar( $milkit_sidebar_type );
}
?>
<?php get_footer(); ?>
