<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _straps
 * @since _straps 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="navbar navbar-inverse navbar-static-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="/">Gangplank</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
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
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
<div class="container-fluid">  
  <header class="header">
    <div class="row-fluid">
      <div class="logo span4">
        &nbsp;
      </div>
      <div class="span8">
        <h1 class="slogan pull-right"><?php echo get_post_meta($post->ID, '_gp4_slogan', true); ?></h1>
      </div>
    </div>
  </header>

  <?php if (get_option( 'gangplank_settings_alert_enabled', false ) && get_option( 'gangplank_settings_alert_text', false )) { ?>
  <div class="alert">
    <?php echo get_option( 'gangplank_settings_alert_text', false ); ?>
  </div>
  <?php } ?>

  <?php if (get_post_meta($post->ID, '_gp4_hero_title', true)) { ?>
  <div class="row-fluid">
    <div class="span12">
      <div class="hero-unit featured">
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
  <?php 
    if ( is_front_page() ) { ?>
      <div class="row-fluid">
        <?php if ( get_post_meta( $post->ID, '_gp4_featured_column_one_title', true ) && get_post_meta($post->ID, '_gp4_featured_column_one_content', true ) ) { ?>
          <div class="span4 well well-featurette">
            <h2 class="text-center">
              <?php echo get_post_meta($post->ID, '_gp4_featured_column_one_title', true); ?>
            </h2>
            <p class="movement">
              <?php echo get_post_meta($post->ID, '_gp4_featured_column_one_content', true); ?>
            </p>
            <?php if (get_post_meta($post->ID, '_gp4_featured_column_one_button_title', true)) { ?>
              <p class="text-center">
                <a target="_blank" class="btn btn-info" href="<?php echo get_post_meta($post->ID, '_gp4_featured_column_one_button_url', true) ?>"><?php echo get_post_meta($post->ID, '_gp4_featured_column_one_button_title', true) ?></a>
              </p>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if ( get_post_meta( $post->ID, '_gp4_featured_column_two_title', true ) && get_post_meta($post->ID, '_gp4_featured_column_two_content', true ) ) { ?>
          <div class="span4 well well-featurette">
            <h2 class="text-center">
              <?php echo get_post_meta($post->ID, '_gp4_featured_column_two_title', true); ?>
            </h2>
            <p class="movement">
              <?php echo get_post_meta($post->ID, '_gp4_featured_column_two_content', true); ?>
            </p>
            <?php if (get_post_meta($post->ID, '_gp4_featured_column_two_button_title', true)) { ?>
              <p class="text-center">
                <a target="_blank" class="btn btn-danger" href="<?php echo get_post_meta($post->ID, '_gp4_featured_column_two_button_url', true) ?>"><?php echo get_post_meta($post->ID, '_gp4_featured_column_two_button_title', true) ?></a>
              </p>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if ( get_post_meta( $post->ID, '_gp4_featured_column_three_title', true ) && get_post_meta($post->ID, '_gp4_featured_column_three_content', true ) ) { ?>
          <div class="span4 well well-featurette">
            <h2 class="text-center">
              <?php echo get_post_meta($post->ID, '_gp4_featured_column_three_title', true); ?>
            </h2>
            <p class="movement">
              <?php echo get_post_meta($post->ID, '_gp4_featured_column_three_content', true); ?>
            </p>
            <?php if (get_post_meta($post->ID, '_gp4_featured_column_three_button_title', true)) { ?>
              <p class="text-center">
                <a target="_blank" class="btn btn-info" href="<?php echo get_post_meta($post->ID, '_gp4_featured_column_three_button_url', true) ?>"><?php echo get_post_meta($post->ID, '_gp4_featured_column_three_button_title', true) ?></a>
              </p>
            <?php } ?>
          </div>
        <?php } ?>
    </div>
<?php } ?>
