<?php 

add_action( 'cmb2_admin_init', 'bj_people_cmb2_fields' ); 

/** 
* Hook in and add a metabox to add fields to taxonomy terms 
*/ 
function bj_people_cmb2_fields() {

 	$prefix = 'bj_people_cmb2_'; 
  
 	/** 
 	 * Metabox to add fields to categories and tags 
 	 */ 
 	$cmb_people = new_cmb2_box( array( 
 		'id'               => $prefix . 'box',
 		'object_types'     => array( 'term' ),
    'taxonomies'       => array( 'people' )
 	) ); 

   $cmb_people->add_field( array(
    'name' => 'Relation',
    'desc' => 'What\'s the relation between you and this person?',
    'id' => $prefix . 'relation',
    'type' => 'textarea_small',
    'attributes'  => array(
      'placeholder' => 'Close Friend, Sibling, Soulmate, ...'          
    ),
    'column' => array(
      'position' => 3,
      'name'     => 'Relation',
    ),
  ) );

 	$cmb_people->add_field( array( 
 		'name' => esc_html__( 'Picture', 'bitjournal' ), 
 		'desc' => esc_html__( 'Add a photo of the person', 'bitjournal' ), 
 		'id'   => $prefix . 'picture',
    'type' => 'file', 
    'options' => array( 'url' => false ),
    'column' => array(
      'position' => 2,
      'name'     => 'Photo',
    ),
  ) ); 

  $cmb_people->add_field( array(
    'name'             => 'Gender',
    'id'               => $prefix . 'gender',
    'type'             => 'radio_inline',
    'show_option_none' => false,
    'column' => array(
      'position' => 4,
      'name'     => 'Gender',
    ),
    'options'          => array(
      'standard' => __( 'Female', 'bitjournal' ),
      'custom'   => __( 'Male', 'bitjournal' ),
      'none'     => __( 'Other', 'bitjournal' ),
    ),
  ) );

} 