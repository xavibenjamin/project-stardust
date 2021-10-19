<?php
/**
 * Core setup
 *
 * @package Stardust
 */

namespace Stardust\Rewrites;

/**
 * Set up theme defaults and register WordPress features.
 */
function setup() {

	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'sd_register_rewrite_rules' ) );
}

/**
 * Register Rewrite Rules
 */
function sd_register_rewrite_rules() {

	// Redirect photos archive to /photos
	add_rewrite_rule(
		'photos',
		'index.php?post_format=post-format-image',
		'top'
	);
}
