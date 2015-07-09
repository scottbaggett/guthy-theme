<?php
/**
 * Post modules - Views
 *
 * @package Milkit
 */

class Milkit_Widget_Module_Views extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'milkit_widget_module_views',
			'description' => __( 'Your site\'s Posts ordered by views count.', 'milkit' )
		);
		parent::__construct( 'milkit_widget_module_views', __( 'Milkit Post Modules - By Views', 'milkit' ), $widget_ops );
		$this->alt_option_name = 'milkit_widget_module_views';

		add_action( 'save_post', array( $this, 'flush_widget_cache') );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache') );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache') );
	}

	public function widget( $args, $instance ) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'milkit_widget_module_views', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args[ 'widget_id' ] ) ) {
			$args[ 'widget_id' ] = $this->id;
		}

		if ( isset( $cache[ $args[ 'widget_id' ] ] ) ) {
			echo $cache[ $args[ 'widget_id' ] ];
			return;
		}

		ob_start();

		$title = ( ! empty( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : '';
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance[ 'number' ] ) ) ? absint( $instance[ 'number' ] ) : 4;
		if ( ! $number ) {
			$number = 4;
		}

		$offset = ( ! empty( $instance[ 'offset' ] ) ) ? absint( $instance[ 'offset' ] ) : 0;
		if ( ! $offset ) {
			$offset = 0;
		}

		$exclude = ( ! empty( $instance[ 'exclude' ] ) ) ? $instance[ 'exclude' ] : false;
		if ( ! $exclude ) {
			$exclude = false;
		}

		$columns = ( ! empty( $instance[ 'columns' ] ) ) ? absint( $instance[ 'columns' ] ) : 4;
		if ( ! $columns ) {
			$columns = 4;
		}

		$show_thumb = isset( $instance[ 'show_thumb' ] ) ? $instance[ 'show_thumb' ] : false;
		if ( ! $show_thumb ) {
			$show_thumb = false;
		}

		$show_excerpt = isset( $instance[ 'show_excerpt' ] ) ? $instance[ 'show_excerpt' ] : false;
		if ( ! $show_excerpt ) {
			$show_excerpt = false;
		}

		$show_cat = isset( $instance[ 'show_cat' ] ) ? $instance[ 'show_cat' ] : false;
		if ( ! $show_cat ) {
			$show_cat = false;
		}

		$show_author = isset( $instance[ 'show_author' ] ) ? $instance[ 'show_author' ] : false;
		if ( ! $show_author ) {
			$show_author = false;
		}

		$show_date = isset( $instance[ 'show_date' ] ) ? $instance[ 'show_date' ] : false;
		if ( ! $show_date ) {
			$show_date = false;
		}

		$show_comments = isset( $instance[ 'show_comments' ] ) ? $instance[ 'show_comments' ] : false;
		if ( ! $show_comments ) {
			$show_comments = false;
		}

		$show_views = isset( $instance[ 'show_views' ] ) ? $instance[ 'show_views' ] : false;
		if ( ! $show_views ) {
			$show_views = false;
		}

		$show_review = isset( $instance[ 'show_review' ] ) ? $instance[ 'show_review' ] : false;
		if ( ! $show_review ) {
			$show_review = false;
		}

		$alignment = ( ! empty( $instance[ 'alignment' ] ) ) ? $instance[ 'alignment' ] : 'vertical';
		if ( ! $alignment ) {
			$alignment = 'vertical';
		}

		$show_border = isset( $instance[ 'show_border' ] ) ? $instance[ 'show_border' ] : false;
		if ( ! $show_border ) {
			$show_border = false;
		}

		$highlight = isset( $instance[ 'highlight' ] ) ? $instance[ 'highlight' ] : false;
		if ( ! $highlight ) {
			$highlight = false;
		}

		$show_more = isset( $instance[ 'show_more' ] ) ? $instance[ 'show_more' ] : false;
		if ( ! $show_more ) {
			$show_more = false;
		}

		$more_label = ( ! empty( $instance[ 'more_label' ] ) ) ? $instance[ 'more_label' ] : 'All news';
		if ( ! $more_label ) {
			$more_label = 'All news';
		}

		$more_url = ( ! empty( $instance[ 'more_url' ] ) ) ? $instance[ 'more_url' ] : false;
		if ( ! $more_url ) {
			$more_url = false;
		}

		$r_args = array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'offset'              => $offset,
			'orderby'             => 'meta_value_num',
			'meta_key'            => '_milkit_framework_post_views_count',
			'ignore_sticky_posts' => true
		);

		if ( $exclude ) {
			$exclude = explode( ',', $exclude );
			$r_args[ 'post__not_in' ] = $exclude;
		}

		$r = new WP_Query( $r_args );

		if ( $r->have_posts() ) :

		$is_full = false;
		$in_sidebar = true;

		switch ( $args['id'] ) {
			case 'milkit-sidebar-home-content':
				$is_full = ( get_option( 'milkit_opt_home_layout' ) == 'layout1' ) ? true : false;
				$in_sidebar = false;
				break;

			case 'milkit-sidebar-home-top':
			case 'milkit-sidebar-home-bottom':
				$is_full = true;
				$in_sidebar = false;
				break;
		}

		$r_post_thumb_size = 'milkit_440x293';

		if ( $columns == 1 ) {
			if ( $is_full ) {
				$r_post_thumb_size = 'milkit_1330x590';
			} else if ( $args['id'] == 'milkit-sidebar-home-content' ) {
				$r_post_thumb_size = 'milkit_886x590';
			}
		}

		if ( ( $columns == 2 ) && $is_full ) {
			$r_post_thumb_size = 'milkit_650x433';
		}

		if ( $alignment == 'horizontal' ) {
			$r_post_thumb_size = 'milkit_248x158';
		}

		if ( $in_sidebar ) {
			$columns = 1;
		}

		$has_border = $show_border ? 'has-border' : '';

		$has_thumb = ( !$show_thumb && ( $alignment == 'horizontal' ) ) ? 'no-thumb' : '';

		$r_post_module_classes = array(
			'post-module',
			'post-module-' . $columns . 'cols',
			$alignment,
			$has_thumb
		);
		$r_post_module_classes = array_map( 'esc_attr', $r_post_module_classes );
		?>

		<?php if ( $title ) : ?>
			<div class="section-title"><h4><?php echo esc_html( $title ); ?></h4></div>
		<?php endif; ?>

		<div class="post-modules wdgt <?php echo esc_attr( $alignment ); ?> <?php echo esc_attr( $has_border ); ?> <?php echo esc_attr( $highlight ? 'highlight' : '' ); ?>">

		<?php if ( $highlight ) : ?>
		<div class="post-modules-highlight">
		<?php endif; ?>

		<?php while ( $r->have_posts() ) : $r->the_post(); ?>

			<article <?php post_class( $r_post_module_classes ); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

				<?php if ( $show_thumb && ( ! post_password_required() && has_post_thumbnail() ) ) : ?>

				<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( $r_post_thumb_size, array( 'itemprop' => 'image' ) ); ?>
				</a>

				<?php endif; ?>

				<div class="post-module-content">

					<header class="entry-header">
						<?php /* Display category icon only if enabled */ ?>
						<?php if ( $show_cat ) {
							milkit_entry_cats();
						} ?>
						<?php the_title( sprintf( '<h2 itemprop="name" class="entry-title"><a itemprop="url" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<?php if ( ( $alignment != 'horizontal' ) && $show_excerpt ) : ?>
					<div class="entry-summary" itemprop="text">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
					<?php endif; ?>

					<footer class="entry-footer">
						<meta itemprop="interactionCount" content="UserComments:<?php echo esc_attr( get_comments_number() ); ?>">
						<div class="author-date">
							<?php
							$r_date_vis_var = ( ( $alignment != 'horizontal' ) && $show_date ) ? false : true;
							$r_author_vis_var = ( ( $alignment != 'horizontal' ) && $show_author ) ? false : true;
							milkit_post_date( $r_date_vis_var );
							milkit_post_author( $r_author_vis_var );
							?>
						</div><!-- .author-date -->

						<?php if ( $alignment != 'horizontal' ) : ?>
						<div class="comments-views">
							<?php if ( $show_comments ) {
								milkit_post_comments_count();
							}
							if ( $show_views && ( get_option( 'milkit_opt_blog_post_views_icon' ) == 'true' ) ) {
								do_action( 'milkit_display_post_views', get_the_ID() );
							} ?>
						</div><!-- .comments-views -->
						<?php endif; ?>
						<?php if ( $show_review ) {
							do_action( 'milkit_display_post_review_score', get_the_ID() );
						} ?>
					</footer><!-- .entry-footer -->

				</div><!-- .post-module-content -->

			</article><!-- #post-## -->
		<?php endwhile; ?>

		<?php if ( $highlight ) : ?>
		</div><!-- .post-modules-highlight -->
		<?php endif; ?>

		<?php if ( $show_more ) :
			$more_link = $more_url ? $more_url : get_permalink( get_option( 'page_for_posts' ) );
			if ( ! $more_url && get_option('show_on_front') == 'page' ) : ?>
				<div class="show-site-blog"><a href="<?php echo esc_url( $more_link ); ?>"><?php echo esc_html( $more_label ); ?></a></div>
			<?php elseif ( $more_url ) : ?>
				<div class="show-site-blog"><a href="<?php echo esc_url( $more_link ); ?>"><?php echo esc_html( $more_label ); ?></a></div>
			<?php endif; ?>
		<?php endif; ?>

		</div><!-- .post-modules -->

		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args[ 'widget_id' ] ] = ob_get_flush();
			wp_cache_set( 'milkit_widget_module_views', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'number' ] = (int) $new_instance[ 'number' ];
		$instance[ 'offset' ] = (int) $new_instance[ 'offset' ];
		$instance[ 'exclude' ] = strip_tags( $new_instance[ 'exclude' ] );
		$instance[ 'columns' ] = (int) $new_instance[ 'columns' ];
		$instance[ 'show_thumb' ] = isset( $new_instance[ 'show_thumb' ] ) ? (bool) $new_instance[ 'show_thumb' ] : false;
		$instance[ 'show_excerpt' ] = isset( $new_instance[ 'show_excerpt' ] ) ? (bool) $new_instance[ 'show_excerpt' ] : false;
		$instance[ 'show_cat' ] = isset( $new_instance[ 'show_cat' ] ) ? (bool) $new_instance[ 'show_cat' ] : false;
		$instance[ 'show_author' ] = isset( $new_instance[ 'show_author' ] ) ? (bool) $new_instance[ 'show_author' ] : false;
		$instance[ 'show_date' ] = isset( $new_instance[ 'show_date' ] ) ? (bool) $new_instance[ 'show_date' ] : false;
		$instance[ 'show_comments' ] = isset( $new_instance[ 'show_comments' ] ) ? (bool) $new_instance[ 'show_comments' ] : false;
		$instance[ 'show_views' ] = isset( $new_instance[ 'show_views' ] ) ? (bool) $new_instance[ 'show_views' ] : false;
		$instance[ 'show_review' ] = isset( $new_instance[ 'show_review' ] ) ? (bool) $new_instance[ 'show_review' ] : false;
		$instance[ 'alignment' ] = strip_tags( $new_instance[ 'alignment' ] );
		$instance[ 'show_border' ] = isset( $new_instance[ 'show_border' ] ) ? (bool) $new_instance[ 'show_border' ] : false;
		$instance[ 'highlight' ] = isset( $new_instance[ 'highlight' ] ) ? (bool) $new_instance[ 'highlight' ] : false;
		$instance[ 'show_more' ] = isset( $new_instance[ 'show_more' ] ) ? (bool) $new_instance[ 'show_more' ] : false;
		$instance[ 'more_label' ] = strip_tags( $new_instance[ 'more_label' ] );
		$instance[ 'more_url' ] = strip_tags( $new_instance[ 'more_url' ] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions[ 'milkit_widget_module_views' ] ) ) {
			delete_option( 'milkit_widget_module_views' );
		}

		return $instance;
	}

	public function flush_widget_cache() {
		wp_cache_delete( 'milkit_widget_module_views', 'widget' );
	}

	public function form( $instance ) {

		$title = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
		$number = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 4;
		$offset = isset( $instance[ 'offset' ] ) ? absint( $instance[ 'offset' ] ) : 0;
		$exclude = isset( $instance[ 'exclude' ] ) ? esc_attr( $instance[ 'exclude' ] ) : '';
		$columns = isset( $instance[ 'columns' ] ) ? absint( $instance[ 'columns' ] ) : 4;
		$show_thumb = isset( $instance[ 'show_thumb' ] ) ? (bool) $instance[ 'show_thumb' ] : true;
		$show_excerpt = isset( $instance[ 'show_excerpt' ] ) ? (bool) $instance[ 'show_excerpt' ] : false;
		$show_cat = isset( $instance[ 'show_cat' ] ) ? (bool) $instance[ 'show_cat' ] : true;
		$show_author = isset( $instance[ 'show_author' ] ) ? (bool) $instance[ 'show_author' ] : false;
		$show_date = isset( $instance[ 'show_date' ] ) ? (bool) $instance[ 'show_date' ] : false;
		$show_comments = isset( $instance[ 'show_comments' ] ) ? (bool) $instance[ 'show_comments' ] : false;
		$show_views = isset( $instance[ 'show_views' ] ) ? (bool) $instance[ 'show_views' ] : false;
		$show_review = isset( $instance[ 'show_review' ] ) ? (bool) $instance[ 'show_review' ] : false;
		$alignment = isset( $instance[ 'alignment' ] ) ? esc_attr( $instance[ 'alignment' ] ) : '';
		$show_border = isset( $instance[ 'show_border' ] ) ? (bool) $instance[ 'show_border' ] : false;
		$highlight = isset( $instance[ 'highlight' ] ) ? (bool) $instance[ 'highlight' ] : false;
		$show_more = isset( $instance[ 'show_more' ] ) ? (bool) $instance[ 'show_more' ] : false;
		$more_label = isset( $instance[ 'more_label' ] ) ? esc_attr( $instance[ 'more_label' ] ) : 'All news';
		$more_url = isset( $instance[ 'more_url' ] ) ? esc_attr( $instance[ 'more_url' ] ) : '';
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title (optional):', 'milkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', 'milkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php _e( 'Offset:', 'milkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="text" value="<?php echo esc_attr( $offset ); ?>" />
			<br>
			<small><?php _e( 'The offset of this query. If you have a module that shows 4 posts before this one, you can start the query from the 5th post (using offset 4).', 'milkit' ); ?></small>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>"><?php _e( 'Exclude:', 'milkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'exclude' ) ); ?>" type="text" value="<?php echo esc_attr( $exclude ); ?>" />
			<br>
			<small><?php _e( 'Type a list of posts IDs separated by commas (eg. 1,5,8) or leave the field empty.', 'milkit' ); ?></small>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('columns') ); ?>"><?php _e( 'Columns:', 'milkit' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('columns') ); ?>" name="<?php echo esc_attr( $this->get_field_name('columns') ); ?>">
				<option value="1" <?php selected( $columns, 1 ); ?>>1</option>
				<option value="2" <?php selected( $columns, 2 ); ?>>2</option>
				<option value="3" <?php selected( $columns, 3 ); ?>>3</option>
				<option value="4" <?php selected( $columns, 4 ); ?>>4</option>
				<option value="5" <?php selected( $columns, 5 ); ?>>5</option>
			</select>
			<br>
			<small><?php _e( 'This option works only if the widget is in the content area (ie. no in a sidebar). In a sidebar the layout becomes "stacked".', 'milkit' ); ?></small>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_thumb ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_thumb' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumb' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_thumb' ) ); ?>"><?php _e( 'Display thumbnail?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_excerpt ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_excerpt' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_excerpt' ) ); ?>"><?php _e( 'Display excerpt?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_cat ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_cat' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_cat' ) ); ?>"><?php _e( 'Display category icon?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_author ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_author' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>"><?php _e( 'Display author name?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php _e( 'Display post date?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_comments ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_comments' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_comments' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_comments' ) ); ?>"><?php _e( 'Display comments icon?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_views ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_views' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_views' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_views' ) ); ?>"><?php _e( 'Display views icon?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_review ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_review' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_review' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_review' ) ); ?>"><?php _e( 'Display review?', 'milkit' ); ?></label>
		</p>
		<small><?php _e( 'If the post is a review, you can show the final score.', 'milkit' ); ?></small>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('alignment') ); ?>"><?php _e( 'Alignment?', 'milkit' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id('alignment') ); ?>" name="<?php echo esc_attr( $this->get_field_name('alignment') ); ?>">
				<option value="vertical" <?php selected( $alignment, 'vertical' ); ?>>vertical</option>
				<option value="horizontal" <?php selected( $alignment, 'horizontal' ); ?>>horizontal</option>
			</select>
			<br>
			<small><?php _e( 'With "horizontal" only the thumbnail, the category, the title and the review are shown.', 'milkit' ); ?></small>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_border ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_border' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_border' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_border' ) ); ?>"><?php _e( 'Show border after widget (this option has no effect if the module is highlighted).', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $highlight ); ?> id="<?php echo esc_attr( $this->get_field_id( 'highlight' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'highlight' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'highlight' ) ); ?>"><?php _e( 'Highlight this section with a background color?', 'milkit' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_more ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_more' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_more' ) ); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_more' ) ); ?>"><?php _e( 'Display custom button?', 'milkit' ); ?></label>
		</p>
		<small><?php _e( 'Display a custom button to redirect the user to your preferred page (the blog page for example).', 'milkit' ); ?></small>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'more_label' ) ); ?>"><?php _e( 'Button label:', 'milkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'more_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'more_label' ) ); ?>" type="text" value="<?php echo esc_attr( $more_label ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'more_url' ) ); ?>"><?php _e( 'Button URL (optional):', 'milkit' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'more_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'more_url' ) ); ?>" type="text" value="<?php echo esc_attr( $more_url ); ?>" />
			<br>
			<small><?php _e( 'Type the URL of the page or leave the field empty to redirect the user to the blog page, which is the page that shows your most recent posts. Please note: you need a static front page in "Settings > Reading" to enable the button if you leave the field empty.', 'milkit' ); ?></small>
		</p>

	<?php }

}

add_action( 'widgets_init', 'milkit_widget_module_views' );

function milkit_widget_module_views() {
	register_widget( 'Milkit_Widget_Module_Views' );
}
