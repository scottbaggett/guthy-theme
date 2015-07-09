<?php
/**
 * @package Milkit
 */
?>

<?php
$milkit_post_module_cols = ( get_option( 'milkit_opt_tag_post_columns' ) ) ? get_option( 'milkit_opt_tag_post_columns' ) : 'post-module-1cols';

$milkit_post_module_classes = array(
	'post-module',
	$milkit_post_module_cols
);
$milkit_post_module_classes = array_map( 'esc_attr', $milkit_post_module_classes );
?>

<article <?php post_class( $milkit_post_module_classes ); ?> itemscope="itemscope" itemtype="http://schema.org/Article">
	<?php /* Display thumb only if enabled, according to the width of the content area */ ?>
	<?php if ( ! ( get_option( 'milkit_opt_tag_post_thumbnail' ) == 'false' ) ) {

		$milkit_post_thumb_size = 'milkit_1330x590';

		/* layout without sidebar */
		if ( get_option( 'milkit_opt_tag_layout' ) == 'no-sidebar' ) {

			switch ( $milkit_post_module_cols ) {
				case 'post-module-2cols':
					$milkit_post_thumb_size = 'milkit_650x433';
					break;

				case 'post-module-3cols':
				case 'post-module-4cols':
				case 'post-module-5cols':
					$milkit_post_thumb_size = 'milkit_440x293';
					break;
			}

		/* layout with sidebar */
		} else {

			switch ( $milkit_post_module_cols ) {
				case 'post-module-1cols':
					$milkit_post_thumb_size = 'milkit_886x590';
					break;

				case 'post-module-2cols':
				case 'post-module-3cols':
				case 'post-module-4cols':
				case 'post-module-5cols':
					$milkit_post_thumb_size = 'milkit_440x293';
					break;
			}

		}

		milkit_post_thumbnail( $milkit_post_thumb_size );

	} ?>

	<div class="post-module-content">
	
		<header class="entry-header">
			<?php /* Display category icon only if enabled */ ?>
			<?php if ( ! ( get_option( 'milkit_opt_tag_post_cat_icon' ) == 'false' ) ) {
				milkit_entry_cats();
			} ?>
			<?php the_title( sprintf( '<h2 itemprop="name" class="entry-title"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		
		<?php if ( get_option( 'milkit_opt_tag_post_excerpt' ) != 'nothing' ) : ?>
		
		<?php /* Display excerpt only if enabled, default false */ ?>
		<?php if ( get_option( 'milkit_opt_tag_post_excerpt' ) == 'excerpt' ) : ?>

		<div class="entry-summary" itemprop="text">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<?php else : ?>

		<div class="entry-content" itemprop="text">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'milkit' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'milkit' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php endif; ?>

		<footer class="entry-footer">
			<meta itemprop="interactionCount" content="UserComments:<?php echo esc_attr( get_comments_number() ); ?>">
			<div class="author-date">
				<?php
				$milkit_date_vis_var = ( get_option( 'milkit_opt_tag_post_date' ) == 'false' ) ? true : false;
				$milkit_author_vis_var = ( get_option( 'milkit_opt_tag_post_author' ) == 'false' ) ? true : false;
				milkit_post_date( $milkit_date_vis_var );
				milkit_post_author( $milkit_author_vis_var );
				?>
			</div><!-- .author-date -->
			<div class="comments-views">
				<?php if ( ! ( get_option( 'milkit_opt_tag_post_comments_icon' ) == 'false' ) ) {
					milkit_post_comments_count();
				}
				if ( ( get_option( 'milkit_opt_check_post_counter' ) == 'true' ) && ( get_option( 'milkit_opt_tag_post_views_icon' ) == 'true' ) ) {
					do_action( 'milkit_display_post_views', get_the_ID() );
				} ?>
			</div><!-- .comments-views -->
			<?php if ( ! ( get_option( 'milkit_opt_tag_post_review_icon' ) == 'false' ) ) {
				do_action( 'milkit_display_post_review_score', get_the_ID() );
			} ?>
		</footer><!-- .entry-footer -->

	</div><!-- .post-module-content -->
</article><!-- #post-## -->
