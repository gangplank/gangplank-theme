<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _straps
 * @since _straps 1.0
 */

get_header(); ?>
    <div class="row-fluid">
      <div class="span4 well">
        <h2 class="text-center">The Movement</h2>
        <p class="movement">
          Gangplank is about bringing creativity back to your community by connecting people and providing infrastructure and encouragement
          for people to explore and fail. A part of this is connecting your community on a deeper level and strengthening it in all aspects. 
          Our main goal is to get people back into touch with their creativity and connecting them to other creatives. In it's essence 
          Gangplank is restoring humanity to its members and their communities. To hear stories of how Gangplank is changing people's lives 
          and work, check out <a href="http://whatisgangplank.com" target="_blank">whatisgangplank.com</a>.
        </p>
      </div>

      <div class="span4 well">
        <h2 class="text-center">The Place</h2>
        <p class="movement">
          Want a Gangplank in your town? Gangplank doesn't recruit new locations. Instead, we rely on passionate individuals looking to 
          start a community of collaboration who believe in the <a href="/vision/manifesto" target="_blank">Gangplank philosophy</a>. If you are an individual 
          interested in bringing a Gangplank to your neighborhood, please view our <a href="http://wiki.gangplankhq.com/Heart-to-Start_Program." target="_blank" title="Heart to Start">Heart-to-Start Program</a>.
        </p>
        <p class="text-center">
          <a href="http://wiki.gangplankhq.com/Heart-to-Start_Program." target="_blank" class="btn btn-danger" title="Heart to Start">Start One!</a>
        </p>
      </div>

      <div class="span4 well">
        <h2 class="text-center">Participate</h2>
        <p class="movement">
          Gangplank initiatives are based on five core values:
        </p>
        <ul class="nav nav-list">
          <li><strong>Encouraging Chaos</strong> - Programs should push participant comfort levels, encourage out-of-the-box thinking and challenge society's norms</li>
          <li><strong>Economic Development</strong> - Retain and recruit talent to Arizona, as well as contribute back to the surround community</li>
          <li><strong>Create</strong> - Build, design, make; work on a project utilizing your creativity</li>
          <li><strong>Educate</strong> - Be ready to share your skills, as well as be willing to learn a new one</li>
          <li><strong>"Collaborate"</strong> - Programs encourage interactivity, as opposed to isolation</li>
          <li><strong>Educate</strong> - Be ready to share your skills, as well as be willing to learn a new one</li>
        </ul>
        <p>
          <br/>
          Visit our Initiatives page to view the mission and goals for each initiative, ranging from youth the arts to health.
        </p>
        <p class="text-center">
          <a class="btn btn-info">Get Involved!</a>
        </p>
      </div>
    </div>

  <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'content', 'page' ); ?>
  <?php endwhile; // end of the loop. ?>

    <hr/>
<!--
    <h2>The People</h2>
    <div class="row-fluid">
      <div class="span3 offset1">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" data-src="holder.js/64x64" src="http://www.gravatar.com/avatar/c9ddd25b4e0d82d7869734a4b944e567">
          </a>
          <div class="media-body">
            <h4 class="media-heading">Jade Meskill</h4>
            Co-Founder, Gangplank Collective
          </div>
        </div>
      </div>

      <div class="span3 offset1">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" data-src="holder.js/64x64" src="http://www.gravatar.com/avatar/631306e06de9205d62da57cc27bbcc04">
          </a>
          <div class="media-body">
            <h4 class="media-heading">Derek Neighbors</h4>
            Co-Founder, Gangplank Collective
          </div>
        </div>
      </div>

      <div class="span3 offset1">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" data-src="holder.js/64x64" src="http://www.gravatar.com/avatar/e480aa127b3548eabf4888d48154fcfd">
          </a>
          <div class="media-body">
            <h4 class="media-heading">Trish Gillam</h4>
            Executive Director, Gangplank Collective
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <br/>
        <a href="" class="pull-right">More Gangplankers...</a>
      </div>
    </div>

    <hr/>

    <h2>Our Partners</h2>
    <div class="row-fluid">
      <div class="span3 offset1">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" data-src="holder.js/64x64" src="http://www.gravatar.com/avatar/fc9ddd25b4e0d82d7869734a4b944e567">
          </a>
          <div class="media-body">
            <h4 class="media-heading">City of Chandler</h4>
            Chandler, Arizona
          </div>
        </div>
      </div>

      <div class="span3 offset1">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" data-src="holder.js/64x64" src="http://www.gravatar.com/avatar/f631306e06de9205d62da57cc27bbcc04">
          </a>
          <div class="media-body">
            <h4 class="media-heading">City of Avondale</h4>
            Avondale, Arizona
          </div>
        </div>
      </div>

      <div class="span3 offset1">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" data-src="holder.js/64x64" src="http://www.gravatar.com/avatar/fe480aa127b3548eabf4888d48154fcfd">
          </a>
          <div class="media-body">
            <h4 class="media-heading">intel</h4>
            Chandler, Arizona
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <br/>
        <a href="" class="pull-right">More Partners...</a>
      </div>
    </div>

-->
    <hr/>

<?php get_footer(); ?>
