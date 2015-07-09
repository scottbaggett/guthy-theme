<?php
/**
 * The sidebar containing the blog/main widget area.
 *
 * @package Milkit
 */

if ( ! is_active_sidebar( 'milkit-sidebar-blog' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'milkit-sidebar-blog' ); ?>
</div><!-- #secondary -->
