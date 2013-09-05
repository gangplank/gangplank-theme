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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.2.3/css/normalize.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.2.3/css/foundation.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.2.3/js/foundation.min.js"></script>

<script>
window.onload = function() {
  document.getElementById("input_20_1").focus();
}
</script>
</head>

<body <?php body_class(); ?>>
	<div class="container-fluid">  
		<header class="header">
			<div class="row-fluid">
				<div class="logo span4" style="margin-top: 0px; padding-top: 0px;">
					&nbsp;
				</div>
			</div>
		</header>
		<div class="row-fluid">
			<div class="span12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>
</body>

</html>