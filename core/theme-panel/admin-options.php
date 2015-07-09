<?php
/**
 * Theme panel options
 *
 *
 * @package Milkit
 */

/**
 * Theme fonts.
 */
require get_template_directory() . '/core/theme-panel/theme-fonts.php';

/**
 * Theme panel default options.
 */
function milkit_default_options() {
	
	global $milkit_web_fonts;
	global $milkit_google_fonts;

	$shortname = "milkit_opt_";
	$images_url = get_template_directory_uri() . '/core/theme-panel/images/';

	/* initialize array */
	$default_options = array();

	/* General Settings */
	$default_options[] = array( 
		'name' => __( 'General settings', 'milkit' ),
		'icon' => 'fa fa-gears',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Custom logo', 'milkit'),
		'desc' => __( 'Upload a custom logo for the website.', 'milkit' ),
		'id' => $shortname . 'logo',
		'std' => '',
		'type' => 'upload'
	);

	$default_options[] = array( 
		'name' => '',
		'desc' => '',
		'id' => $shortname . 'logo_w',
		'std' => '',
		'type' => 'hidden'
	);

	$default_options[] = array( 
		'name' => '',
		'desc' => '',
		'id' => $shortname . 'logo_h',
		'std' => '',
		'type' => 'hidden'
	);

	$default_options[] = array( 
		'name' => __( 'Custom logo retina', 'milkit'),
		'desc' => __( 'Upload a double-sized logo for retina displays.', 'milkit' ),
		'id' => $shortname . 'logo_retina',
		'std' => '',
		'type' => 'upload'
	);

	$default_options[] = array( 
		'name' => '',
		'desc' => '',
		'id' => $shortname . 'logo_retina_w',
		'std' => '',
		'type' => 'hidden'
	);

	$default_options[] = array( 
		'name' => '',
		'desc' => '',
		'id' => $shortname . 'logo_retina_h',
		'std' => '',
		'type' => 'hidden'
	);

	$default_options[] = array( 
		'name' => __( 'Custom favicon', 'milkit' ),
		'desc' => __( 'Upload a custom favicon for the website (16x16px or 32x32px PNG/GIF).', 'milkit' ),
		'id' => $shortname . 'custom_favicon',
		'std' => '',
		'type' => 'upload'
	);

	$default_options[] = array( 
		'name' => __( 'Enable responsive', 'milkit' ),
		'desc' => __( 'Check this to enable the responsive layout.', 'milkit' ),
		'id' => $shortname . 'check_responsive',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Show breadcrumbs', 'milkit' ),
		'desc' => __( 'Check this to show the breadcrumbs.', 'milkit' ),
		'id' => $shortname . 'show_breadcrumbs',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Enable post views', 'milkit' ),
		'desc' => __( 'Check this to enable the count of the views.', 'milkit' ),
		'id' => $shortname . 'check_post_counter',
		'std' => 'true',
		'type' => 'checkbox'
	);

	/* Header Settings */
	$default_options[] = array( 
		'name' => __( 'Header settings', 'milkit' ),
		'icon' => 'fa fa-header',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Header layout', 'milkit' ),
		'desc' => __( 'Select the layout of the header area.', 'milkit' ),
		'id' => $shortname . 'header_layout',
		'std' => 'default-header',
		'type' => 'select',
		'options' => array(
			'default-header',
			'header-center'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Enable sticky header', 'milkit' ),
		'desc' => __( 'Check this to enable the sticky header feature.', 'milkit' ),
		'id' => $shortname . 'check_sticky_header',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Site info', 'milkit' ),
		'desc' => __( 'You can write a little description of your website here.', 'milkit' ),
		'id' => $shortname . 'site_info',
		'std' => '',
		'type' => 'textarea'
	);

	$default_options[] = array( 
		'name' => __( 'Display search in the site\'s header', 'milkit' ),
		'desc' => __( 'Check this to display the search field in the site\'s header.', 'milkit' ),
		'id' => $shortname . 'show_header_search',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Display social accounts', 'milkit'),
		'desc' => __( 'Check this to display the social accounts in the site\'s header.', 'milkit' ),
		'id' => $shortname . 'check_social_header',
		'std' => 'false',
		'type' => 'checkbox'
	);

	/* Footer Settings */
	$default_options[] = array( 
		'name' => __( 'Footer settings', 'milkit' ),
		'icon' => 'fa fa-th-large',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Footer text', 'milkit' ),
		'desc' => __( 'You can write the copyright text here.', 'milkit' ),
		'id' => $shortname . 'footer_text',
		'std' => '',
		'type' => 'textarea'
	);

	$default_options[] = array( 
		'name' => __( 'Display social accounts', 'milkit'),
		'desc' => __( 'Check this to display the social accounts in the footer area.', 'milkit' ),
		'id' => $shortname . 'check_social_footer',
		'std' => 'false',
		'class' => 'subsection-handler',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'id' => $shortname . 'check_social_footer_h',
		'type' => 'subsection-open'
	);

		$default_options[] = array( 
			'name' => __( 'Social icons label', 'milkit' ),
			'desc' => __( '"Follow us", etc.', 'milkit' ),
			'id' => $shortname . 'footer_social_label',
			'std' => '',
			'type' => 'text'
		);

	$default_options[] = array( 
		'id' => $shortname . 'check_social_footer_h',
		'type' => 'subsection-close'
	);

	/* Blog Settings */
	$default_options[] = array( 
		'name' => __( 'Blog settings', 'milkit' ),
		'icon' => 'fa fa-rss',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => '',
		'message' => __( 'Here you can select the options of the blog page, the archive page, the author page and the search results page.', 'milkit' ),
		'type' => 'section-description'
	);

	$default_options[] = array( 
		'name' => __( 'Blog layout', 'milkit' ),
		'desc' => __( 'Select the layout of the blog page.', 'milkit' ),
		'id' => $shortname . 'blog_layout',
		'std' => 'right-sidebar',
		'type' => 'radio-images',
		'options' => array(
			'no-sidebar' => $images_url . 'layout1.png',
			'right-sidebar' => $images_url . 'layout2.png',
			'left-sidebar' => $images_url . 'layout3.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post columns', 'milkit' ),
		'desc' => __( 'Select the number of columns per row.', 'milkit' ),
		'id' => $shortname . 'blog_post_columns',
		'std' => 'post-module-1cols',
		'type' => 'radio-images',
		'options' => array(
			'post-module-1cols' => $images_url . 'post1.png',
			'post-module-2cols' => $images_url . 'post2.png',
			'post-module-3cols' => $images_url . 'post3.png',
			'post-module-4cols' => $images_url . 'post4.png',
			'post-module-5cols' => $images_url . 'post5.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post thumbnail', 'milkit' ),
		'desc' => __( 'Check this to display the post thumbnail.', 'milkit' ),
		'id' => $shortname . 'blog_post_thumbnail',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post excerpt', 'milkit' ),
		'desc' => __( 'Check this to display the post excerpt. If you uncheck this option the regular content is shown and you will need to insert the read more tag to split the content.', 'milkit' ),
		'id' => $shortname . 'blog_post_excerpt',
		'std' => '',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post category icon', 'milkit' ),
		'desc' => __( 'Check this to display the category icon.', 'milkit' ),
		'id' => $shortname . 'blog_post_cat_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post author', 'milkit' ),
		'desc' => __( 'Check this to display the name of the author.', 'milkit' ),
		'id' => $shortname . 'blog_post_author',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post date', 'milkit' ),
		'desc' => __( 'Check this to display the date of the post.', 'milkit' ),
		'id' => $shortname . 'blog_post_date',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post comment icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the comments.', 'milkit' ),
		'id' => $shortname . 'blog_post_comments_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post views icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the views (you also need to enable the counter in "General Settings").', 'milkit' ),
		'id' => $shortname . 'blog_post_views_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post review icon', 'milkit' ),
		'desc' => __( 'If the post is a review, you can display the score with this option.', 'milkit' ),
		'id' => $shortname . 'blog_post_review_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	/* Home Settings */
	$default_options[] = array( 
		'name' => __( 'Home settings', 'milkit' ),
		'icon' => 'fa fa-home',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Home layout', 'milkit' ),
		'desc' => __( 'Select the layout of the home page (C = page content, W= widget area). Please note that you need to select a page in "Settings > Reading > Front Page" to enable this option.', 'milkit' ),
		'id' => $shortname . 'home_layout',
		'std' => 'layout8',
		'type' => 'radio-images',
		'options' => array(
			'layout1' => $images_url . 'home_layout1.png',
			'layout2' => $images_url . 'home_layout2.png',
			'layout3' => $images_url . 'home_layout3.png',
			'layout4' => $images_url . 'home_layout4.png',
			'layout5' => $images_url . 'home_layout5.png',
			'layout6' => $images_url . 'home_layout6.png',
			'layout7' => $images_url . 'home_layout7.png',
			'layout8' => $images_url . 'home_layout8.png',
			'layout9' => $images_url . 'home_layout9.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Use widgets in content area', 'milkit' ),
		'desc' => __( 'Checking this option you will have a new widget area ("Home Content Widgets") and it will replace the default content area (the text inserted in the WP editor = C) of the home page. In this way you will able to create an home page using only widgets.', 'milkit' ),
		'id' => $shortname . 'use_widgets_home',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Show slider in home', 'ziggy' ),
		'desc' => __( 'Check this to display a slider in the home page (you need to check the "Use for slider in homepage?" option in some posts.', 'ziggy' ),
		'id' => $shortname . 'show_slider',
		'std' => 'false',
		'type' => 'checkbox'
	);

	/* Page Settings */
	$default_options[] = array( 
		'name' => __( 'Page settings', 'milkit' ),
		'icon' => 'fa fa-file-powerpoint-o',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Page layout', 'milkit' ),
		'desc' => __( 'Select the layout of the page.', 'milkit' ),
		'id' => $shortname . 'single_page_layout',
		'std' => 'right-sidebar',
		'type' => 'radio-images',
		'options' => array(
			'no-sidebar' => $images_url . 'layout1.png',
			'right-sidebar' => $images_url . 'layout2.png',
			'left-sidebar' => $images_url . 'layout3.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Sidebar', 'milkit' ),
		'desc' => __( 'Select the sidebar visible in this page.', 'milkit' ),
		'id' => $shortname . 'page_sidebar',
		'std' => 'blog',
		'type' => 'select',
		'options' => array(
			'blog',
			'page'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Disable comments', 'milkit' ),
		'desc' => __( 'Check this to disable the comment section on all pages.', 'milkit' ),
		'id' => $shortname . 'page_disable_comments',
		'std' => '',
		'type' => 'checkbox'
	);

	/* Category Settings */
	$default_options[] = array( 
		'name' => __( 'Category settings', 'milkit' ),
		'icon' => 'fa fa-tags',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Category layout', 'milkit' ),
		'desc' => __( 'Select the layout of the category page.', 'milkit' ),
		'id' => $shortname . 'category_layout',
		'std' => 'right-sidebar',
		'type' => 'radio-images',
		'options' => array(
			'no-sidebar' => $images_url . 'layout1.png',
			'right-sidebar' => $images_url . 'layout2.png',
			'left-sidebar' => $images_url . 'layout3.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post columns', 'milkit' ),
		'desc' => __( 'Select the number of columns per row.', 'milkit' ),
		'id' => $shortname . 'category_post_columns',
		'std' => 'post-module-1col',
		'type' => 'radio-images',
		'options' => array(
			'post-module-1cols' => $images_url . 'post1.png',
			'post-module-2cols' => $images_url . 'post2.png',
			'post-module-3cols' => $images_url . 'post3.png',
			'post-module-4cols' => $images_url . 'post4.png',
			'post-module-5cols' => $images_url . 'post5.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Sidebar', 'milkit' ),
		'desc' => __( 'Select the sidebar visible in this page.', 'milkit' ),
		'id' => $shortname . 'category_sidebar',
		'std' => 'blog',
		'type' => 'select',
		'options' => array(
			'blog',
			'category'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post thumbnail', 'milkit' ),
		'desc' => __( 'Check this to display the post thumbnail.', 'milkit' ),
		'id' => $shortname . 'category_post_thumbnail',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post excerpt', 'milkit' ),
		'desc' => __( 'With this option you can control the content of the post.', 'milkit' ),
		'id' => $shortname . 'category_post_excerpt',
		'std' => 'content',
		'type' => 'select',
		'options' => array(
			'content',
			'excerpt',
			'nothing'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post category icon', 'milkit' ),
		'desc' => __( 'Check this to display the category icon.', 'milkit' ),
		'id' => $shortname . 'category_post_cat_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post author', 'milkit' ),
		'desc' => __( 'Check this to display the name of the author.', 'milkit' ),
		'id' => $shortname . 'category_post_author',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post date', 'milkit' ),
		'desc' => __( 'Check this to display the date of the post.', 'milkit' ),
		'id' => $shortname . 'category_post_date',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post comment icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the comments.', 'milkit' ),
		'id' => $shortname . 'category_post_comments_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post views icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the views (you also need to enable the counter in "General Settings").', 'milkit' ),
		'id' => $shortname . 'category_post_views_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post review icon', 'milkit' ),
		'desc' => __( 'If the post is a review, you can display the score with this option.', 'milkit' ),
		'id' => $shortname . 'category_post_review_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	/* Tag Settings */
	$default_options[] = array( 
		'name' => __( 'Tag settings', 'milkit' ),
		'icon' => 'fa fa-tag',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Tags layout', 'milkit' ),
		'desc' => __( 'Select the layout of the tag page.', 'milkit' ),
		'id' => $shortname . 'tag_layout',
		'std' => 'right-sidebar',
		'type' => 'radio-images',
		'options' => array(
			'no-sidebar' => $images_url . 'layout1.png',
			'right-sidebar' => $images_url . 'layout2.png',
			'left-sidebar' => $images_url . 'layout3.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post columns', 'milkit' ),
		'desc' => __( 'Select the number of columns per row.', 'milkit' ),
		'id' => $shortname . 'tag_post_columns',
		'std' => 'post-module-1cols',
		'type' => 'radio-images',
		'options' => array(
			'post-module-1cols' => $images_url . 'post1.png',
			'post-module-2cols' => $images_url . 'post2.png',
			'post-module-3cols' => $images_url . 'post3.png',
			'post-module-4cols' => $images_url . 'post4.png',
			'post-module-5cols' => $images_url . 'post5.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Sidebar', 'milkit' ),
		'desc' => __( 'Select the sidebar visible in this page.', 'milkit' ),
		'id' => $shortname . 'tag_sidebar',
		'std' => 'blog',
		'type' => 'select',
		'options' => array(
			'blog',
			'tag'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post thumbnail', 'milkit' ),
		'desc' => __( 'Check this to display the post thumbnail.', 'milkit' ),
		'id' => $shortname . 'tag_post_thumbnail',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post excerpt', 'milkit' ),
		'desc' => __( 'With this option you can control the content of the post.', 'milkit' ),
		'id' => $shortname . 'tag_post_excerpt',
		'std' => 'content',
		'type' => 'select',
		'options' => array(
			'content',
			'excerpt',
			'nothing'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post category icon', 'milkit' ),
		'desc' => __( 'Check this to display the category icon.', 'milkit' ),
		'id' => $shortname . 'tag_post_cat_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post author', 'milkit' ),
		'desc' => __( 'Check this to display the name of the author.', 'milkit' ),
		'id' => $shortname . 'tag_post_author',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post date', 'milkit' ),
		'desc' => __( 'Check this to display the date of the post.', 'milkit' ),
		'id' => $shortname . 'tag_post_date',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post comment icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the comments.', 'milkit' ),
		'id' => $shortname . 'tag_post_comments_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post views icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the views (you also need to enable the counter in "General Settings").', 'milkit' ),
		'id' => $shortname . 'tag_post_views_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post review icon', 'milkit' ),
		'desc' => __( 'If the post is a review, you can display the score with this option.', 'milkit' ),
		'id' => $shortname . 'tag_post_review_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	/* Post Settings */
	$default_options[] = array( 
		'name' => __( 'Post settings', 'milkit' ),
		'icon' => 'fa fa-pencil',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Post layout', 'milkit' ),
		'desc' => __( 'Select the layout of the post page.', 'milkit' ),
		'id' => $shortname . 'single_post_layout',
		'std' => 'right-sidebar',
		'type' => 'radio-images',
		'options' => array(
			'no-sidebar' => $images_url . 'layout1.png',
			'right-sidebar' => $images_url . 'layout2.png',
			'left-sidebar' => $images_url . 'layout3.png'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Sidebar', 'milkit' ),
		'desc' => __( 'Select the sidebar visible in this page.', 'milkit' ),
		'id' => $shortname . 'post_sidebar',
		'std' => 'blog',
		'type' => 'select',
		'options' => array(
			'blog',
			'post'
		)
	);

	$default_options[] = array( 
		'name' => __( 'Post excerpt', 'milkit' ),
		'desc' => __( 'Check this to display the excerpt of the article after the title.', 'milkit' ),
		'id' => $shortname . 'single_post_show_excerpt',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post author', 'milkit' ),
		'desc' => __( 'Check this to display the name of the author.', 'milkit' ),
		'id' => $shortname . 'single_post_show_author',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post date', 'milkit' ),
		'desc' => __( 'Check this to display the date of the post.', 'milkit' ),
		'id' => $shortname . 'single_post_show_date',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post comment icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the comments.', 'milkit' ),
		'id' => $shortname . 'single_post_show_comments_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post views icon', 'milkit' ),
		'desc' => __( 'Check this to display the count of the views (you also need to enable the counter in "General Settings").', 'milkit' ),
		'id' => $shortname . 'single_post_show_views_icon',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Post navigation', 'milkit' ),
		'desc' => __( 'Check this to display the post navigation (previous and next article).', 'milkit' ),
		'id' => $shortname . 'single_post_show_post_nav',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Author bio', 'milkit' ),
		'desc' => __( 'Check this to display the author bio.', 'milkit' ),
		'id' => $shortname . 'single_post_show_author_bio',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => '',
		'message' => __( 'Related posts options', 'milkit' ),
		'type' => 'section-description'
	);

	$default_options[] = array( 
		'name' => __( 'Related posts', 'milkit' ),
		'desc' => __( 'Check this to display the related posts.', 'milkit' ),
		'id' => $shortname . 'single_post_show_related',
		'class' => 'subsection-handler',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'id' => $shortname . 'single_post_show_related_h',
		'type' => 'subsection-open'
	);

		$default_options[] = array( 
			'name' => __( 'Same category', 'milkit'),
			'desc' => __( 'Check this to filter the related posts by category.', 'milkit' ),
			'id' => $shortname . 'single_post_show_related_cats',
			'std' => 'true',
			'type' => 'checkbox'
		);

		$default_options[] = array( 
			'name' => __( 'Same tags', 'milkit'),
			'desc' => __( 'Check this to filter the related posts by tags.', 'milkit' ),
			'id' => $shortname . 'single_post_show_related_tags',
			'std' => '',
			'type' => 'checkbox'
		);

	$default_options[] = array( 
		'id' => $shortname . 'single_post_show_related_h',
		'type' => 'subsection-close'
	);

	$default_options[] = array( 
		'name' => '',
		'message' => __( 'Post sharer options', 'milkit' ),
		'type' => 'section-description'
	);

	$default_options[] = array( 
		'name' => __( 'Display social sharer', 'milkit'),
		'desc' => __( 'Check this to display the social sharer.', 'milkit' ),
		'id' => $shortname . 'show_post_sharer',
		'class' => 'subsection-handler',
		'std' => 'true',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'id' => $shortname . 'show_post_sharer_h',
		'type' => 'subsection-open'
	);

		$default_options[] = array( 
			'name' => __( 'Facebook sharer', 'milkit'),
			'desc' => __( 'Check this to enable the Facebook sharer.', 'milkit' ),
			'id' => $shortname . 'share_facebook',
			'std' => 'true',
			'type' => 'checkbox'
		);

		$default_options[] = array( 
			'name' => __( 'Twitter sharer', 'milkit'),
			'desc' => __( 'Check this to enable the Twitter sharer.', 'milkit' ),
			'id' => $shortname . 'share_twitter',
			'std' => 'true',
			'type' => 'checkbox'
		);

		$default_options[] = array( 
			'name' => __( 'Google Plus sharer', 'milkit'),
			'desc' => __( 'Check this to enable the Google Plus sharer.', 'milkit' ),
			'id' => $shortname . 'share_google',
			'std' => 'true',
			'type' => 'checkbox'
		);

		$default_options[] = array( 
			'name' => __( 'LinkedIn sharer', 'milkit'),
			'desc' => __( 'Check this to enable the LinkedIn sharer.', 'milkit' ),
			'id' => $shortname . 'share_linkedin',
			'std' => 'true',
			'type' => 'checkbox'
		);

		$default_options[] = array( 
			'name' => __( 'Pinterest sharer', 'milkit'),
			'desc' => __( 'Check this to enable the Pinterest sharer.', 'milkit' ),
			'id' => $shortname . 'share_pinterest',
			'std' => 'true',
			'type' => 'checkbox'
		);

	$default_options[] = array( 
		'id' => $shortname . 'show_post_sharer_h',
		'type' => 'subsection-close'
	);

	/* Font Settings */
	$default_options[] = array( 
		'name' => __( 'Font and color settings', 'milkit' ),
		'icon' => 'fa fa-font',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Site font', 'milkit' ),
		'desc' => __( 'Select the font family.', 'milkit' ),
		'id' => $shortname . 'site_font',
		'options-web' => $milkit_web_fonts,
		'options-google' => $milkit_google_fonts,
		'std' => 'Karla',
		'type' => 'font-select'
	);

	$default_options[] = array( 
		'name' => __( 'First accent color', 'milkit' ),
		'desc' => __( 'Select the first accent color of the theme.', 'milkit' ),
		'id' => $shortname . 'first_accent_color',
		'std' => '#e1eaed',
		'type' => 'color'
	);

	$default_options[] = array( 
		'name' => __( 'Second accent color', 'milkit' ),
		'desc' => __( 'Select the first second color of the theme.', 'milkit' ),
		'id' => $shortname . 'second_accent_color',
		'std' => '#ffffb2',
		'type' => 'color'
	);

	$default_options[] = array( 
		'name' => __( 'Link color', 'milkit' ),
		'desc' => __( 'Select the color of the links.', 'milkit' ),
		'id' => $shortname . 'link_color',
		'std' => '#54a8d0',
		'type' => 'color'
	);

	/* Social Accounts Settings */
	$default_options[] = array( 
		'name' => __( 'Social accounts', 'milkit' ),
		'icon' => 'fa fa-facebook',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Open social links in a new window/tab', 'milkit'),
		'desc' => __( 'Check this to open social links in a new window/tab.', 'milkit' ),
		'id' => $shortname . 'check_social_target',
		'std' => 'false',
		'type' => 'checkbox'
	);

	$default_options[] = array( 
		'name' => __( 'Facebook', 'milkit' ),
		'desc' => __( 'Type the URL of your Facebook account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'facebook',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Twitter', 'milkit' ),
		'desc' => __( 'Type the URL of your Twitter account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'twitter',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Dribbble', 'milkit' ),
		'desc' => __( 'Type the URL of your Dribbble account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'dribbble',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'LinkedIn', 'milkit' ),
		'desc' => __( 'Type the URL of your LinkedIn account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'linkedIn',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Flickr', 'milkit' ),
		'desc' => __( 'Type the URL of your Flickr account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'flickr',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Tumblr', 'milkit' ),
		'desc' => __( 'Type the URL of your Tumblr account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'tumblr',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Vimeo', 'milkit' ),
		'desc' => __( 'Type the URL of your Vimeo account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'vimeo',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Youtube', 'milkit' ),
		'desc' => __( 'Type the URL of your Youtube account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'youtube',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Instagram', 'milkit' ),
		'desc' => __( 'Type the URL of your Instagram account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'instagram',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Google Plus', 'milkit' ),
		'desc' => __( 'Type the URL of your Google Plus account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'google',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Foursquare', 'milkit' ),
		'desc' => __( 'Type the URL of your Foursquare account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'foursquare',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'GitHub', 'milkit' ),
		'desc' => __( 'Type the URL of your GitHub account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'gitHub',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Pinterest', 'milkit' ),
		'desc' => __( 'Type the URL of your Pinterest account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'pinterest',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Stack Overflow', 'milkit' ),
		'desc' => __( 'Type the URL of your Stack Overflow account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'stackoverflow',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'DeviantART', 'milkit' ),
		'desc' => __( 'Type the URL of your DeviantART account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'deviantart',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Behance', 'milkit' ),
		'desc' => __( 'Type the URL of your Behance account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'behance',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Delicious', 'milkit' ),
		'desc' => __( 'Type the URL of your Delicious account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'delicious',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'SoundCloud', 'milkit' ),
		'desc' => __( 'Type the URL of your SoundCloud account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'soundcloud',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Spotify', 'milkit' ),
		'desc' => __( 'Type the URL of your Spotify account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'spotify',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'StumbleUpon', 'milkit' ),
		'desc' => __( 'Type the URL of your StumbleUpon account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'stumbleupon',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Reddit', 'milkit' ),
		'desc' => __( 'Type the URL of your Reddit account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'reddit',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Vine', 'milkit' ),
		'desc' => __( 'Type the URL of your Vine account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'vine',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'Digg', 'milkit' ),
		'desc' => __( 'Type the URL of your Digg account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'digg',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'VK', 'milkit' ),
		'desc' => __( 'Type the URL of your VK account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'vk',
		'std' => '',
		'type' => 'text'
	);

	$default_options[] = array( 
		'name' => __( 'RSS', 'milkit' ),
		'desc' => __( 'Type the URL of your RSS account (remember "http://").', 'milkit' ),
		'id' => $shortname . 'rss',
		'std' => '',
		'type' => 'text'
	);

	/* Custom CSS Settings */
	$default_options[] = array( 
		'name' => __( 'Custom CSS', 'milkit' ),
		'icon' => 'fa fa-css3',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Custom CSS', 'milkit' ),
		'desc' => __( 'Paste here your small css snippets.', 'milkit' ),
		'id' => $shortname . 'custom_css',
		'std' => '',
		'type' => 'textarea-css'
	);

	/* Google Analytics Settings */
	$default_options[] = array( 
		'name' => __( 'Google analytics', 'milkit' ),
		'icon' => 'fa fa-bar-chart',
		'type' => 'heading'
	);

	$default_options[] = array( 
		'name' => __( 'Tracking code', 'milkit' ),
		'desc' => __( 'Paste the Google Analytics tracking code here.', 'milkit' ),
		'id' => $shortname . 'google_analytics',
		'std' => '',
		'type' => 'textarea'
	);

	update_option( 'milkit_template_opt', $default_options );

}
add_action( 'init', 'milkit_default_options' );
