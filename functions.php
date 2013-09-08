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
function webfont_rokkitt() {
  wp_register_style('rokkitt', 'http://fonts.googleapis.com/css?family=Rokkitt:400,700');
  wp_enqueue_style('rokkitt');
  }

add_action('wp_print_styles', 'webfont_rokkitt');

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
