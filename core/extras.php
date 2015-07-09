<?php
/**
 * Custom functions that act independently of the theme templates
 *
 *
 * @package Milkit
 */

if ( ! function_exists( 'milkit_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function milkit_body_classes( $classes ) {

		$classes[] = '';

		if ( is_home() ) {
			$layout = esc_attr( get_option( 'milkit_opt_blog_layout' ) );
			$classes[] = $layout;
		}

		if ( is_category() ) {
			$layout = esc_attr( get_option( 'milkit_opt_category_layout' ) );
			$classes[] = $layout;
		}

		if ( is_tag() ) {
			$layout = esc_attr( get_option( 'milkit_opt_tag_layout' ) );
			$classes[] = $layout;
		}

		if ( is_single() ) {
			$layout = esc_attr( get_option( 'milkit_opt_single_post_layout' ) );
			$classes[] = $layout;
		}

		if ( ( get_option( 'show_on_front' ) === 'page' ) && is_front_page() ) {
			$home_layout = esc_attr( get_option( 'milkit_opt_home_layout' ) );
			$layout = '';

			switch ( $home_layout ) {
				case 'layout1':
					$layout = 'no-sidebar';
					break;
				case 'layout2':
				case 'layout4':
				case 'layout6':
				case 'layout8':
					$layout = 'right-sidebar';
					break;

				case 'layout3':
				case 'layout5':
				case 'layout7':
				case 'layout9':
					$layout = 'left-sidebar';
					break;
			}

			$classes[] = esc_attr( $layout );
		}

		if ( is_page() && ! is_front_page() ) {
			$layout = esc_attr( get_option( 'milkit_opt_single_page_layout' ) );
			$classes[] = esc_attr( $layout );
		}

		if ( is_404() ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
	add_filter( 'body_class', 'milkit_body_classes' );
endif;


if ( ! function_exists( 'milkit_home_slider' ) ) :
/**
 * Display slider in homepage.
 */
function milkit_home_slider() {

	if ( ( get_option( 'show_on_front' ) === 'page' ) && is_front_page() && ( get_option( 'milkit_opt_show_slider' ) == 'true' ) ) {

		$args = array(
			'ignore_sticky_posts' => true,
			'meta_key'   => 'milkit_meta_home_slider',
			'meta_value' => 'yes'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) : ?>

			<div id="homeslider" class="flexslider flex-home">

				<ul class="slides">

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<li><article <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

						<?php if ( ! post_password_required() && has_post_thumbnail() ) : ?>

						<a class="post-thumbnail" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'milkit_1330x590', array( 'itemprop' => 'image' ) ); ?>
						</a>

						<?php endif; ?>

						<div class="post-module-content">

							<header class="entry-header">
								<?php milkit_entry_cats(); ?>
								<?php the_title( sprintf( '<h2 itemprop="name" class="entry-title"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-summary" itemprop="text">
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->

							<a class="more-link" href="<?php the_permalink(); ?>"><?php echo sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'milkit' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							); ?></a>

							<footer class="entry-footer">
								<meta itemprop="interactionCount" content="UserComments:<?php echo esc_attr( get_comments_number() ); ?>">
								<div class="author-date">
									<?php
									milkit_post_date( true );
									milkit_post_author( true );
									?>
								</div><!-- .author-date -->
							</footer><!-- .entry-footer -->

						</div><!-- .post-module-content -->


					</article></li><!-- #post-## -->

				<?php
				endwhile;
				wp_reset_postdata(); ?>

				</ul>


			</div>

			<!-- Centered Description -->
			<div class="home-description">
				<?php the_field('site_description_content', 'option'); ?>
			</div>

		<?php
		endif;
	}

}
endif;


if ( ! function_exists( 'milkit_comment' ) ) :
	/**
	 * Custom callback for the comment item.
	 */
	function milkit_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		if ( 'div' == $args[ 'style' ] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>

		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? 'parent' : '' ); ?> id="comment-<?php comment_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/Comment">
			<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<?php endif; ?>
			<span class="comment-author">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<?php printf( __( '<cite itemprop="author">%s</cite>' ), get_comment_author_link() ); ?>
			</span>

			<?php
			$time_string = '<time class="entry-date published" itemprop="datePublished" datetime="%1$s">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_comment_date( 'c' ) ),
				esc_html( get_comment_date( 'M j, Y' ) )
			);
			?>

			<span class="comment-meta commentmetadata">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>"><?php echo $time_string; ?></a>
				<?php edit_comment_link( __( '(Edit)', 'milkit' ), '', '' ); ?>
			</span>

			<?php if ( '0' == $comment->comment_approved ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'milkit' ) ?></em>
			<br />
			<?php endif; ?>

			<div class="comment-text" itemprop="text">
				<?php comment_text( get_comment_id(), array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>

			<?php
			comment_reply_link( array_merge( $args, array(
				'add_below' => $add_below,
				'depth'     => $depth,
				'max_depth' => $args['max_depth'],
				'before'    => '<div class="reply">',
				'after'     => '</div>'
			) ) );
			?>

			<?php if ( 'div' != $args['style'] ) : ?>
			</div>
			<?php endif; ?>

		<?php
	}
endif;


if ( ! function_exists( 'milkit_comment_form_fields' ) ) :
	/**
	 * Add placeholder to the comment form fields.
	 */
	function milkit_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields[ 'author' ] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'milkit' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input id="author" name="author" type="text" placeholder="' . __( 'Name', 'milkit' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" size="30"' . $aria_req . ' /></p>';

		$fields[ 'email' ] = '<p class="comment-form-email"><label for="email">' . __( 'Email', 'milkit' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input id="email" name="email" type="email" placeholder="' . __( 'Email', 'milkit' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr(  $commenter[ 'comment_author_email' ] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . ' /></p>';

		$fields[ 'url' ] = '<p class="comment-form-url"><label for="url">' . __( 'Website', 'milkit' ) . '</label> ' . '<input id="url" name="url" type="url" placeholder="' . __( 'Website', 'milkit' ) . '" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" size="30" /></p>';

		return $fields;

	}
	add_filter( 'comment_form_default_fields', 'milkit_comment_form_fields' );
endif;


if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function milkit_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'milkit' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'milkit_wp_title', 10, 2 );
endif;


if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function milkit_render_title() {
		echo '<title>' . wp_title( '|', false, 'right' ) . "</title>\n";
	}
	add_action( 'wp_head', 'milkit_render_title' );
endif;


if ( ! function_exists( 'milkit_tag_cloud' ) ) :
	/**
	 * Change the font-size of the tag cloud widget.
	 */
	function milkit_tag_cloud( $args ) {
		$args[ 'largest' ] = 11;
		$args[ 'smallest' ] = 11;
		$args[ 'unit' ] = 'px';
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'milkit_tag_cloud' );
endif;


/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function milkit_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'milkit_setup_author' );

