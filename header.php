<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Milkit
 */
?><!DOCTYPE html>
<?php
$milkit_check_sticky_header = ( get_option( 'milkit_opt_check_sticky_header' ) != 'false' ) ? 'milkit-sticky-header-yes' : '';
$milkit_check_responsive = ( get_option( 'milkit_opt_check_responsive' ) == 'false' ) ? 'no-responsive' : '';
?>
<html <?php language_attributes(); ?> class="no-js <?php echo esc_attr( $milkit_check_sticky_header ); ?> <?php echo esc_attr( $milkit_check_responsive ); ?>">
<head>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
<?php if ( $milkit_check_responsive != 'no-responsive' ) : ?>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php if ( get_option( 'milkit_opt_custom_favicon' ) ) : ?>
<link rel="shortcut icon" href="<?php echo esc_url( get_option( 'milkit_opt_custom_favicon' ) ); ?>">
<?php endif; ?>

<script>(function(){document.documentElement.className+=' js'})();</script>

<?php wp_head(); ?>

<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ie8.js?ver=1.0" type="text/javascript"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site wrap">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'milkit' ); ?></a>

	<?php $milkit_header_layout = ( get_option( 'milkit_opt_header_layout' ) ) ? get_option( 'milkit_opt_header_layout' ) : 'default-header'; ?>

	<header id="masthead" class="site-header <?php echo esc_attr( $milkit_header_layout ); ?>" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<div class="site-branding">
			<?php
			/* Show custom logo if available */
			if ( get_option( 'milkit_opt_logo' ) ) : ?>

				<?php if ( ( is_home() ) || ( is_front_page() && ( get_option( 'milkit_opt_use_widgets_home' ) == 'true' ) ) ) : ?>
				<h1 class="site-title semantic" itemprop="headline"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
				<?php else : ?>
				<h3 class="site-title semantic" itemprop="headline"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>

				<?php endif; ?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo"><img id="desktop-logo" src="<?php echo esc_url( get_option( 'milkit_opt_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="<?php echo esc_attr( get_option( 'milkit_opt_logo_w' ) ); ?>" height="<?php echo esc_attr( get_option( 'milkit_opt_logo_h' ) ); ?>">
					<?php if ( get_option('milkit_opt_logo_retina') ): ?>
						<img id="retina-logo" src="<?php echo esc_url( get_option( 'milkit_opt_logo_retina' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="<?php echo esc_attr( get_option( 'milkit_opt_logo_retina_w' ) ); ?>" height="<?php echo esc_attr( get_option( 'milkit_opt_logo_retina_h' ) ); ?>">
					<?php endif; ?>
				</a>



			<?php else: ?>

				<?php if ( ( is_home() ) || ( is_front_page() && ( get_option( 'milkit_opt_use_widgets_home' ) == 'true' ) ) ) : ?>
				<h1 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
				<?php else : ?>
				<h3 class="site-title" itemprop="headline"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h3>
				<?php endif; ?>
				<p class="site-description" itemprop="description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>

			<?php endif; ?>


			<?php
			/* Show site info if available, accepts HTML */
			if ( get_option( 'milkit_opt_site_info' ) ) : ?>
			<p class="site-info"><?php echo get_option( 'milkit_opt_site_info' ); ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<div class="secondary-navigation">

		<?php
		/* Show search field if enabled */
		if ( get_option( 'milkit_opt_show_header_search' ) == 'true' ) : ?>
			<?php get_search_form(); ?>
		<?php endif; ?>

		<?php milkit_social_header(); ?>

		</div><!-- .secondary-navigation -->

		<a href="#" id="site-mobile-navigation-toggle" data-open-text="<?php _e( 'Navigation', 'milkit' ); ?>" data-close-text="<?php _e( 'Close', 'milkit' ); ?>"><?php _e( 'Navigation', 'milkit' ); ?></a>

		<nav id="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<h3 class="semantic"><?php _e( 'Site navigation', 'milkit' ); ?></h3>
			<?php
			/* First check if a menu is assigned to the location (otherwise WP throws an error if there is a walker callback) */
			if ( has_nav_menu('primary') ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'header-navigation', 'menu_class' => 'sf-menu', 'walker' => new Milkit_Walker_Nav_Menu() ) ); ?>
			<?php endif; ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
