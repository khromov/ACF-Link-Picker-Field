<?php

class acf_field_link_picker extends acf_field {
	
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
		
		
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{
		// vars
		$this->name = 'link_picker';
		$this->label = __('Link Picker');
		$this->category = __("Choice",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array();
		
		// do not delete!
    	parent::__construct();

    	// settings
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.0.0'
		);

	}

	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like below) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	function create_options( $field )
	{
		// key is needed in the field names to correctly save the data
		$key = $field['name'];

		do_action('acf/create_field', array(
			'type'		=>	'radio',
			'name'		=>	'fields['.$key.'][preview_size]',
			'value'		=>	$field['preview_size'],
			'layout'	=>	'horizontal',
			'choices'	=>	array(
				'thumbnail' => __('Thumbnail'),
				'something_else' => __('Something Else'),
			)
		));
	}
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	function create_field( $field )
	{
        $exists = true;
		$exists = ($field['value'] === FALSE || (isset($field['value']['url']) && $field['value']['url'] == '')) ? false : true;

		//ACF 4 compatibility, so we can use the same template
		$field['key'] = $field['id'];

		include 'templates/field_admin.php';
	}
	
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your create_field() action.
	*
	*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	function input_admin_enqueue_scripts()
	{
		// register ACF scripts
		wp_register_script( 'acf-input-link_picker', $this->settings['dir'] . 'js/input.js', array('acf-input'), $this->settings['version'] );
		//wp_register_style( 'acf-input-link_picker', $this->settings['dir'] . 'css/input.css', array('acf-input'), $this->settings['version'] ); 
		
		// scripts
		wp_enqueue_script(array(
			'acf-input-link_picker',	
		));

		// styles
		wp_enqueue_style(array(
			'acf-input-link_picker',	
		));
		
	}
}