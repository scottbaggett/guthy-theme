<?php
/**
 * Custom functions for the sidebars
 *
 *
 * @package Milkit
 */

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function milkit_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'milkit' ),
		'id'            => 'milkit-sidebar-blog',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	$home_layout = ( get_option( 'milkit_opt_home_layout' ) ) ? get_option( 'milkit_opt_home_layout' ) : 'layout1';

	if ( ( $home_layout == 'layout6' ) || ( $home_layout == 'layout7' ) || ( $home_layout == 'layout8' ) || ( $home_layout == 'layout9' ) ) {

		register_sidebar( array(
			'name'          => __( 'Home Top Widgets', 'milkit' ),
			'id'            => 'milkit-sidebar-home-top',
			'description'   => __( 'Use this sidebar only with the "Milkit Post Modules" widgets.', 'milkit' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	if ( get_option( 'milkit_opt_use_widgets_home' ) == 'true' ) {

		register_sidebar( array(
			'name'          => __( 'Home Content Widgets', 'milkit' ),
			'id'            => 'milkit-sidebar-home-content',
			'description'   => __( 'Use this sidebar only with the "Milkit Post Modules" widgets.', 'milkit' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	if ( $home_layout != 'layout1' ) {

		register_sidebar( array(
			'name'          => __( 'Home Sidebar Widgets', 'milkit' ),
			'id'            => 'milkit-sidebar-home-side',
			'description'   => __( 'Use this sidebar with the "Milkit Post Modules" widgets.', 'milkit' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	if ( ( $home_layout == 'layout4' ) || ( $home_layout == 'layout5' ) || ( $home_layout == 'layout8' ) || ( $home_layout == 'layout9' ) ) {

		register_sidebar( array(
			'name'          => __( 'Home Bottom Widgets', 'milkit' ),
			'id'            => 'milkit-sidebar-home-bottom',
			'description'   => __( 'Use this sidebar only with the "Milkit Post Modules" widgets.', 'milkit' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	if ( get_option( 'milkit_opt_category_sidebar' ) == 'category' ) {

		register_sidebar( array(
			'name'          => __( 'Category Sidebar', 'milkit' ),
			'id'            => 'milkit-sidebar-category',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	if ( get_option( 'milkit_opt_tag_sidebar' ) == 'tag' ) {
		
		register_sidebar( array(
			'name'          => __( 'Tag Sidebar', 'milkit' ),
			'id'            => 'milkit-sidebar-tag',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	if ( get_option( 'milkit_opt_post_sidebar' ) == 'post' ) {
		
		register_sidebar( array(
			'name'          => __( 'Post Sidebar', 'milkit' ),
			'id'            => 'milkit-sidebar-post',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

	if ( get_option( 'milkit_opt_page_sidebar' ) == 'page' ) {
		
		register_sidebar( array(
			'name'          => __( 'Page Sidebar', 'milkit' ),
			'id'            => 'milkit-sidebar-page',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

	}

}
add_action( 'widgets_init', 'milkit_widgets_init' );
