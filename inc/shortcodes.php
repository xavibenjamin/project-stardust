<?php
/**
 * Shortcodes
 *
 * @package Stardust
 */

namespace Stardust\Shortcodes;

/**
 * Setup
 */
function setup() {

	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_shortcode( 'alert', $n( 'sd_alert_shortcode' ) );
}

/**
 * Alert ShortCode Function
 *
 * @param array  $atts attributtes from shortcode
 * @param string $content content from shortcode
 * @return string
 */
function sd_alert_shortcode( $atts, $content = '' ) {

	$attributes = shortcode_atts(
		[
			'label'   => 'Note',
			'variant' => 'primary',
			'content' => $content,
		],
		$atts
	);

	ob_start();

	// include template
	get_template_part(
		'template-parts/shortcodes/alert',
		null,
		$attributes
	);

	return ob_get_clean();
}
