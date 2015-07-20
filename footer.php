<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Milkit
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<div class="site-footer__inner">
      <section class='footer-section'>
        <h1 class='section-title'><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
        <div class="description"><?php bloginfo('description'); ?></div>
      </section>
      <section class='footer-section'>
        <ol>
          <h4 class='section-title'>QUICK LINKS</h4>
          <li><a href="/" rel="nofollow">Home</a></li>
          <li><a href="/terms-conditions" rel="nofollow">Terms &amp; Conditions</a></li>
          <li><a href="/privacy-policy/" rel="nofollow">Privacy Policy</a></li>
          <li><a href="/sitemap/" rel="nofollow">Sitemap</a></li>
        </ol>
      </section>

      <section class='footer-section section-categories'>
        <ol class='footer-cats'>
          <h4 class='section-title'>CATEGORIES</h4>
          <?php

          $args = array(
            'type'                     => 'post',
            'parent'                   => '',
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'taxonomy'                 => 'category',
            'pad_counts'               => false
          );

          $categories = get_categories($args);

          foreach ( $categories as $cat) {
            $category_link = get_category_link($cat); ?>
            <li><a href="<?php echo esc_url( $category_link ); ?>" title="Category Name"><?php echo $cat->name; ?></a></li>
            <?php
          }

        ?>
        </ol>
      </section>
      <section class='footer-section section-search'>
      <?php get_search_form(); ?>
      </section>
      <div class="copyright">&copy; 2015 Guthy Renker. All Rights Reserved.</div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