if ( ! function_exists( 'milkit_show_pswp' ) ) :
	/**
	 * Add the necessary markup for photoSwipe before the </body> tag.
	 */
	function milkit_show_pswp() {
		if ( is_single() ) {

			global $post;

			$has_gallery = get_post_meta( $post->ID, 'milkit_meta_custom_gallery_check', true );

			if ( $has_gallery == 'yes' ) { ?>

				<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="pswp__bg"></div>
					<div class="pswp__scroll-wrap">
						<div class="pswp__container">
							<div class="pswp__item"></div>
							<div class="pswp__item"></div>
							<div class="pswp__item"></div>
						</div>
						<div class="pswp__ui pswp__ui--hidden">
							<div class="pswp__top-bar">
								<div class="pswp__counter"></div>
								<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
								<button class="pswp__button pswp__button--share" title="Share"></button>
								<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
								<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
								<div class="pswp__preloader">
									<div class="pswp__preloader__icn">
										<div class="pswp__preloader__cut">
											<div class="pswp__preloader__donut"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
								<div class="pswp__share-tooltip"></div>
							</div>
							<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
							</button>
							<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
							</button>
							<div class="pswp__caption">
								<div class="pswp__caption__center"></div>
							</div>
						</div>
					</div>
				</div>

		<?php }

		}
	}
	add_action( 'wp_footer', 'milkit_show_pswp' );
endif;

if ( ! function_exists( 'milkit_google_analytics' ) ) :
	/**
	 * Print the analytics tracking code
	 */
	function milkit_google_analytics() {
		if ( $tracking_code = get_option( 'milkit_opt_google_analytics' ) ) {
			echo stripslashes( $tracking_code );
		}
	}
	add_filter( 'wp_footer', 'milkit_google_analytics' );
endif;

if ( ! function_exists( 'milkit_google_web_fonts' ) ) :
	/**
	 * Register Google Web Fonts
	 */
	function milkit_google_web_fonts() {
		global $milkit_google_fonts;
		$font = get_option( 'milkit_opt_site_font' );

		if ( in_array( $font, $milkit_google_fonts ) ) {
			$font_web = str_replace( " ", "+", $font );
			$protocol = is_ssl() ? 'https' : 'http';
			wp_enqueue_style( 'milkit-google-font', $protocol . '://fonts.googleapis.com/css?family=' . $font_web . ':400,700,400italic,700italic' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'milkit_google_web_fonts' );
endif;
