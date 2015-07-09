<?php
/**
 * @package Milkit
 */
?>

<?php
/* Check if the post view count is enabled */
if ( ( get_option( 'milkit_opt_check_post_counter' ) == 'true' ) && ( get_option( 'milkit_opt_single_post_show_views_icon' )  == 'true' ) ) {
	do_action( 'milkit_update_post_views', get_the_ID() );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

	<header class="entry-header">


		<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>

		<?php if ( ! ( get_option( 'milkit_opt_single_post_show_excerpt' ) == 'false' ) && has_excerpt( $post->ID ) ) : ?>
		<div class="short-description" itemprop="description">
			<?php the_excerpt(); ?>
		</div>
		<?php endif; ?>

		<div class="entry-meta">

			<div class="author-date">
				<?php
				$milkit_date_vis_var = ( get_option( 'milkit_opt_single_post_show_date' ) == 'false' ) ? true : false;
				$milkit_author_vis_var = ( get_option( 'milkit_opt_single_post_show_author' ) == 'false' ) ? true : false;
				milkit_post_date( $milkit_date_vis_var );
				milkit_post_author( $milkit_author_vis_var );
				?>
			</div><!-- .author-date -->

			<div class="comments-views">
				<?php if ( ! ( get_option( 'milkit_opt_blog_post_comments_icon' ) == 'false' ) ) {
					milkit_post_comments_count();
				}
				if ( ( get_option( 'milkit_opt_check_post_counter' ) == 'true' ) && ( get_option( 'milkit_opt_blog_post_views_icon' ) == 'true' ) ) {
					do_action( 'milkit_display_post_views', get_the_ID() );
				} ?>
			</div><!-- .comments-views -->


			<meta itemprop="interactionCount" content="UserComments:<?php echo esc_attr( get_comments_number() ); ?>">
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( get_option( 'milkit_opt_single_post_layout' ) == 'no-sidebar' ) {
		milkit_post_thumbnail( 'milkit_1330x590' );
		} else {
			milkit_post_thumbnail( 'milkit_886x590' );
		}
	?>

			<?php sb_tag_list(get_the_ID()); ?>


	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">',
				'after'  => '</div>',
				'next_or_number' => 'next'
			) );
		?>
		<?php
		/**
		 * Show custom gallery.
		 *
		 */
		do_action( 'milkit_custom_gallery', get_the_ID() ); ?>
		<?php
		/**
		 * Show post review.
		 *
		 */
		do_action( 'milkit_post_review', get_the_ID() ); ?>
	</div><!-- .entry-content -->




	<footer class="entry-footer">
		<?php sb_entry_footer(get_the_ID()); ?>
	  <?php if (! get_field('related_topics_sidebar')): ?>
    <?php sb_related_topics(get_the_ID()); ?>
  <?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


