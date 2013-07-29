<?php
/**
 * @package gp4
 * @since gp4 1.0
 * Template Name: Mobile Device Form
 */

?>

<!DOCTYPE html>
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



	<div class="container-fluid">  
	  <header class="header">
	    <div class="row-fluid">
	      <div class="logo span4" style="margin-top: 0px; padding-top: 0px;">
	        &nbsp;
	      </div>
	      <div class="span8">
	        <h1 class="slogan pull-right"><?php echo get_post_meta($post->ID, '_gp4_slogan', true); ?></h1>
	      </div>
	    </div>
	  </header>
    <div class="row-fluid">
			<div class="span12 offset2 lead">
				<?php echo get_the_title(); ?> 
			</div>
    </div>
	</div>
	
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
