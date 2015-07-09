<?php
/**
 * The sidebar containing the home page widget area (left or right).
 *
 *
 * @package Milkit
 */

if ( ! is_active_sidebar( 'milkit-sidebar-home-side' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'milkit-sidebar-home-side' ); ?>
</div><!-- #secondary -->
