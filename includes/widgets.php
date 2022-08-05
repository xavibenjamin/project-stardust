<?php
/**
 * Widgets functions
 *
 * @package Stardust
 */

namespace Stardust\Widgets;

/**
 * Set up theme defaults and register WordPress features.
 */
function setup() {

	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'widgets_init', $n( 'sd_widgets_init' ) );
}

/**
 * Stardust Widget Init
 */
function sd_widgets_init() {
	register_sidebar(
		[
			'name'          => __( 'Newsletter Bar', 'stardust' ),
			'id'            => 'newsletter-bar-widget-area',
			'before_widget' => '',
			'after_widget'  => '',
		]
	);
}
