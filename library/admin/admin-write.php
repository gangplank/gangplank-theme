<?php
/**
 * Customized WP editor.
 *
 * We put in meta boxes here for hero and slogan custom fields.
 *
 * @package gangplank-theme
 * @since gangplank-theme 1.0
 */

/* Define the custom box */
add_action( 'add_meta_boxes', 'gp4_add_custom_boxes' );

// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'gp4_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'gp4_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function gp4_add_custom_boxes() {
    $screens = array( 'post', 'page' );
    foreach ($screens as $screen) {
        add_meta_box(
          'gp4_slogan_box',
          __( 'Slogan' ),
          'gp4_slogan_custom_box',
          $screen
        );
        add_meta_box(
            'gp4_hero_box',
            __( 'Hero', 'gp4' ),
            'gp4_hero_custom_box',
            $screen
        );
    }
}

/* Prints the hero box content */
function gp4_hero_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'gp4_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_gp4_hero_title', true );
  echo '<label for="_gp4_hero_title">';
       _e("Title", 'gp4' );
  echo '</label> ';
  echo '<input type="text" id="_gp4_hero_title" name="_gp4_hero_title" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_hero_subtitle', true );
  echo '<label for="_gp4_hero_subtitle">';
       _e("Subtitle", 'gp4' );
  echo '</label> ';
  echo '<input type="text" id="_gp4_hero_subtitle" name="_gp4_hero_subtitle" value="'.esc_attr($value).'" size="42" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_hero_button_url', true );
  echo '<label for="_gp4_hero_button_url">';
       _e("Button URL", 'gp4' );
  echo '</label> ';
  echo '<input type="text" id="_gp4_hero_button_url" name="_gp4_hero_button_url" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_hero_button_title', true );
  echo '<label for="_gp4_hero_button_title">';
       _e("Button Title", 'gp4' );
  echo '</label> ';
  echo '<input type="text" id="_gp4_hero_button_title" name="_gp4_hero_button_title" value="'.esc_attr($value).'" size="25" /><br/>';
}

/* Prints the slogan box content */
function gp4_slogan_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'gp4_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_gp4_slogan', true );
  echo '<label for="_gp4_slogan">';
       _e("Slogan", 'gp4' );
  echo '</label> ';
  echo '<input type="text" id="_gp4_slogan" name="_gp4_slogan" value="'.esc_attr($value).'" size="25" /><br/>';
}

/* When the post is saved, saves our custom data */
function gp4_save_postdata( $post_id ) {

  // First we need to check if the current user is authorised to do this action.
  if ( 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['gp4_noncename'] ) || ! wp_verify_nonce( $_POST['gp4_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  // Thirdly we can save the value to the database

  //if saving in a custom table, get post_ID
  $post_ID = $_POST['post_ID'];
  //sanitize user input
  $gp4_hero_title = sanitize_text_field( $_POST['_gp4_hero_title'] );
  $gp4_hero_subtitle = sanitize_text_field( $_POST['_gp4_hero_subtitle'] );
  $gp4_hero_button_url = sanitize_text_field( $_POST['_gp4_hero_button_url'] );
  $gp4_hero_button_title = sanitize_text_field( $_POST['_gp4_hero_button_title'] );
  $gp4_slogan = sanitize_text_field( $_POST['_gp4_slogan'] );

  // Add the different post meta fields to the post
  update_post_meta($post_ID, '_gp4_hero_title', $gp4_hero_title);
  update_post_meta($post_ID, '_gp4_hero_subtitle', $gp4_hero_subtitle);
  update_post_meta($post_ID, '_gp4_hero_button_url', $gp4_hero_button_url);
  update_post_meta($post_ID, '_gp4_hero_button_title', $gp4_hero_button_title);
  update_post_meta($post_ID, '_gp4_slogan', $gp4_slogan);
}
