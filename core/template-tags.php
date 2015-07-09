<?php
/**
 * Custom template tags for this theme.
 *
 *
 * @package Milkit
 */

if ( ! function_exists( 'milkit_social_header' ) ) :
	/**
	 * Display social accounts header.
	 */
	function milkit_social_header() {
		/* check if the options is selected */
		if ( get_option( 'milkit_opt_check_social_header' ) != 'true' ) {
			return;
		}

		$target = ( ( get_option( 'milkit_opt_check_social_target' )  == 'true' ) ? 'target="_blank"' : '' );
		?>

		<ul class="site-follow">
			<?php if ( get_option( 'milkit_opt_facebook' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_facebook' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Facebook"><?php echo _e( 'Facebook', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_twitter' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_twitter' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Twitter"><?php echo _e( 'Twitter', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_dribbble' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_dribbble' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Dribbble"><?php echo _e( 'Dribbble', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_linkedin' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_linkedin' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Linkedin"><?php echo _e( 'Linkedin', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_flickr' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_flickr' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Flickr"><?php echo _e( 'Flickr', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_tumblr' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_tumblr' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Tumblr"><?php echo _e( 'Tumblr', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_vimeo' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_vimeo' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Vimeo"><?php echo _e( 'Vimeo', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_youtube' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_youtube' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Youtube"><?php echo _e( 'Youtube', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_instagram' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_instagram' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Instagram"><?php echo _e( 'Instagram', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_google' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_google' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Google Plus"><?php echo _e( 'Google Plus', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_foursquare' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_foursquare' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Foursquare"><?php echo _e( 'Foursquare', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_github' )!= '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_github' ) ); ?>" <?php echo esc_attr( $target ); ?> title="GitHub"><?php echo _e( 'GitHub', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_pinterest' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_pinterest' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Pinterest"><?php echo _e( 'Pinterest', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_stackoverflow' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_stackoverflow' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Stack Overflow"><?php echo _e( 'Stack Overflow', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_deviantart' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_deviantart' ) ); ?>" <?php echo esc_attr( $target ); ?> title="DeviantART"><?php echo _e( 'DeviantART', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_behance' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_behance' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Behance"><?php echo _e( 'Behance', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_delicious' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_delicious' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Delicious"><?php echo _e( 'Delicious', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_soundcloud' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_soundcloud' ) ); ?>" <?php echo esc_attr( $target ); ?> title="SoundCloud"><?php echo _e( 'SoundCloud', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_spotify' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_spotify' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Spotify"><?php echo _e( 'Spotify', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_stumbleupon' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_stumbleupon' ) ); ?>" <?php echo esc_attr( $target ); ?> title="StumbleUpon"><?php echo _e( 'StumbleUpon', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_reddit' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_reddit' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Reddit"><?php echo _e( 'Reddit', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_vine' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_vine' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Vine"><?php echo _e( 'Vine', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_digg' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_digg' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Digg"><?php echo _e( 'Digg', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_vk' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_vk' ) ); ?>" <?php echo esc_attr( $target ); ?> title="VK"><?php echo _e( 'VK', 'milkit' ); ?></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_rss' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_rss' ) ); ?>" <?php echo esc_attr( $target ); ?> title="RSS"><?php echo _e( 'RSS', 'milkit' ); ?></a></li>
			<?php endif; ?>
		</ul>

		<?php
	}
endif;


