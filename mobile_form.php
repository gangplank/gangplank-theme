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