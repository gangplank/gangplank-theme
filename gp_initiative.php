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
		      $categories = array_map(
		        function($value) { return $value->cat_ID; }, 
		        get_the_category( $post->ID )
		      );
		      $wp_query = new WP_Query();
		      $wp_query->query(array('category__in' => $categories, 'posts_per_page' => 3));
		    ?>
		    <?php while ( have_posts() ) : the_post(); ?>
		      <?php get_template_part( 'content', 'summary' ); ?>
		    <?php endwhile; // end of the loop. ?>
				</div>
				
		    <hr/>

		    <h3>Upcoming Events</h3>
		    <div class="row-fluid event">
		      <div class="span1 date"><a href="">April 4</a></div>
		      <div class="span2"><a href="">Chandler</a> &raquo; <a href="">Magic Space</a></div>
		      <div class="span9"><a href="">Some Random Event</a> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      consequat.
		      </div>
		    </div>
		    <div class="row-fluid event">
		      <div class="span1 date"><a href="">April 4</a></div>
		      <div class="span2"><a href="">Avondale</a> &raquo; <a href="">Magic Space</a></div>
		      <div class="span9"><a href="">Some Random Event</a> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      consequat.
		      </div>
		    </div>
		    <div class="row-fluid event">
		      <div class="span1 date"><a href="">April 4</a></div>
		      <div class="span2"><a href="">Chandler</a> &raquo; <a href="">Magic Space</a></div>
		      <div class="span9"><a href="">Some Random Event</a> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      consequat.
		      </div>
		    </div>
		    <div class="row-fluid event">
		      <div class="span1 date"><a href="">April 4</a></div>
		      <div class="span2"><a href="">Chandler</a> &raquo; <a href="">Magic Space</a></div>
		      <div class="span9"><a href="">Some Random Event</a> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		      consequat.
		      </div>
		    </div>
		    <div class="row-fluid">
		      <div class="span12">
		        <br/>
		        <a href="" class="pull-right">More Events...</a>
		      </div>
		    </div>


      </div>
    </div>


<?php get_footer(); ?>
