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


function bj_moods_cmb2_fields() {

  $prefix = 'bj_moods_cmb2_'; 
 
  /** 
   * Metabox to add fields to categories and tags 
   */ 
  $cmb_people = new_cmb2_box( array( 
    'id'               => $prefix . 'box',
    'object_types'     => array( 'term' ),
    'taxonomies'       => array( 'moods' )
  ) ); 

  $cmb_people->add_field( array(
    'name'        => __( 'Icon', 'bitjournal' ),
    'id'          => $prefix . 'icon',	
    'type'    => 'icon_picker',
    'options' => array(
      // Font Awesome 5 free icons array:
      'icons' => array(

        // laugh 
        'fa-laugh-beam',
        'fa-laugh-squint',
        'fa-laugh',        
        'fa-laugh-wink',
        
        // smile
        'fa-grin-alt',
        'fa-grin-squint',
        'fa-grin-beam',
        'fa-grin-beam-sweat',
        'fa-grin-tears',
        'fa-grin-squint-tears',
        'fa-grin-stars',
        'fa-grin',
        'fa-grin-wink',
        'fa-grin-tongue',   
        'fa-grin-tongue-squint',
        'fa-grin-tongue-wink',
        'fa-smile-beam', 
        'fa-smile',
        'fa-smile-wink', 

        // meh
        'fa-meh-blank',
        'fa-meh',
        'fa-meh-rolling-eyes',
        
        // Sadness flies away on the wings of time. - Jean de La Fontaine
        'fa-frown',
        'fa-sad-tear',
        'fa-frown-open',
        'fa-tired',
        'fa-sad-cry',
        
        // 
        'fa-surprise',
        'fa-dizzy',
        'fa-flushed',
        'fa-grimace',
        'fa-angry',
        
        // Forgiveness is the final form of love. - Reinhold Niebuhr
        'fa-kiss',
        'fa-kiss-beam',
        'fa-kiss-wink-heart',
        'fa-grin-hearts',
        'fa-heart',
        'fas fa-heart-broken',
        'fas fa-poo',

        // thumbs
        'fa-thumbs-up',
        'fa-thumbs-down',

        // battery
        'fas fa-battery-full',
        'fas fa-battery-three-quarters',
        'fas fa-battery-half',
        'fas fa-battery-quarter',
        'fas fa-battery-empty',

        // circles
        'fa-circle',
        'fa-dot-circle',
        'fas fa-bullseye',        
        'fa-question-circle',
        'fa-arrow-alt-circle-right',
        'fa-arrow-alt-circle-left',
        'fa-arrow-alt-circle-up',
        'fa-arrow-alt-circle-down',
        'fa-check-circle',
        'fa-times-circle',
        'fas fa-plus-circle',
        'fas fa-minus-circle',

        // misc
        'fas fa-question',      
        'fas fa-exclamation',
        'fas fa-exclamation-triangle',
        'fa-clock',
        'fa-lightbulb',
        'fas fa-tint',
        'fa-comment-dots',
        'fas fa-fist-raised',
        'fas fa-bolt',
        'fas fa-bomb',
        'fas fa-skull-crossbones',
        'fas fa-yin-yang',
        'fas fa-peace',
        'fas fa-star',
        'fas fa-medal',
        'fas fa-crown',
        'fa-gem',

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

add_action( 'cmb2_admin_init', 'bj_moods_cmb2_fields' ); 