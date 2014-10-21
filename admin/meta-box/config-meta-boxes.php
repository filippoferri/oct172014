<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'ff_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function ff_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'ff_';

	// Testimonials
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'testimonials',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Dettagli', 'roots' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'testimonials' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(

			// TITLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Author', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "cite",
				// Field description (optional)
				'desc'  => __( 'Author of the quote', 'roots' ),
				'type'  => 'text',
			),
			// SUBTITLE
			array(
				// Field name - Will be used as label
				'name'  => __( 'Quote', 'roots' ),
				// Field ID, i.e. the meta key
				'id'    => "quote",
				// Field description (optional)
				'desc'  => __( 'Quote', 'roots' ),
				'type'  => 'textarea',
			),

		),
	);

	return $meta_boxes;
}
