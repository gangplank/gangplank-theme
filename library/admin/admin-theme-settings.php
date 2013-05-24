<?php

// Set up data for two settings fields in one section on one subpage...
//   =  Settings > Gangplank
//		- Alert Enabled (gangplank_settings_alert_enabled)
//		- Alert Text (gangplank_settings_alert_text)
// If you want to add more settings the easy (easiest) way,
// 	add values to the following arrays, and add the corresponding 
// 	functions below.
$settingsSubpages = array(
	'settings' => array(
		'parent_slug' => 'options-general.php',
		'menu_title' => 'Gangplank',
		'page_title' => 'Gangplank Settings',
		'capability' => 'activate_plugins',
		'function' => 'settings_subpage_callback'));
$settingsSections = array(
	'gangplank_settings_section' => array(
		'title' => 'Header Alert',
		'callback' => 'gangplank_settings_section_callback',
		'page' => 'settings'));
$settingsFields = array(
	'gangplank_settings_alert_enabled' => array(
		'title' => 'Alert Enabled',
		'callback' => 'gangplank_settings_alert_enabled_callback',
		'sanitize_callback' => 'gangplank_settings_alert_enabled_sanitize',
		'page' => 'settings',
		'section' => 'gangplank_settings_section'),
	'gangplank_settings_alert_text' => array(
		'title' => 'Alert Text',
		'callback' => 'gangplank_settings_alert_text_callback',
		'sanitize_callback' => 'gangplank_settings_alert_text_sanitize',
		'page' => 'settings',
		'section' => 'gangplank_settings_section'));

add_action( 'admin_menu', 'do_settings_menus' );
add_action( 'admin_init', 'do_settings' );

function do_settings() {
	global $settingsSections, $settingsFields;
	foreach ($settingsSections as $id=>$val) {
		add_settings_section( $id, $val['title'], $val['callback'], $val['page'] );
	}
	foreach ($settingsFields as $id=>$val) {
		$val['args'] = !empty($val['args']) ? $val['args'] : array();
		register_setting( $val['section'], $id, $val['sanitize_callback'] );
		add_settings_field( $id, $val['title'], $val['callback'], $val['page'], $val['section'], $val['args'] );
	}
}
function do_settings_menus() {
	global $settingsSubpages;
	foreach ($settingsSubpages as $id=>$val) {
		add_submenu_page( $val['parent_slug'], $val['page_title'], $val['menu_title'], $val['capability'], $id, $val['function'] );
	}
}

function settings_subpage_callback() {
	global $settingsSubpages;
	$page_title = $settingsSubpages['settings']['page_title'];
	?>
	<div class="wrap">
	    <?php screen_icon(); ?>
	    <h2><?php _e($page_title) ?></h2>			
	    <form method="post" action="options.php">
	        <?php
                // This prints out all hidden setting fields
			    settings_fields( 'gangplank_settings_section' );	
			    do_settings_sections( 'settings' );
			?>
	        <?php submit_button(); ?>
	    </form>
	</div>
	<?php
}

function gangplank_settings_section_callback() {
	// Generic, use default output...
}
function gangplank_settings_alert_enabled_callback() {
	$name = 'gangplank_settings_alert_enabled';
	$value = get_option( $name );
	echo '<input name="'.$name.'" type="checkbox" value="1" '. checked( $value, '1', false) .'/>';
}
function gangplank_settings_alert_text_callback() {
	$name = 'gangplank_settings_alert_text';
	$value = (get_option( $name ));
	echo '<textarea name="'.$name.'" type="text" cols="50" rows="10" />'. esc_html__($value) .'</textarea>';
}
function gangplank_settings_alert_enabled_sanitize($val) {
	return $val; // Not validating
}
function gangplank_settings_alert_text_sanitize($val) {
	return $val; // Not validating
}