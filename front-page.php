<?php
/**
 * The template for displaying the front page (home).
 *
 * @package _straps
 * @since _straps 1.0
 */

get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'page' ); ?>
  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
