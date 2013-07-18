<?php
/**
 * @package gp4
 * @since gp4 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h4 class="entry-title"><?php the_title(); ?></h4>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<a href="<?php echo get_permalink(); ?>"> Read More...</a>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
