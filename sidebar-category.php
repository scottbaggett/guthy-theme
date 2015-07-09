<?php
/**
 * The sidebar containing the category widget area.
 *
 * This file is loaded only if we have a specialized
 * sidebar (category) for the category template.
 *
 * @package Milkit
 */

if ( ! is_active_sidebar( 'milkit-sidebar-category' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'milkit-sidebar-category' ); ?>
</div><!-- #secondary -->
