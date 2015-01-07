<?php

/*
Plugin Name: Advanced Custom Fields: Link Picker
Plugin URI: http://biostall.com
Description: Adds an Advanced Custom Field field that allows the selection of a link utilising the WordPress link picker modal dialog
Version: 1.1
Author: Steve Marks (BIOSTALL), khromov
Author URI: http://biostall.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('ACFLP_TD', 'acf-link_picker');
load_plugin_textdomain( ACFLP_TD, false, dirname( plugin_basename(__FILE__) ) . '/lang/' );

//  Include field type for ACF5
function include_field_types_link_picker( $version ) {

	include_once('acf-link_picker-v5.php');
	new acf_field_link_picker();
}

add_action('acf/include_field_types', 'include_field_types_link_picker');	


// Include field type for ACF4
function register_fields_link_picker() {
	include_once('acf-link_picker-v4.php');
	new acf_field_link_picker();
}

add_action('acf/register_fields', 'register_fields_link_picker');