<?php
/**
 * The sidebar containing the main widget area.
 * A fallback sidebar.php for external plugins, because
 * the theme uses only specialized sidebars (sidebar-blog.php, etc).
 *
 * This file is not loaded by the theme!!!
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
