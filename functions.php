<?php
/**
 * gp4 functions and definitions
 *
 * @package gp4
 * @since gp4 1.0
 */

include 'library/admin/admin-write.php';


if ( ! function_exists( 'gp4_setup' ) ) :

function gp4_setup() {

  register_nav_menus( array(
  	'primary' => __( 'Main Menu', 'gp4'),
    'footer_col_1' => __( 'Footer Col 1', 'gp4' ),
    'footer_col_2' => __( 'Footer Col 2', 'gp4' ),
    'footer_col_3' => __( 'Footer Col 3', 'gp4' ),
  ) );
}
endif; // _straps_setup
add_action( 'after_setup_theme', 'gp4_setup' );