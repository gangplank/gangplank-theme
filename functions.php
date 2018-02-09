<?php
/**
 * GP4 functions and definitions
 *
 * @package GP4
 * @since GP4 1.1
 */

/**
 * Admin area includes.
 * 
 * @since GP4 1.0
 */
if ( is_admin() ) {
    include 'library/admin/admin-write.php';
    include 'library/admin/admin-theme-settings.php';
}

if ( ! function_exists( 'gp4_setup' ) ) {
    /**
     * Register GP navigation menus.
     * 
     * @since GP4 1.0
     */
    function gp4_setup() {
      register_nav_menus( array(
        'primary'      => __( 'Main Menu', 'gp4'),
        'footer_col_1' => __( 'Footer Col 1', 'gp4' ),
        'footer_col_2' => __( 'Footer Col 2', 'gp4' ),
        'footer_col_3' => __( 'Footer Col 3', 'gp4' ),
        'chandler_main' => __( 'Chandler Main Menu', 'gp4'),
      ) );
    }
}
add_action( 'after_setup_theme', 'gp4_setup' );

/**
 * Queue Google Webfont (Open Sans Condensed)
 *
 * @link http://stackoverflow.com/a/12380004/2096500
 * @since GP4 1.1
 */
// function webfont_rokkitt() {
//   wp_register_style('rokkitt', 'http://fonts.googleapis.com/css?family=Rokkitt:400,700');
//   wp_enqueue_style('rokkitt');
//   }

// add_action('wp_print_styles', 'webfont_rokkitt');


/**
 * Custom Excerpt Filters
*/
function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
    return ' [ <a href="'. get_permalink( get_the_ID() ) . '">...</a> ]';   
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Fontawesome 5 Pro:
*/
function enqueue_fontawesome_pro() {
    wp_enqueue_style( 'fontawesome-pro-css', get_stylesheet_directory_uri() . '/fontawesome/fa-svg-with-js.css' );
    wp_enqueue_script( 'fontawesome-pro-js', get_stylesheet_directory_uri() . '/fontawesome/fontawesome-all.min.js', array(), null );
}
add_action( 'wp_enqueue_scripts', 'enqueue_fontawesome_pro' );

/**
 * Member Shortcode
*/
// [member-profile avatar="http://img.jpg" name="Person Name" badges="spotify,utensils"]

