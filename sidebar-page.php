<?php
/**
 * The sidebar containing the single page widget area.
 *
 * This file is loaded only if we have a specialized
 * sidebar (page) for the single page template.
 *
 * @package Milkit
 */

if ( ! is_active_sidebar( 'milkit-sidebar-page' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'milkit-sidebar-page' ); ?>
</div><!-- #secondary -->
