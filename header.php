<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package gp4
 * @since gp4 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- TypeKit -->
<script type="text/javascript" src="//use.typekit.net/nzm0puf.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Gangplank</a>
    </div>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <?php if (has_nav_menu( 'primary' )) {
          $args['theme_location'] = 'primary';
          $args['container'] = '';
          $args['container_class'] = '';
          $args['menu_class'] = 'main-menu';
          $args['items_wrap'] = '%3$s';
          $args['walker'] = new menu_walker();
          wp_nav_menu($args);
        } ?>
        <li class="dropdown">
          <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Locations <b class="caret"></b></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
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
        </li>
      </ul>
    </div><!--/.navbar-collapse -->
  </div><!--/.container -->
</nav>
<div class="container main-body">
  <header class="header">
    <div class="row">
      <div class="logo col-lg-4">
        &nbsp;
      </div>
      <div class="col-lg-8">
        <span class="slogan pull-right"><?php echo get_post_meta($post->ID, '_gp4_slogan', true); ?></span>
      </div>
    </div>
  </header>

  <?php if (get_option( 'gangplank_settings_alert_enabled', false ) && get_option( 'gangplank_settings_alert_text', false )) { ?>
    <div class="alert alert-warning">
      <?php echo get_option( 'gangplank_settings_alert_text', false ); ?>
    </div>
  <?php } ?>

  <?php if (get_post_meta($post->ID, '_gp4_hero_title', true)) { ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="jumbotron featured">
          <h1><?php echo get_post_meta($post->ID, '_gp4_hero_title', true); ?></h1>
          <p>
            <span class="promo">
              <?php echo get_post_meta($post->ID, '_gp4_hero_subtitle', true); ?>
              <?php if (get_post_meta($post->ID, '_gp4_hero_button_url', true)) { ?>
                <a class="btn btn-primary btn-large" href="<?php echo get_post_meta($post->ID, '_gp4_hero_button_url', true); ?>"><?php echo get_post_meta($post->ID, '_gp4_hero_button_title', true); ?></a>
              <?php } ?>
            </span>
          </p>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if ( is_front_page() ) { ?>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <div class="text-center">
          <img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/img/future-of-collaboration.png">
        </div>
      </div>
    </div>
    </div> <!-- container -->
    <div class="center-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="text-center">
              <?php if ( get_post_meta( $post->ID, '_gp4_featured_column_one_title', true ) ) { ?>
                <?php echo get_post_meta($post->ID, '_gp4_featured_column_one_title', true); ?>
              <?php } ?>
            </h2>
          </div>
          <div class="col-lg-4">
            <h2 class="text-center">
              <?php if ( get_post_meta( $post->ID, '_gp4_featured_column_two_title', true ) ) { ?>
                <?php echo get_post_meta($post->ID, '_gp4_featured_column_two_title', true); ?>
              <?php } ?>
            </h2>
          </div>
          <div class="col-lg-4">
            <h2 class="text-center">
              <?php if ( get_post_meta( $post->ID, '_gp4_featured_column_three_title', true ) ) { ?>
                <?php echo get_post_meta($post->ID, '_gp4_featured_column_three_title', true); ?>
              <?php } ?>
            </h2>
          </div>
        </div> <!-- row -->
        <div class="row">
          <div class="col-lg-4">
            <p class="movement">
              <?php if ( get_post_meta($post->ID, '_gp4_featured_column_one_content', true ) ) { ?>
                <?php echo get_post_meta($post->ID, '_gp4_featured_column_one_content', true); ?>
              <?php } ?>
            </p>
          </div>
         <div class="col-lg-4">
            <p class="movement">
              <?php if ( get_post_meta($post->ID, '_gp4_featured_column_two_content', true ) ) { ?>
                <?php echo get_post_meta($post->ID, '_gp4_featured_column_two_content', true); ?>
              <?php } ?>
            </p>
          </div>
         <div class="col-lg-4">
            <p class="movement">
              <?php if ( get_post_meta($post->ID, '_gp4_featured_column_three_content', true ) ) { ?>
                <?php echo get_post_meta($post->ID, '_gp4_featured_column_three_content', true); ?>
              <?php } ?>
            </p>
          </div>
        </div> <!-- row -->
        <div class="row">
          <div class="col-lg-4">
            <?php if (get_post_meta($post->ID, '_gp4_featured_column_one_button_title', true)) { ?>
              <p class="text-center">
                <a class="btn btn-default" href="<?php echo get_post_meta($post->ID, '_gp4_featured_column_one_button_url', true) ?>"><?php echo get_post_meta($post->ID, '_gp4_featured_column_one_button_title', true) ?></a>
              </p>
            <?php } ?>
          </div>
          <div class="col-lg-4">
            <?php if (get_post_meta($post->ID, '_gp4_featured_column_two_button_title', true)) { ?>
              <p class="text-center">
                <a class="btn btn-default" href="<?php echo get_post_meta($post->ID, '_gp4_featured_column_two_button_url', true) ?>"><?php echo get_post_meta($post->ID, '_gp4_featured_column_two_button_title', true) ?></a>
              </p>
            <?php } ?>
          </div>
          <div class="col-lg-4">
            <?php if (get_post_meta($post->ID, '_gp4_featured_column_three_button_title', true)) { ?>
              <p class="text-center">
                <a class="btn btn-default" href="<?php echo get_post_meta($post->ID, '_gp4_featured_column_three_button_url', true) ?>"><?php echo get_post_meta($post->ID, '_gp4_featured_column_three_button_title', true) ?></a>
              </p>
            <?php } ?>
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- center-block -->
    <div class="container main-body">
  <?php } ?>
