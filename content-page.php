<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Milkit
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( get_option( 'milkit_opt_single_page_layout' ) == 'no-sidebar' ) {
		milkit_post_thumbnail( 'milkit_1330x590' );
		} else {
			milkit_post_thumbnail( 'milkit_886x590' );
		}
	?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'milkit' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php echo milkit_post_author( true ); ?>
		<?php echo milkit_post_date( true ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
