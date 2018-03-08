<?php
/**
 * Customized WP editor.
 *
 * We put in meta boxes here for hero, slogan, and featured columns custom fields.
 *
 * @package gangplank-theme
 * @since gangplank-theme 1.0
 */

// Start adding our custom meta boxes:
add_action( 'add_meta_boxes', 'gp4_add_custom_boxes' );

// Do something with the data entered:
add_action( 'save_post', 'gp4_save_postdata' );

// Adds a box to the main column on the Post and Page edit screens:
function gp4_add_custom_boxes() {
    $screens = array( 'post', 'page' );
    foreach ($screens as $screen) {
        // Slogan meta box:
        add_meta_box(
          'gp4_slogan_box',
          __( 'Slogan' ),
          'gp4_slogan_custom_box',
          $screen
        );
        // Hero meta box:
        add_meta_box(
            'gp4_hero_box',
            __( 'Hero', 'gp4' ),
            'gp4_hero_custom_box',
            $screen
        );
        // Featured column 1 meta box:
        add_meta_box(
            'gp4_featured_column_one_box',
            __( 'Featured Column 1', 'gp4' ),
            'gp4_featured_column_one_custom_box',
            $screen
        );
        // Featured column 2 meta box:
        add_meta_box(
            'gp4_featured_column_two_box',
            __( 'Featured Column 2', 'gp4' ),
            'gp4_featured_column_two_custom_box',
            $screen
        );
        // Featured column 3 meta box:
        add_meta_box(
            'gp4_featured_column_three_box',
            __( 'Featured Column 3', 'gp4' ),
            'gp4_featured_column_three_custom_box',
            $screen
        );
    }
}

// Prints the slogan box content:
function gp4_slogan_custom_box( $post ) {

  // Use nonce for verification:
  wp_nonce_field( plugin_basename( __FILE__ ), 'gp4_noncename' );

  // Use get_post_meta to retrieve an existing value from the database and use the value for the form:
  $value = get_post_meta( $post->ID, '_gp4_slogan', true );
  echo '<label for="_gp4_slogan">';
       _e("Slogan", 'gp4' );
  echo '</label> ';
  echo '<input type="text" id="_gp4_slogan" name="_gp4_slogan" value="'.esc_attr($value).'" size="25" /><br/>';
}