if ( ! function_exists( 'milkit_social_footer' ) ) :
	/**
	 * Display social accounts header.
	 */
	function milkit_social_footer() {
		/* check if the options is selected */
		if ( get_option( 'milkit_opt_check_social_footer' ) != 'true' ) {
			return;
		}

		$target = ( ( get_option( 'milkit_opt_check_social_target' )  == 'true' ) ? 'target="_blank"' : '' );
		?>

		<?php if ( get_option( 'milkit_opt_footer_social_label' ) != '' ) : ?>
			<p class="site-follow-label"><?php echo esc_html( get_option( 'milkit_opt_footer_social_label' ) ); ?></p>
		<?php endif; ?>

		<ul class="site-follow">
			<?php if ( get_option( 'milkit_opt_facebook' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_facebook' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Facebook"><i class="fa fa-facebook"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_twitter' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_twitter' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Twitter"><i class="fa fa-twitter"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_dribbble' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_dribbble' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_linkedin' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_linkedin' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_flickr' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_flickr' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Flickr"><i class="fa fa-flickr"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_tumblr' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_tumblr' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Tumblr"><i class="fa fa-tumblr"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_vimeo' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_vimeo' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Vimeo"><i class="fa fa-vimeo-square"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_youtube' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_youtube' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Youtube"><i class="fa fa-youtube"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_instagram' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_instagram' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Instagram"><i class="fa fa-instagram"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_google' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_google' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_foursquare' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_foursquare' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Foursquare"><i class="fa fa-foursquare"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_github' )!= '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_github' ) ); ?>" <?php echo esc_attr( $target ); ?> title="GitHub"><i class="fa fa-github"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_pinterest' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_pinterest' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_stackoverflow' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_stackoverflow' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Stack Overflow"><i class="fa fa-stack-overflow"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_deviantart' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_deviantart' ) ); ?>" <?php echo esc_attr( $target ); ?> title="DeviantART"><i class="fa fa-deviantart"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_behance' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_behance' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Behance"><i class="fa fa-behance"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_delicious' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_delicious' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Delicious"><i class="fa fa-delicious"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_soundcloud' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_soundcloud' ) ); ?>" <?php echo esc_attr( $target ); ?> title="SoundCloud"><i class="fa fa-soundcloud"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_spotify' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_spotify' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Spotify"><i class="fa fa-spotify"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_stumbleupon' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_stumbleupon' ) ); ?>" <?php echo esc_attr( $target ); ?> title="StumbleUpon"><i class="fa fa-stumbleupon"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_reddit' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_reddit' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Reddit"><i class="fa fa-reddit"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_vine' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_vine' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Vine"><i class="fa fa-vine"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_digg' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_digg' ) ); ?>" <?php echo esc_attr( $target ); ?> title="Digg"><i class="fa fa-digg"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_vk' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_vk' ) ); ?>" <?php echo esc_attr( $target ); ?> title="VK"><i class="fa fa-vk"></i></a></li>
			<?php endif; ?>
			<?php if ( get_option( 'milkit_opt_rss' ) != '' ) : ?>
				<li><a href="<?php echo esc_url( get_option( 'milkit_opt_rss' ) ); ?>" <?php echo esc_attr( $target ); ?> title="RSS"><i class="fa fa-rss"></i></a></li>
			<?php endif; ?>
		</ul>

		<?php
	}
endif;


if ( ! function_exists( 'milkit_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function milkit_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'milkit' ); ?></h1>
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'milkit' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'milkit' ) ); ?></div>
				<?php endif; ?>

			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
endif;


