<?php
/**
 * @package gp4
 * @since gp4 1.0
 * Template Name: Initiative
 */

get_header(); ?>



    <div class="row-fluid">
      <div class="span7">
			  <?php while ( have_posts() ) : the_post(); ?>
			    <?php get_template_part( 'content', 'page' ); ?>
			  <?php endwhile; // end of the loop. ?>
			</div>

      <div class="span5 pull-right">
				  <p class="text-center">
						<a href="http://gangplankhq.com/get-involved">
							<button class="btn btn-large btn-block btn-success" type="button">Get Involved!</button>
						</a>
					</p>

				
				<div class="well">
		    <h3>Recent Posts</h3>
		    <?php 
		      $categories = get_the_category( $post->ID );
		      $category_ids = array_map(
		        function($value) { return $value->cat_ID; },
			  $categories
		      );
		      $category_names = array_map(
			  function($value) { return $value->name; },
			  $categories
		      );
		      $wp_query = new WP_Query();
		      $wp_query->query(array('category__in' => $category_ids, 'posts_per_page' => 3));
		    ?>
		    <?php while ( have_posts() ) : the_post(); ?>
		      <?php get_template_part( 'content', 'summary' ); ?>
		    <?php endwhile; // end of the loop. ?>
				</div>
				
		    <div class="well">
		      <h3>Upcoming Events</h3>
		      <?php
		        $em_categories = new EM_Categories();
		        $em_category_ids = array();
		        foreach ($em_categories->get() as $em_category) {
		          if (in_array($em_category->name, $category_names)) {
		            $em_category_ids[] = $em_category->id;
		          }
		        }
		      ?>
		      <?php $em_events = new EM_Events(); echo $em_events->output(array('category' => join(',', $em_category_ids), 'format_header' => '', 'format' => '<div class="row-fluid event"><div class="span4 date">#_{m/d h:ia} #@_{-<br/> m/d h:ia}</div><div class="span8">#_EVENTLINK<br/>@ #_LOCATIONLINK{has_room}<br/>#_ATT{room} {/has_room}<br/>#_EVENTEXCERPT</div></div>')); ?>
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
