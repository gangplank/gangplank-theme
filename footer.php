<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package gp4
 * @since gp4 1.0
 */
?>

<!-- <div class="row">
  <div class="col-lg-12 well">
    <div class="row">
      <div class="col-lg-8">
        <p class="signup">Stay in touch with us. We promise never to spam you.</p>
      </div>
      <div class="col-lg-4">
        <form class="form-inline no-margin pull-right">
          <input type="text" name="email" placeholder="email" />
          <input type="text" class="input-small" name="zipcode" placeholder="zip/province" />
          <button class="btn btn-primary">Sign up</p>
        </form>
      </div>
    </div>
  </div>
</div> -->

</div> <!-- /container -->

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <ul class="nav">
          <li class="nav-header">Links</li>
            <?php if (has_nav_menu( 'footer_col_1' )) {
              $args['container'] = '';
              $args['container_class'] = '';
              $args['menu_class'] = 'footer-menu';
              $args['items_wrap'] = '%3$s';
              $args['theme_location'] = 'footer_col_1';
              $args['walker'] = new menu_walker();
              wp_nav_menu($args);
            } ?>
        </ul>
      </div>

      <div class="col-lg-4">
        <ul class="nav">
          <li class="nav-header">Initiatives</li>
            <?php if (has_nav_menu( 'footer_col_2' )) {
              $args['container'] = '';
              $args['container_class'] = '';
              $args['menu_class'] = 'footer-menu';
              $args['items_wrap'] = '%3$s';
              $args['theme_location'] = 'footer_col_2';
              $args['walker'] = new menu_walker();
              wp_nav_menu($args);
            } ?>
        </ul>
      </div>

      <div class="col-lg-4">
        <ul class="nav">
          <li class="nav-header">Locations<li>
            <?php if (has_nav_menu( 'footer_col_3' )) {
              $args['container'] = '';
              $args['container_class'] = '';
              $args['menu_class'] = 'footer-menu';
              $args['items_wrap'] = '%3$s';
              $args['theme_location'] = 'footer_col_3';
              $args['walker'] = new menu_walker();
              wp_nav_menu($args);
            } ?>
        </ul>
      </div>

    </div>

    <div class="row">
      <img src="<?php bloginfo('stylesheet_directory'); ?>/img/knucklehead-white.png" height="230">
    </div>

    <div class="row">
      <p><small>&copy; Copyright <?php  echo date("Y"); ?> Gangplank Collective</small></p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

<style type="text/css">
  .jumbotron.featured {
    background: url(<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); echo $thumb[0] ?>) center -100px;
    <?php if ($thumb) { echo "color: #fff;"; } ?>
    background-size: 100% auto;
  }
</style>

</body>
</html>
