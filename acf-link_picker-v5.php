<?php

class acf_field_link_picker extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	function __construct() {

		$this->name = 'link_picker';
		$this->label = __('Link Picker', ACFLP_TD);
		$this->category = 'choice';
		$this->defaults = array();
		$this->l10n = array(
			'yes'		=> __('Yes', ACFLP_TD),
			'no'		=> __('No', ACFLP_TD),
			'edit_link'	=> __('Edit Link', ACFLP_TD),
			'insert_link'	=> __('Insert Link', ACFLP_TD)
		);

    	parent::__construct();
	}
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	function render_field( $field ) {
		$exists = (!$field['value'] || $field['value'] === FALSE || (isset($field['value']['url']) && $field['value']['url'] == '') ) ? false : true;
		include 'templates/field_admin.php';
	}
		
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your render_field() action.
	*
	*  @type	action (admin_enqueue_scripts)
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	n/a
	*  @return	n/a
	*/
	function input_admin_enqueue_scripts() {
		// register & include JS
		wp_register_script( 'acf-input-link_picker', plugin_dir_url( __FILE__ ) . "js/input.js" );
		wp_enqueue_script('acf-input-link_picker');
	}
}
