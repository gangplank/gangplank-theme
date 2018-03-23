<?php
/**
 * @package gp4
 * @since gp4 1.0
 * Template Name: Location v2018
 */

$parent_id    = empty( $post->post_parent ) ? $post->ID : $post->post_parent;
$parent_title = empty( $parent_id ) ? get_the_title( $parent_id ) : get_the_title( $parent_id );
$parent_link  = get_the_permalink( $parent_id );
		
$child_pages = wp_list_pages( array(
    'sort_column' => $sort,
    'sort_order'  => $sort_order,
    'title_li'    => '',
    'child_of'    => ( is_page() && $post->post_parent ? $post->post_parent : $post->ID ),
    'echo'        => false
) );

// Location info
$hours   = get_field( 'hours' );
$address = get_field( 'address' );

$engage_links = array_map( function ($link) {
    $data = explode( '|', $link );

    return array(
        'text' => $data[0],
        'link' => $data[1],
    );
}, explode( "\r\n", get_field( 'engage_links' ) ) );

// Social
$twitter   = get_field( 'twitter_url' );
$facebook  = get_field( 'facebook_url' );
$instagram = get_field( 'instagram_url' );
$email     = get_field( 'email_url' );
$meetup    = get_field( 'meetup_url' );
$slack     = get_field( 'slack_url' );
$youtube   = get_field( 'youtube_url' );
$linkedin  = get_field( 'linkedin_url' );

get_header();
?>

<?php if ( ! empty( $child_pages ) ) : ?>
<ul class="list-unstyled">
    <li><a href="<?php echo $parent_link; ?>"><strong><?php echo $parent_title; ?></a></li>
    <?php echo $child_pages; ?>
</ul>
<?php endif; ?>

<h1><?php the_title(); ?></h1>

<div class="row">
    <div class="col-md-5">
        <?php if ( ! empty( $hours ) ) : ?>
        <h4>Regular Hours</h4>
        <p><?php echo $hours; ?></p>
        <?php endif; ?>
        <?php if ( ! empty( $address ) ) : ?>
        <h4>Physical Address</h4>
        <p><?php echo nl2br( $address ); ?></p>
        <?php endif; ?>
        <?php if ( ! empty( $engage_links ) ) : ?>
        <h4>Engage</h4>
        <div class="row">
            <?php foreach ( $engage_links as $link ) : ?>
            <div class="col-md-6"><a href="<?php echo $link['link']; ?>" class="btn btn-primary btn-block"><?php echo $link['text']; ?></a></div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <?php if ( ! empty( $address ) ) : ?>
        <h4>Map</h4>
        <iframe
            width="100%"
            height="450"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC8GuhJac3gJixjv1II6s8aEAMi95By5Os&q=<?php echo urlencode( get_field( 'address' ) ); ?>" allowfullscreen>
        </iframe>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <?php if ( ! empty( get_the_content() ) ) : ?>
        <?php the_content(); ?>
        <hr>
        <?php endif; ?>

        <h4>Recent Posts</h4>
        <?php 
            $categories = get_the_category( $post->ID );

            $category_ids = array_map( function ( $value ) {
                return $value->cat_ID;
            }, $categories );

            $category_names = array_map( function ( $value ) {
                return $value->name;
            }, $categories );

            $wp_query = new WP_Query();
            $wp_query->query( array(
                'category__in'   => $category_ids,
                'posts_per_page' => 3
            ) );
        ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'summary' ); ?>
        <?php endwhile; // end of the loop. ?>
    </div>
    <div class="col-md-4">
        <h4>Engage With Us</h4>
        <?php if ( ! empty( $twitter ) ) : ?>
        <a href="<?php echo $twitter; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-twitter"></i> Twitter</a>
        <?php endif; ?>
        <?php if ( ! empty( $facebook ) ) : ?>
        <a href="<?php echo $facebook; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-facebook-official"></i> Facebook</a>
        <?php endif; ?>
        <?php if ( ! empty( $instagram ) ) : ?>
        <a href="<?php echo $instagram; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-instagram"></i> Instagram</a>
        <?php endif; ?>
        <?php if ( ! empty( $email ) ) : ?>
        <a href="<?php echo $email; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-email"></i> Email</a>
        <?php endif; ?>
        <?php if ( ! empty( $meetup ) ) : ?>
        <a href="<?php echo $meetup; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-meetup"></i> Meetup</a>
        <?php endif; ?>
        <?php if ( ! empty( $slack ) ) : ?>
        <a href="<?php echo $slack; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-slack"></i> Slack</a>
        <?php endif; ?>
        <?php if ( ! empty( $youtube ) ) : ?>
        <a href="<?php echo $youtube; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-youtube-play"></i> YouTube</a>
        <?php endif; ?>
        <?php if ( ! empty( $linkedin ) ) : ?>
        <a href="<?php echo $linkedin; ?>" class="btn btn-default" target="_blank" rel="noopener"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
        <?php endif; ?>

        <?php
            $em_categories = new EM_Categories();
            $em_category_ids = array();
            
            foreach ( $em_categories->get() as $em_category ) {
                if ( in_array( $em_category->name, $category_names ) ) {
                    $em_category_ids[] = $em_category->id;
                }
            }
        ?>
        <?php $em_events = new EM_Events(); echo $em_events->output(array('category' => join(',', $em_category_ids), 'format_header' => '', 'format' => '<div class="row event"><div class="col-lg-4 date">#_{m/d h:ia} #@_{-<br/> m/d h:ia}</div><div class="col-lg-8">#_EVENTLINK{has_room}<br/>#_ATT{room} {/has_room}<br/>#_EVENTEXCERPT</div></div>')); ?>
    </div>
</div>

<?php
get_footer();