function add_member_shortcode( $atts ) {
  $a = shortcode_atts( array(
    'avatar' => 'something',
    'name' => 'Default Name',
    'badges' => 'spotify,utensils'
  ), $atts );

  $avatar = $a['avatar'];
  $name = $a['name'];
  $badges = $a['badges'];
  $badges_exploded = explode(',', $a['badges']);

  $html = <<<END
    <div class="col-sm-4 member">
      <img src="$avatar" />
      <div class="member-name">$name</div>
      <div class="member-badges">
END;

  $badge_index = array(
    'gamepad' => array('fas', 'fa-gamepad', 'gamer'),
    'blind' => array('fas', 'fa-blind', 'bryan :)'),
    'empire' => array('fab', 'fa-empire', 'turned to the darkside'),
    'rebel' => array('fab', 'fa-rebel', 'identifies as rebel scum'),
    'etsy' => array('fab', 'fa-etsy', 'has etsy shop'),
    'user-plus' => array('fas', 'fa-user-plus', 'has brought a friend'),
    'utensils' => array('fas', 'fa-utensils', 'has gone to lunch with other GPers'),
    'alarm-clock' => array('fas', 'fa-alarm-clock', 'Has opened the space'),
    'amazon' => array('fab', 'fa-amazon', 'Has bought something from amazon for the [space'),
    'anchor' => array('fas', 'fa-anchor', 'Is considered an anchor'),
    'beer' => array('fas', 'fa-beer', 'has brewed beer at gangplank'),
    'book' => array('fas', 'fa-book', 'has participated in book club'),
    'gamepad' => array('fas', 'fa-gamepad', 'has won a tournament'),
    'spotify' => array('fab', 'fa-spotify', 'has controlled the music'),
    'paw' => array('fas', 'fa-paw', 'has brought dog in'),
    'recycle' => array('fas', 'fa-recycle', 'has taken out the trash'),
    'rss' => array('fas', 'fa-rss', 'provided blog content'),
    'ticket' => array('fas', 'fa-ticket', 'has attended event '),
    'trophy-alt' => array('fas', 'fa-trophy-alt', 'gangplanker of week'),
    'uber' => array('fab', 'fa-uber', 'has ubered to GP'),
    'podcast' => array('fas', 'fa-podcast', 'has recorded a podcast'),
    'bullhorn' => array('fas', 'fa-bullhorn', 'has spoken at a gangplank event'),
    'camera-retro' => array('fas', 'fa-camera-retro', 'has posted photo of gangplank on [social media'),
    'd-and-d' => array('fab', 'fa-d-and-d', 'has played in a RPG at GP'),
    'calendar' => array('fas', 'fa-calendar', 'has organized an event'),
    'info-circle' => array('fas', 'fa-info-circle', 'has given a tour'),
    'moon' => array('fas', 'fa-moon', 'has closed'),
    'tasks' => array('fas', 'fa-tasks', 'has completed a trello task'),
    'birthday-cake' => array('fas', 'fa-birthday-cake', 'been a member x years'),
    'bus' => array('fas', 'fa-bus', 'has been on a GP road trip'),
    'code' => array('fas', 'fa-code', 'has contributed code to GP'),
    'gift' => array('fas', 'fa-gift', 'has donated to gangplank'),
    'motorcycle' => array('fas', 'fa-motorcycle', 'has ridden a motorcyle to GP'),
    'poo' => array('fas', 'fa-poo', 'has pooped at GP'),
    'product-hunt' => array('fab', 'fa-product-hunt', 'has released a product on product [hunt'),
    'sticker-mule' => array('fab', 'fa-sticker-mule', 'has GP sticker on laptop'),
    'react' => array('fab', 'fa-react', 'willing to help with react'),
    'python' => array('fab', 'fa-python', 'willing to help with python'),
    'angular' => array('fab', 'fa-angular', 'willing to help on angular topics'),
    'aws' => array('fab', 'fa-aws', 'willing to help on aws topics'),
    'bitcoin' => array('fab', 'fa-bitcoin', 'willing to help with blockchain'),
    'node' => array('fab', 'fa-node', 'willing to help with node'),
    'android' => array('fab', 'fa-android', 'willing to help with android'),
    'app-store' => array('fab', 'fa-app-store', 'willing to help with iOS'),
    'ember' => array('fab', 'fa-ember', 'willing to help with ember'),
    'gem' => array('fas', 'fa-gem', 'willing to help with ruby'),
    'html5' => array('fab', 'fa-html5', 'willing to help with html'),
    'js-square' => array('fab', 'fa-js-square', 'willing to help with JS'),
    'linux' => array('fab', 'fa-linux', 'willing to help with linux'),
    'magento' => array('fab', 'fa-magento', 'willing to help with magento'),
    'node-js' => array('fab', 'fa-node-js', 'willing to help with node.js'),
    'wordpress' => array('fab', 'fa-wordpress', 'has wp access'),
    'trello' => array('fab', 'fa-trello', 'active on trello'),
    'slack' => array('fab', 'fa-slack', 'on slack'),
    'key' => array('fas', 'fa-key', 'keyholder?'),
    'github' => array('fab', 'fa-github', 'has git access'),
    'twitter' => array('fab', 'fa-twitter', 'follows on twitter'),
    'youtube' => array('fab', 'fa-youtube', 'follows on youtube'),
    'facebook' => array('fab', 'fa-facebook', 'follows on FB'),
    'address-card' => array('fas', 'fa-address-card', 'joined mailing list'),
    'meetup' => array('fab', 'fa-meetup', 'follows on meetup'),
    'linkedin' => array('fab', 'fab fa-linkedin-in', 'follows on linked in?'),
    'pinterest' => array('fab', 'fa-pinterest', 'follows on pinterest'),
    'reddit' => array('fab', 'fa-reddit', 'follows on reddit'),
    'quora' => array('fab', 'fa-quora', 'follows on quora'),
    'snapchat' => array('fab', 'fa-snapchat', 'follows on snapchat'),
    'twitch' => array('fab', 'fa-twitch', 'follows on twitch'),
    'untappd' => array('fab', 'fa-untappd', 'follows on untappd'),
    'vimeo' => array('fab', 'fa-vimeo', 'follows on vimeo'),
    'yelp' => array('fab', 'fa-yelp', 'follows on yelp (yelp review?)'),
    'briefcase' => array('fas', 'fa-briefcase', 'business '),
    'cogs' => array('fas', 'fa-cogs', 'labs'),
    'university' => array('fas', 'fa-university', 'academy'),
    'headphones' => array('fas', 'fa-headphones', 'studios'),
    'map-marker' => array('fas', 'fa-map-marker', 'local'),
    'medkit' => array('fas', 'fa-medkit', 'health'),
    'pied-piper-alt' => array('fab', 'fa-pied-piper-alt', 'junior')
  );

  foreach ($badges_exploded as $badge) {
    $fa_badge_class_prefix = $badge_index[$badge][0];
    $fa_badge_class = $badge_index[$badge][1];
    $fa_badge_title = $badge_index[$badge][2];
    $html .= "<i class='$fa_badge_class_prefix $fa_badge_class' title='$fa_badge_title'></i> ";
  }
  $html .= <<<END
      </div>
    </div>
END;
  return $html;
}

function add_member_directory_start_shortcode() {
  return '<div class="container member-listings">';
}

function add_member_directory_end_shortcode() {
  return '</div>';
}

function add_member_directory_row_start_shortcode() {
  return '<div class="row">';
}

function add_member_directory_row_end_shortcode() {
  return '</div>';
}


add_shortcode( 'member-profile', 'add_member_shortcode' );
add_shortcode( 'member-directory-start', 'add_member_directory_start_shortcode');
add_shortcode( 'member-directory-end', 'add_member_directory_end_shortcode');
add_shortcode( 'member-directory-row-start', 'add_member_directory_row_start_shortcode');
add_shortcode( 'member-directory-row-end', 'add_member_directory_row_end_shortcode');
