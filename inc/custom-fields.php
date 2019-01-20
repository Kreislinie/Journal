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
 		'name' => esc_html__( 'Picture', 'bitjournal' ), 
 		'desc' => esc_html__( 'Add a photo of the person (optional)', 'bitjournal' ), 
 		'id'   => $prefix . 'picture',
    'type' => 'file', 
    'options' => array( 'url' => false ),
  ) ); 

} 