<?php

/**
 * Create the section
 */
function my_custom_section( $wp_customize ) {

	// Header
	$wp_customize->add_section( 'header', array(
		'title'    => __( 'Header', 'roots' ),
		'priority' => 10
	) );

	// Footer
	$wp_customize->add_section( 'footer', array(
		'title'    => __( 'Footer', 'roots' ),
		'priority' => 20
	) );

}
add_action( 'customize_register', 'my_custom_section' );

/**
 * Create the setting
 */
function my_custom_setting( $controls ) {

	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'phone',
		'label'    => __( 'Phone number', 'roots' ),
		'section'  => 'header',
		'default'  => 'TEL: 000 123 45678',
		'priority' => 1,
	);
	$controls[] = array(
		'type'     => 'text',
		'setting'  => 'copy',
		'label'    => __( 'Copyright', 'roots' ),
		'section'  => 'footer',
		'default'  => 'All rights reserved',
		'priority' => 1,
	);

	return $controls;
}
add_filter( 'kirki/controls', 'my_custom_setting' );