// Prints the hero box content:
function gp4_hero_custom_box( $post ) {

  // Use nonce for verification:
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

// Prints the featured column 1 box content:
function gp4_featured_column_one_custom_box( $post ) {

  // Use nonce for verification:
  wp_nonce_field( plugin_basename( __FILE__ ), 'gp4_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_gp4_featured_column_one_title', true );
  echo '<label for="_gp4_featured_column_one_title">';
       _e("Title", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_one_title" name="_gp4_featured_column_one_title" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_one_content', true );
  echo '<label for="_gp4_featured_column_one_content">';
       _e("Content", 'gp4' );
  echo '</label><br/> ';
  echo '<textarea type="text" id="_gp4_featured_column_one_content" name="_gp4_featured_column_one_content" cols="52" rows="8">'.esc_attr($value).'</textarea><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_one_button_url', true );
  echo '<label for="_gp4_featured_column_one_button_url">';
       _e("Button URL", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_one_button_url" name="_gp4_featured_column_one_button_url" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_one_button_title', true );
  echo '<label for="_gp4_featured_column_one_button_title">';
       _e("Button Title", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_one_button_title" name="_gp4_featured_column_one_button_title" value="'.esc_attr($value).'" size="25" /><br/>';
}

// Prints the featured column 2 box content:
function gp4_featured_column_two_custom_box( $post ) {

  // Use nonce for verification:
  wp_nonce_field( plugin_basename( __FILE__ ), 'gp4_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_gp4_featured_column_two_title', true );
  echo '<label for="_gp4_featured_column_two_title">';
       _e("Title", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_two_title" name="_gp4_featured_column_two_title" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_two_content', true );
  echo '<label for="_gp4_featured_column_two_content">';
       _e("Content", 'gp4' );
  echo '</label><br/> ';
  echo '<textarea type="text" id="_gp4_featured_column_two_content" name="_gp4_featured_column_two_content" cols="52" rows="8">'.esc_attr($value).'</textarea><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_two_button_url', true );
  echo '<label for="_gp4_featured_column_two_button_url">';
       _e("Button URL", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_two_button_url" name="_gp4_featured_column_two_button_url" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_two_button_title', true );
  echo '<label for="_gp4_featured_column_two_button_title">';
       _e("Button Title", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_two_button_title" name="_gp4_featured_column_two_button_title" value="'.esc_attr($value).'" size="25" /><br/>';
}

// Prints the featured column 3 box content:
function gp4_featured_column_three_custom_box( $post ) {

  // Use nonce for verification:
  wp_nonce_field( plugin_basename( __FILE__ ), 'gp4_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_gp4_featured_column_three_title', true );
  echo '<label for="_gp4_featured_column_three_title">';
       _e("Title", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_three_title" name="_gp4_featured_column_three_title" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_three_content', true );
  echo '<label for="_gp4_featured_column_three_content">';
       _e("Content", 'gp4' );
  echo '</label><br/> ';
  echo '<textarea type="text" id="_gp4_featured_column_three_content" name="_gp4_featured_column_three_content" cols="52" rows="8">'.esc_attr($value).'</textarea><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_three_button_url', true );
  echo '<label for="_gp4_featured_column_three_button_url">';
       _e("Button URL", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_three_button_url" name="_gp4_featured_column_three_button_url" value="'.esc_attr($value).'" size="25" /><br/>';
  $value = get_post_meta( $post->ID, '_gp4_featured_column_three_button_title', true );
  echo '<label for="_gp4_featured_column_three_button_title">';
       _e("Button Title", 'gp4' );
  echo '</label><br/> ';
  echo '<input type="text" id="_gp4_featured_column_three_button_title" name="_gp4_featured_column_three_button_title" value="'.esc_attr($value).'" size="25" /><br/>';
}


// When the post is saved, saves our custom data:
function gp4_save_postdata( $post_id ) {

  // First we need to check if the current user is authorised to do this action:
  if ( 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // Secondly we need to check if the user intended to change something:
  if ( ! isset( $_POST['gp4_noncename'] ) || ! wp_verify_nonce( $_POST['gp4_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  // Thirdly we can save the value to the database:

  $kses_allowed_tags = array(
    'p', 'div', 'span', 'strong', 'em',
  );

  // If saving in a custom table, get post_ID:
  $post_ID = $_POST['post_ID'];
  // Sanitize user input:
  // Slogan:
  $gp4_slogan = sanitize_text_field( $_POST['_gp4_slogan'] );
  // Hero:
  $gp4_hero_title = sanitize_text_field( $_POST['_gp4_hero_title'] );
  $gp4_hero_subtitle = sanitize_text_field( $_POST['_gp4_hero_subtitle'] );
  $gp4_hero_button_url = sanitize_url( $_POST['_gp4_hero_button_url'] );
  $gp4_hero_button_title = sanitize_text_field( $_POST['_gp4_hero_button_title'] );
  // Featured Column 1:
  $gp4_featured_column_one_title = sanitize_text_field( $_POST['_gp4_featured_column_one_title'] );
  $gp4_featured_column_one_content = wp_kses( $_POST['_gp4_featured_column_one_content'], $kses_allowed_tags );
  $gp4_featured_column_one_button_url = sanitize_url( $_POST['_gp4_featured_column_one_button_url'] );
  $gp4_featured_column_one_button_title = sanitize_text_field( $_POST['_gp4_featured_column_one_button_title'] );
  // Featured Column 2:
  $gp4_featured_column_two_title = sanitize_text_field( $_POST['_gp4_featured_column_two_title'] );
  $gp4_featured_column_two_content = wp_kses( $_POST['_gp4_featured_column_two_content'], $kses_allowed_tags );
  $gp4_featured_column_two_button_url = sanitize_url( $_POST['_gp4_featured_column_two_button_url'] );
  $gp4_featured_column_two_button_title = sanitize_text_field( $_POST['_gp4_featured_column_two_button_title'] );
  // Featured Column 3:
  $gp4_featured_column_three_title = sanitize_text_field( $_POST['_gp4_featured_column_three_title'] );
  $gp4_featured_column_three_content = wp_kses( $_POST['_gp4_featured_column_three_content'], $kses_allowed_tags );
  $gp4_featured_column_three_button_url = sanitize_url( $_POST['_gp4_featured_column_three_button_url'] );
  $gp4_featured_column_three_button_title = sanitize_text_field( $_POST['_gp4_featured_column_three_button_title'] );


  // Add the post meta fields to the post:
  // Slogan:
  update_post_meta($post_ID, '_gp4_slogan', $gp4_slogan);
  // Hero:
  update_post_meta($post_ID, '_gp4_hero_title', $gp4_hero_title);
  update_post_meta($post_ID, '_gp4_hero_subtitle', $gp4_hero_subtitle);
  update_post_meta($post_ID, '_gp4_hero_button_url', $gp4_hero_button_url);
  update_post_meta($post_ID, '_gp4_hero_button_title', $gp4_hero_button_title);
  // Featured Column 1:
  update_post_meta($post_ID, '_gp4_featured_column_one_title', $gp4_featured_column_one_title);
  update_post_meta($post_ID, '_gp4_featured_column_one_content', $gp4_featured_column_one_content);
  update_post_meta($post_ID, '_gp4_featured_column_one_button_url', $gp4_featured_column_one_button_url);
  update_post_meta($post_ID, '_gp4_featured_column_one_button_title', $gp4_featured_column_one_button_title);
  // Featured Column 2:
  update_post_meta($post_ID, '_gp4_featured_column_two_title', $gp4_featured_column_two_title);
  update_post_meta($post_ID, '_gp4_featured_column_two_content', $gp4_featured_column_two_content);
  update_post_meta($post_ID, '_gp4_featured_column_two_button_url', $gp4_featured_column_two_button_url);
  update_post_meta($post_ID, '_gp4_featured_column_two_button_title', $gp4_featured_column_two_button_title);
  // Featured Column 3:
  update_post_meta($post_ID, '_gp4_featured_column_three_title', $gp4_featured_column_three_title);
  update_post_meta($post_ID, '_gp4_featured_column_three_content', $gp4_featured_column_three_content);
  update_post_meta($post_ID, '_gp4_featured_column_three_button_url', $gp4_featured_column_three_button_url);
  update_post_meta($post_ID, '_gp4_featured_column_three_button_title', $gp4_featured_column_three_button_title);
}
