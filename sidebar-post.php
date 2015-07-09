<?php
/**
 * The sidebar containing the single post widget area.
 *
 * This file is loaded only if we have a specialized
 * sidebar (post) for the single post template.
 *
 * @package Milkit
 */

if ( ! is_active_sidebar( 'milkit-sidebar-post' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
  <?php if (get_field('related_topics_sidebar')): ?>
    <?php sb_related_topics(get_the_ID()); ?>
  <?php endif; ?>	<?php dynamic_sidebar( 'milkit-sidebar-post' ); ?>

</div><!-- #secondary -->