if ( ! function_exists( 'milkit_post_nav' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function milkit_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Post navigation', 'milkit' ); ?></h3>
			<div class="nav-links">
				<?php
					previous_post_link( '<div class="nav-previous nav-post">%link</div>', '<span class="meta-nav">' . __( 'Previous story', 'milkit' ) . '</span>%title' );
					next_post_link( '<div class="nav-next nav-post">%link</div>', '<span class="meta-nav">' . __( 'Next story', 'milkit' ) . '</span>%title' );
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
endif;


if ( ! function_exists( 'milkit_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index
	 * views, or a div element when on single views.
	 *
	 */
	function milkit_post_thumbnail( $size, $single = false ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() || $single ) :
			if ( ( 'video' === get_post_format() ) || ( 'audio' === get_post_format() ) ) {
				return;
			} ?>

			<div class="post-thumbnail">
			<?php the_post_thumbnail( $size, array( 'itemprop' => 'image' ) ); ?>
			</div>

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( $size, array( 'itemprop' => 'image' ) ); ?>
			</a>

		<?php endif; // End is_singular()
	}
endif;


if ( ! function_exists( 'milkit_post_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function milkit_post_date( $hidden = false ) {
		$time_string = '<time class="entry-date published updated" itemprop="datePublished" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" itemprop="datePublished" datetime="%1$s">%2$s</time><time class="updated semantic" itemprop="dateModified" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( 'Published on %s', 'post date', 'milkit' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$visibility = ( $hidden ) ? 'semantic' : '';

		echo '<span class="posted-on ' . esc_attr( $visibility ) . '">' . $posted_on . '</span>';

	}
endif;


if ( ! function_exists( 'milkit_post_author' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function milkit_post_author( $hidden = false ) {
		$author = sprintf(
			_x( 'By %s', 'post author', 'milkit' ),
			'<span class="author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a itemprop="url" rel="author" class="url fn" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><span class="nickname" itemprop="name">' . esc_html( get_the_author() ) . '</span></a></span>'
		);

		$visibility = ( $hidden ) ? 'semantic' : '';

		echo '<span class="byline ' . esc_attr( $visibility ) . '">' . $author . '</span>';

	}
endif;


if ( ! function_exists( 'milkit_post_author_bio' ) ) :
	/**
	 * Prints author bio section.
	 */
	function milkit_post_author_bio() {
		?>

		<aside id="author-bio">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'email' ), $size = '100' ); ?>
			</div>

			<div class="author-information">
				<span class="author-name">
					<?php printf( __( 'Written by <a href="%1$s">%2$s</a>', 'milkit' ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?>
				</span>

				<p class="author-info"><?php the_author_meta( 'description' ); ?></p>
			</div>
		</aside>

		<?php

	}
endif;


if ( ! function_exists( 'milkit_post_related' ) ) :
	/**
	 * Prints related posts section.
	 */
	function milkit_post_related() {
		if ( get_option( 'milkit_opt_single_post_show_related' ) == 'true' ) {

			global $post;

			$args = array(
				'post__not_in' => array( $post->ID ),
				'posts_per_page' => 3,
				'orderby' => 'rand'
			);

			if ( get_option( 'milkit_opt_single_post_show_related_cats' ) == 'true' ) {
				$cats_array = array();

				// Get categories
				$cat_ids = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				foreach ( $cat_ids as $cat ) {
					$cats_array[] = $cat;
				}

				$cats_array  = array_map( 'absint', $cats_array );

				$args[ 'category__in' ] = $cats_array;
			}

			if ( get_option( 'milkit_opt_single_post_show_related_tags' ) == 'true' ) {
				$tags_array = array();

				// Get tags
				$tag_ids = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				foreach ( $tag_ids as $tag ) {
					$tags_array[] = $tag;
				}

				$tags_array  = array_map( 'absint', $tags_array );

				$args[ 'tag__in' ] = $tags_array;
			}

			$related_query = new WP_Query( $args );

			if ( $related_query->have_posts() ) : ?>

				<aside id="related-posts">

					<h3><?php _e( 'We recommend', 'milkit' ); ?></h3>

					<div class="related-posts">

						<?php while ( $related_query->have_posts() ) : $related_query->the_post();?>

							<article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Article">
								<?php if ( has_post_thumbnail() ) : ?>
									<a class="post-thumbnail" href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'milkit_440x293' ); ?>
									</a>
								<?php endif; ?>

								<?php milkit_entry_cats(); ?>

								<?php the_title( sprintf( '<h4 itemprop="name" class="entry-title"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

								<div class="post-meta">
									<?php echo milkit_post_author( true ); ?>
									<?php echo milkit_post_date( true ); ?>
									<meta itemprop="interactionCount" content="UserComments:<?php echo esc_attr( get_comments_number() ); ?>">
								</div>
							</article>

						<?php
						endwhile;
						wp_reset_postdata(); ?>

					</div>

				</aside>

			<?php
			endif;

		}
	}
	// add_action( 'milkit_post_related_hook', 'milkit_post_related' );
endif;


if ( ! function_exists( 'milkit_entry_cats' ) ) :
	/**
	 * Prints HTML with meta information for the categories.
	 */
	function milkit_entry_cats() {
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {
			$categories_list = '';
			$terms = get_the_category();
			if ( $terms && milkit_categorized_blog() ) : ?>
				<div class="entry-cats">
					<?php
					foreach( $terms as $term_cat ) {
						$categories_list .= '<a href="' . esc_url( get_category_link( $term_cat->term_id ) ) . '" class="milkit_cat" rel="category tag">' . esc_html( $term_cat->name ) . '</a>';
					}
					echo $categories_list;
				?>
				</div><!-- .entry-meta -->
			<?php endif;
		}
	}
endif;


if ( ! function_exists( 'milkit_post_comments_count' ) ) :
	/**
	 * Prints HTML with meta information for the comments.
	 */
	function milkit_post_comments_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'milkit' ), __( '1 Comment', 'milkit' ), __( '% Comments', 'milkit' ) );
			echo '</span>';
		}
	}
endif;


if ( ! function_exists( 'milkit_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function milkit_entry_footer() {

	// Hide tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'milkit' ) );
		// if ( $tags_list ) {
		// 	printf( '<div class="tags-links">' . __( 'Tagged with: %1$s', 'milkit' ) . '</div>', $tags_list );
		// }
	}

}
endif;


if ( ! function_exists( 'milkit_the_archive_title_filter' ) ) :
	/**
	 * Shim for `the_archive_title()`.
	 *
	 * Display the archive title based on the queried object.
	 */
	function milkit_the_archive_title_filter() {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_year() ) {
			$title = get_the_date( _x( 'Y', 'yearly archives date format', 'milkit' ) );
		} elseif ( is_month() ) {
			$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'milkit' ) );
		} elseif ( is_day() ) {
			$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'milkit' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery', 'milkit' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-image', 'milkit' ) ) {
				$title = _x( 'Images', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-video', 'milkit' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-quote', 'milkit' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-link', 'milkit' ) ) {
				$title = _x( 'Links', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-status', 'milkit' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-audio', 'milkit' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'milkit' );
			} elseif ( is_tax( 'post_format', 'post-format-chat', 'milkit' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'milkit' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'milkit' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'milkit' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = __( 'Archives', 'milkit' );
		}

		return $title;

	}
endif;
add_filter( 'get_the_archive_title', 'milkit_the_archive_title_filter' );


if ( ! function_exists( 'milkit_get_category_parents' ) ) :
	/**
	 * Retrieve category parents with separator. A custom version of the original
	 * get_category_parents() core WordPress function, with microdata
	 */
	function milkit_get_category_parents( $id, $link = false, $separator = '/', $nicename = false, $visited = array() ) {
		$chain = '';
		$parent = get_term( $id, 'category' );
		if ( is_wp_error( $parent ) )
			return $parent;

		if ( $nicename )
			$name = $parent->slug;
		else
			$name = $parent->name;

		if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
			$visited[] = $parent->parent;
			$chain .= milkit_get_category_parents( $parent->parent, $link, $separator, $nicename, $visited );
		}

		if ( $link )
			$chain .= '<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="' . esc_url( get_category_link( $parent->term_id ) ) . '"><span itemprop="title">' . $name . '</span></a></li>' . $separator;
		else
			$chain .= $name.$separator;
		return $chain;
	}
