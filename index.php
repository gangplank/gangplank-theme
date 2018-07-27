<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package gp4
 * @since gp4 1.0
 */

get_header(); ?>
<div class="row">
	<div class="col-lg-7">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php _straps_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>
	</div>

	<div class="col-lg-5 pull-right">
		  <p class="text-center">
				<a href="http://gangplankhq.com/get-involved">
					<button class="btn btn-large btn-block btn-success" type="button">Get Involved!</button>
				</a>
			</p>
<?php home_url( '/avondale/' ) ?>
	    <div class="well">
	      <h3>Locations</h3>
				<h4><a href="<?php home_url( 'avondale/' ) ?>">Avondale, AZ</a></h4>
				<h4><a href="<?php home_url( 'chandler/' ) ?>">Chandler, AZ</a></h4>
				<h4><a href="<?php home_url( 'queen-creek/' ) ?>">Queen Creek, AZ</a></h4>
				<h4><a href="<?php home_url( 'get-involved/' ) ?>">Start</a> a Gangplank in your city!</h4>
			</div>
	</div>
</div>
<?php get_footer(); ?>
