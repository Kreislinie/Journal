<?php 

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

add_action( 'cmb2_admin_init', 'bj_people_cmb2_fields' ); 


function bj_emotions_cmb2_fields() {

  $prefix = 'bj_emotions_cmb2_'; 
 
  /** 
   * Metabox to add fields to categories and tags 
   */ 
  $cmb_people = new_cmb2_box( array( 
    'id'               => $prefix . 'box',
    'object_types'     => array( 'term' ),
    'taxonomies'       => array( 'emotions' )
  ) ); 

  $cmb_people->add_field( array(
    'name'        => __( 'Icon', 'bitjournal' ),
    'id'          => $prefix . 'icon',	
    'type'    => 'icon_picker',
    'options' => array(
      // Font Awesome 5 free icons array:
      'icons' => array(

        // laugh 
        'far fa-laugh-beam',
        'far fa-laugh-squint',
        'far fa-laugh',        
        'far fa-laugh-wink',
        
        // smile
        'far fa-grin-alt',
        'far fa-grin-squint',
        'far fa-grin-beam',
        'far fa-grin-beam-sweat',
        'far fa-grin-tears',
        'far fa-grin-squint-tears',
        'far fa-grin-stars',
        'far fa-grin',
        'far fa-grin-wink',
        'far fa-grin-tongue',   
        'far fa-grin-tongue-squint',
        'far fa-grin-tongue-wink',
        'far fa-smile-beam', 
        'far fa-smile',
        'far fa-smile-wink', 

        // meh
        'far fa-meh-blank',
        'far fa-meh',
        'far fa-meh-rolling-eyes',
        
        // Sadness flies away on the wings of time. - Jean de La Fontaine
        'far fa-frown',
        'far fa-sad-tear',
        'far fa-frown-open',
        'far fa-tired',
        'far fa-sad-cry',
        
        // other emotions
        'far fa-surprise',
        'far fa-dizzy',
        'far fa-flushed',
        'far fa-grimace',
        'far fa-angry',
        
        // Forgiveness is the final form of love. - Reinhold Niebuhr
        'far fa-kiss',
        'far fa-kiss-beam',
        'far fa-kiss-wink-heart',
        'far fa-grin-hearts',
        'far fa-heart',
        'fas fa-heart-broken',
        'fas fa-poo',

        // thumbs
        'far fa-thumbs-up',
        'far fa-thumbs-down',

        // battery
        'fas fa-battery-full',
        'fas fa-battery-three-quarters',
        'fas fa-battery-half',
        'fas fa-battery-quarter',
        'fas fa-battery-empty',

        // circles
        'far fa-circle',
        'far fa-dot-circle',
        'far fas fa-bullseye',        
        'far fa-question-circle',
        'far fa-arrow-alt-circle-right',
        'far fa-arrow-alt-circle-left',
        'far fa-arrow-alt-circle-up',
        'far fa-arrow-alt-circle-down',
        'far fa-check-circle',
        'far fa-times-circle',
        'fas fa-plus-circle',
        'fas fa-minus-circle',

        // misc
        'fas fa-question',      
        'fas fa-exclamation',
        'fas fa-exclamation-triangle',
        'far fa-clock',
        'far fa-lightbulb',
        'fas fa-tint',
        'far fa-comment-dots',
        'fas fa-fist-raised',
        'fas fa-bolt',
        'fas fa-bomb',
        'fas fa-skull-crossbones',
        'fas fa-yin-yang',
        'fas fa-peace',
        'fas fa-star',
        'fas fa-medal',
        'fas fa-crown',
        'far fa-gem',

      ),

      'fonts' => array('Font Awesome 5 Free'),
      
    ),


    'column' => array( true, 'position' => 1 ),
    'display_cb' => 'bj_custom_icon_column' // Output the display of the column values through a callback.

  ) );

  /**
   * Manually render a field column display.
   *
   * @param  array      $field_args Array of field arguments.
   * @param  CMB2_Field $field      The field object
   */
  function bj_custom_icon_column( $field_args, $field ) {
    ?>

    <div class="custom-column-display <?php echo $field->row_classes(); ?>">
      <span class="<?php echo $field->escaped_value(); ?>" style="font-family: 'Font Awesome 5 Free' !important;"></span>
    </div>
    
    <?php
  }

}

add_action( 'cmb2_admin_init', 'bj_emotions_cmb2_fields' ); 