<?php
/**
 * Custom template tags for this theme.
 *
 *
 * @package MilkIt Theme -- CUSTOM!
 */


/**
 * ACF Field for Showing Related Topics
 * ------------------------------------------------------------------------
 */
if ( ! function_exists( 'sb_related_topics' ) ) :

  function sb_related_topics($post_id) {

    global $post;

    $posts = get_field('related_topics', $post_id);

    if( $posts ): ?>
      <h4 class='widget-title'>Related Topics</h4>
      <div class='related-topics-widget'>
      <?php foreach( $posts as $post): ?>
        <?php setup_postdata($post); ?>
        <?php
          $thumb_id = get_post_thumbnail_id();
          $image = wp_get_attachment_image_src( $thumb_id, 'milkit_886x590' );
        ?>
        <a href="<?php the_permalink(); ?>" class='topic sb-col'>
          <div class="topic-inner">
            <div class='image' style='background: url(<?php echo $image[0]; ?>) 50% 50%; background-size: cover;'></div>
            <div class='label'><?php the_title(); ?></div>
          </div>
        </a>
      <?php endforeach; ?>
      </div>

<?php
      wp_reset_postdata();
      endif;
  }

endif;

function sb_tag_list ($post_id) {
  $tags_list = get_the_tag_list( '', __( ', ', 'milkit' ) );
  if ( $tags_list ) {
    printf( '<div class="tags-links -header"><span>Tagged&nbsp;&nbsp;</span>' . __( '%1$s', 'milkit' ) . '</div>', $tags_list );
  }
}

function sb_entry_footer($post_id) {
  // printf('<h2>whats up</h2>');
}

function sb_entry_header($post_id) {
  sb_tag_list($post_id);
}