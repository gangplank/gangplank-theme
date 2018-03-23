<?php
/**
 * The Template for displaying all single posts.
 *
 * @package gp4
 * @since gp4 1.0
 */

get_header(); ?>
<div class="row">
	<div class="col-lg-7">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>
				<?php _straps_content_nav( 'nav-below' ); ?>


				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>
	</div>
	<div class="col-lg-5 pull-right">
		  <p class="text-center">
				<a href="http://gangplankhq.com/get-involved">
					<button class="btn btn-large btn-block btn-success" type="button">Get Involved!</button>
				</a>
			</p>

	    <div class="well">
	      <h3>Locations</h3>
				<h4><a href="../avondale">Avondale, AZ</a></h4>
				<h4><a href="../chandler">Chandler, AZ</a></h4>
				<h4><a href="../queen-creek/">Queen Creek, AZ</a></h4>
				<h4><a href="../start">Start</a> a Gangplank in your city!</h4>
			</div>
	</div>
</div>
<?php get_footer(); ?>
