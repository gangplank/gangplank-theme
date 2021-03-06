<?php
/**
 * @package gp4
 * @since gp4 1.0
 * Template Name: Location Initiative
 */
get_header(); ?>



<div class="row">
  <div class="col-lg-7">
		<?php while ( have_posts() ) : the_post(); ?>
		  <?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>
	</div>

  <div class="col-lg-5 pull-right">
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
	      $wp_query->query(array('category__and' => $category_ids, 'posts_per_page' => 3));
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
      <?php $em_events = new EM_Events(); echo $em_events->output(array('category' => join(',', $em_category_ids), 'format_header' => '', 'format' => '<div class="row event"><div class="col-lg-4 date">#_{m/d h:ia} #@_{-<br/> m/d h:ia}</div><div class="col-lg-8">#_EVENTLINK{has_room}<br/>#_ATT{room} {/has_room}<br/>#_EVENTEXCERPT</div></div>')); ?>
      <div class="row">
        <div class="col-lg-12">
          <br/>
          <a href="" class="pull-right">More Events...</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
