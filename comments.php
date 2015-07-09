<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Milkit
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', 'milkit' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'short_ping'  => true,
					'avatar_size' => 40,
					'callback' => 'milkit_comment'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'milkit' ); ?></h3>
			<span class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'milkit' ) ); ?></span>
			<span class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'milkit' ) ); ?></span>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'milkit' ); ?></p>
	<?php endif; ?>

	<?php
	$milkit_comments_args = array(
		'title_reply' => __( 'Join the discussion', 'milkit' ),
		'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'milkit' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" placeholder="' . __( 'Comment', 'milkit' ) . '"></textarea></p>',
		'comment_notes_after' => ''
	);
	?>

	<?php comment_form( $milkit_comments_args ); ?>

</div><!-- #comments -->
