<?php
/**
 * @package gp4
 * @since gp4 1.0
 */
?>

<article class="side-bar" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h4 class="entry-title"><?php the_title(); ?></h4>
	</header><!-- .entry-header -->

	<div class="entry-content no-margin">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