endif;


if ( ! function_exists( 'milkit_breadcrumbs' ) ) :
	/**
	 * Display the breadcrumbs section.
	 */
	function milkit_breadcrumbs() {
		if ( get_option( 'milkit_opt_show_breadcrumbs' ) == 'false' ) {
			return false;
		}
		$home = apply_filters( 'milkit_breadcrumbs_home_filter', __( 'Home', 'milkit' ) );
		$homeLink = site_url();
		$blog = apply_filters( 'milkit_breadcrumbs_blog_filter', __( 'Blog', 'milkit' ) );
		$before_container = '<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">';
		$after_container = '</li>';
		$before = '<span itemprop="title">';
		$after = '</span>';
		global $post;

		$crumbs = '';

		if ( ( get_option( 'show_on_front' ) === 'page' && is_front_page() ) || ( get_option( 'show_on_front' ) === 'posts' && is_home() ) ) {
			// do nothing (breacrumbs are not displayed)
		} elseif ( get_option( 'show_on_front' ) == 'page' && is_home() ) {
			$blog_link = get_permalink( get_option( 'page_for_posts' ) );
			$crumbs = '<ul class="crumbs">';
			$crumbs .= $before_container . '<a href="' . esc_url( $homeLink ) . '" itemprop="url">' . $before . $home . $after . '</a>' . $after_container;
			$crumbs .= $before_container . '<a href="' . esc_url( $blog_link ) . '" itemprop="url">' . $before . $blog . $after . '</a>' . $after_container;
			$crumbs .= '</ul>';
		} else {
			$crumbs = '<ul class="crumbs">';
			$crumbs .= $before_container . '<a href="' . esc_url( $homeLink ) . '" itemprop="url">' . $before . $home . $after . '</a>' . $after_container;
			if ( is_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category( $thisCat );
				$parentCat = get_category( $thisCat->parent );
				if ( $thisCat->parent != 0 ) {
					$crumbs .= milkit_get_category_parents( $parentCat, TRUE, '' );
				}
				$crumbs .= $before_container . '<a href="' . esc_url( get_category_link( $thisCat ) ) . '" itemprop="url">' . $before . single_cat_title( '', false ) . $after . '</a>' . $after_container;
			} elseif ( is_tag() || is_tax() ) {
				$thisTerm = get_queried_object();
				$crumbs .= $before_container . '<a href="' . esc_url( get_term_link( $thisTerm, $thisTerm->taxonomy ) ) . '" itemprop="url">' . $before . single_tag_title( '', false ) . $after . '</a>' . $after_container;
			} elseif ( is_author() ) {
				$crumbs .= $before_container . '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url">' . $before . sprintf( __( 'Posts by %1$s', 'milkit' ), get_the_author() ) . $after . '</a>' . $after_container;
			} elseif ( is_year() ) {
				$crumbs .= $before_container . '<a href="' . esc_url( get_year_link( get_query_var( 'year' ) ) ) . '" itemprop="url">' . $before . get_the_date( _x( 'Y', 'yearly archives date format', 'milkit' ) ) . $after . '</a>' . $after_container;
			} elseif ( is_month() ) {
				$crumbs .= $before_container . '<a href="' . esc_url( get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ) ) . '" itemprop="url">' . $before . get_the_date( _x( 'F Y', 'monthly archives date format', 'milkit' ) ) . $after . '</a>' . $after_container;
			} elseif ( is_day() ) {
				$crumbs .= $before_container . '<a href="' . esc_url( get_day_link( get_query_var( 'year' ), get_query_var( 'monthnum' ), get_query_var( 'day' ) ) ) . '" itemprop="url">' . $before . get_the_date( _x( 'F j, Y', 'daily archives date format', 'milkit' ) ) . $after . '</a>' . $after_container;
			} elseif ( is_single() && ! is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$crumbs .= $before_container . '<a href="' . get_the_permalink() . '" itemprop="url">' . $before . get_the_title() . $after . '</a>' . $after_container;
				} else {
					$cat = get_the_category();
					$cat = $cat[ 0 ];
					$crumbs .= milkit_get_category_parents( $cat, TRUE, '' );
					$crumbs .= $before_container . '<a href="' . get_the_permalink() . '" itemprop="url">' . $before . get_the_title() . $after . '</a>' . $after_container;
				}
			} elseif ( is_attachment() ) {
				$crumbs .= $before_container . '<a href="' . get_attachment_link( get_the_ID() ) . '" itemprop="url">' . $before . get_the_title() . $after . '</a>' . $after_container;
			} elseif ( is_page() && ! $post->post_parent ) {
				$crumbs .= $before_container . '<a href="' . get_the_permalink() . '" itemprop="url">' . $before . get_the_title() . $after . '</a>' . $after_container;
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$chain = array();
				while ( $parent_id ) {
					$page = get_page( $parent_id );
					$chain[] = $before_container . '<a href="' . get_permalink( $page->ID ) . '" itemprop="url">' . $before . get_the_title( $page->ID ) . $after . '</a>' . $after_container;
					$parent_id = $page->post_parent;
				}
				$chain = array_reverse( $chain );
				foreach ( $chain as $ch ) {
					$crumbs .= $ch;
				}
				$crumbs .= $before_container . '<a href="' . get_the_permalink() . '" itemprop="url">' . $before . get_the_title() . $after . '</a>' . $after_container;
			} elseif ( is_404() ) {
				// do nothing (breacrumbs are not displayed)
			} elseif ( is_search() ) {
				$crumbs .= $before_container . '<a href="' . get_search_link() . '" itemprop="url">' . $before . sprintf( __( 'Search for "%s"', 'milkit' ), esc_html( get_search_query() ) ) . $after . '</a>' . $after_container;
			}
			if ( get_query_var( 'paged' ) ) {
				$crumbs .= '<li>' . sprintf( __( '(Page %s)', 'milkit' ), get_query_var( 'paged' ) ) . '</li>';
			}

			$crumbs .= '</ul>';

		}

		return $crumbs;

	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function milkit_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'milkit_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'milkit_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so milkit_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so milkit_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in milkit_categorized_blog.
 */
function milkit_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'milkit_categories' );
}
add_action( 'edit_category', 'milkit_category_transient_flusher' );
add_action( 'save_post',     'milkit_category_transient_flusher' );
