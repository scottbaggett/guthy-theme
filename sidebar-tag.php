<?php
/**
 * The sidebar containing the tag widget area.
 *
 * This file is loaded only if we have a specialized
 * sidebar (tag) for the tag template.
 *
 * @package Milkit
 */

if ( ! is_active_sidebar( 'milkit-sidebar-tag' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'milkit-sidebar-tag' ); ?>
</div><!-- #secondary -->
