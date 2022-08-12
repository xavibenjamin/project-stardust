<?php
/**
 * Overrides for WordPress Core
 *
 * @package Stardust
 */

namespace Stardust\Customizer;

/**
 * Overrides Setup Function
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'customize_register', $n( 'sd_customize_register' ) );
}

/**
 * Register our Customizer Fields
 *
 * @param  [Object] $wp_customize the WP_Customize_Manager object
 * @return void
 */
function sd_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'sd_theme_settings',
		[
			'title'    => __( 'Stardust Theme Settings', 'stardust' ),
			'priority' => 30,
		]
	);

	$wp_customize->add_setting(
		'sd_theme_color',
		[
			'default' => 'bright-pixels',
			'type'    => 'option',
		]
	);

	$wp_customize->add_control(
		'sd_theme_color',
		[
			'section'     => 'sd_theme_settings',
			'label'       => 'Select a Theme',
			'description' => 'Pick one of the different site outfits.',
			'type'        => 'select',
			'choices'     => [
				'bright-pixels' => __( 'Bright Pixels', 'stardust' ),
				'halcyon'       => __( 'Halcyon', 'stardust' ),
				'github-dark'   => __( 'GitHub Dark', 'stardust' ),
				'primrose'      => __( 'Primrose', 'stardust' ),
			],
		]
	);

	$wp_customize->add_setting(
		'sd_site_pronouns',
		[
			'type' => 'option',
		]
	);

	$wp_customize->add_control(
		'sd_site_pronouns',
		[
			'section'     => 'sd_theme_settings',
			'label'       => 'What are your pronouns babe?',
			'description' => '',
			'type'        => 'text',
		]
	);
}

