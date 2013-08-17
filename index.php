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
<div class="row-fluid">
	<div class="span7">
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
	
	<div class="span5 pull-right">
		  <p class="text-center">
				<a href="http://gangplankhq.com/get-involved">
					<button class="btn btn-large btn-block btn-success" type="button">Get Involved!</button>
				</a>
			</p>

	    <div class="well">
	      <h3>Locations</h3>
				<h4><a href="../avondale">Avondale, AZ</a></h4>
				<h4><a href="../chandler">Chandler, AZ</a></h4>
				<h4><a href="../richmond">Richmond, VA</a></h4>
				<h4><a href="../sault">Sault St. Marie, ON</a></h4>
				<h4><a href="../tucson">Tucson, AZ</a></h4>
				<h4><a href="../start">Start</a> a Gangplank in your city!</h4>
			</div>
			
			
	    <div class="well">
	      <h3>Upcoming Events</h3>
	      <?php
	        $em_categories = new EM_Categories();
	        $em_category_ids = array();
	        $em_neg_category_ids = array();
	        foreach ($em_categories->get() as $em_category) {
	          if (in_array($em_category->name, $category_names)) {
	            $em_category_ids[] = $em_category->id;
	          } else {
	            $em_neg_category_ids[] = '-' . $em_category->id;
	          }
	        }
	        $em_category_ids = array(join(',', $em_category_ids), join(',', $em_neg_category_ids));
	      ?>
	      <?php $em_events = new EM_Events(); echo $em_events->output(array('category' => join(',', $em_category_ids), 'format_header' => '', 'format' => '<div class="row-fluid event"><div class="span4 date">#_{m/d h:ia} #@_{-<br/> m/d h:ia}</div><div class="span8">#_EVENTLINK{has_room}<br/>#_ATT{room} {/has_room}<br/>#_EVENTEXCERPT</div></div>')); ?>
	      <div class="row-fluid">
	        <div class="span12">
	          <br/>
	          <a href="" class="pull-right">More Events...</a>
	        </div>
	      </div>
	    </div>
	</div>

	
	
</div>
<?php get_footer(); ?>
