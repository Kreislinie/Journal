<?php 
/*
 * Custom field setup via cmb2.
 */

// Adds custom fields for people taxonomy.
function bj_people_cmb2_fields() {

 	$prefix = 'bj_people_cmb2_'; 
  
 	$cmb_people = new_cmb2_box( array( 
 		'id'              => $prefix . 'box',
 		'object_types'    => array( 'term' ),
    'taxonomies'      => array( 'people' )
  ) ); 
   
  $cmb_people->add_field( array( 
    'name'             => esc_html__( 'Picture', 'bitjournal' ), 
    'desc'             => esc_html__( 'Add a portrait of the person', 'bitjournal' ), 
    'id'               => $prefix . 'picture',
    'type'             => 'file',
    'options'          => array( 'url' => false ),
    'column'           => array(
      'position' => 2,
      'name'     => 'Photo',
    ),
  ) ); 

  $cmb_people->add_field( array(
    'name'            => 'Relationship',
    'desc'            => 'What\'s the relationship between you and this person?',
    'id'              => $prefix . 'relation',
    'type'            => 'textarea_small',
    'attributes'      => array(
      'placeholder'   => 'Close Friend, Sibling, Soulmate, ...'          
    ),
    'column'          => array(
      'position' => 3,
      'name'     => 'Relationship',
    ),
  ) );

  $cmb_people->add_field( array(
    'name' => 'Birthday',
    'id'   => $prefix . 'birth',
    'type' => 'text_date_timestamp',
    'date_format' => 'j F Y',
  ) );

  $cmb_people->add_field( array(
    'name' => 'Death',
    'id'   => $prefix . 'death',
    'type' => 'text_date_timestamp',
    'date_format' => 'j F Y',
  ) );

	$cmb_people->add_field( array(
		'name'           => 'TESTING! Taxonomy Select',
		'desc'           => 'Description Goes Here',
		'id'             => 'wiki_test_taxonomy_select',
		'taxonomy'       => 'people', 
		'type'           => 'taxonomy_select',
		'remove_default' => 'true', // Removes the default metabox provided by WP core.
		// Optionally override the args sent to the WordPress get_terms function.
		'query_args' => array(
			// 'orderby' => 'slug',
			// 'hide_empty' => true,
			),
	) );

}

add_action( 'cmb2_admin_init', 'bj_people_cmb2_fields' ); 


// Adds custom fields for entry post type.
function bj_mood_cmb2_fields() {

  $prefix = 'bj_mood_cmb2_'; 

  $cmb_mood = new_cmb2_box( array( 
    'id'               => $prefix . 'box',
    'title'            => 'Mood',
    'object_types'     => array( 'entry' ),
  ) ); 

  $cmb_mood->add_field( array(
    'id'               => $prefix . 'mood',
    'type'             => 'radio_inline',
    'column'           => array( 
      'position'   => 4, 
      'name'       => 'Mood' 
    ),

    'options'          => array(
      'horrible'   => '<span id="horrible">' . esc_html__( 'Horrible',  'bitjournal' ) . '</span>',
      'very-bad'   => '<span id="very-bad">' . esc_html__( 'Very bad',  'bitjournal' ) . '</span>',
      'bad'        => '<span id="bad">' . esc_html__( 'Bad', 'bitjournal' ) . '</span>',
      'neutral'    => '<span id="neutral">' . esc_html__( 'Neutral', 'bitjournal' ) . '</span>',
      'good'       => '<span id="good">' . esc_html__( 'Good', 'bitjournal' ) . '</span>',      
      'very-good'  => '<span id="very-good">' . esc_html__( 'Very good', 'bitjournal' ) . '</span>',
      'excellent'  => '<span id="excellent">' . esc_html__( 'Excellent', 'bitjournal' ) . '</span>',
    ),
    
    'default' => 'neutral',
  ) );

}

add_action( 'cmb2_admin_init', 'bj_mood_cmb2_fields' ); 

