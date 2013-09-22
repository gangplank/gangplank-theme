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

	<meta name="viewport" content="width=device-width, initial-scale=1.0, max-scale=1.0, min-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.2.3/css/normalize.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/4.2.3/css/foundation.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/foundation/4.2.3/js/foundation.min.js"></script>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?> ">
	<style type="text/css">
		html {
			height: 100%;
		}
		body {
			padding: 23pt;
			height:100%;
		}
		li {
			list-style: none;
		}
		.gfield_required {
			color: red;
		}
		input[type=text],
		input[type=email] {
			-webkit-filter: opacity(0.77);
		}
		.gform_heading {
			font-size: 2.3em;
			line-height: 1em;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$("input[type='text']").val('');
			$("input[type='email']").val('');
			$("input[tabindex='1']").focus().blur().focus();
			$("input[tabindex='1']").attr('autofocus', '');
		});
	</script>
</head>

<body <?php body_class(); ?>>
	<div class="container">  
		<header class="header">
			<div class="row">
				<div class="logo col-lg-4" style="margin-top: 0px; padding-top: 0px;">
					&nbsp;
				</div>
			</div>
		</header>
		<div class="row">
			<div class="col-lg-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>
</body>

</html>
