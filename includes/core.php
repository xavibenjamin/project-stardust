<?php
/**
 * Core setup
 *
 * @package Stardust
 */

namespace Stardust\Core;

/**
 * Set up theme defaults and register WordPress features.
 */
function setup() {

	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'stardust_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'stardust_bundle_assets' ) );
	add_action( 'wp_enqueue_scripts', $n( 'sd_enqueue_comments_reply' ) );
	add_action( 'init', $n( 'sd_indieweb_plugin_support' ) );
	add_action( 'wp_print_styles', $n( 'stardust_remove_plugin_assets' ), 100 );
	add_action( 'enqueue_block_editor_assets', $n( 'core_block_overrides' ) );
}

/**
 * Setup theme
 */
function stardust_setup() {

	// Add post-formats support
	add_theme_support(
		'post-formats',
		array(
			'image',
			'status',
		)
	);

	// Add support for featured images
	add_theme_support( 'post-thumbnails' );

	// Add support for full and wide align images
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for WordPress generated titles
	add_theme_support( 'title-tag' );

	// Automatic feed
	add_theme_support( 'automatic-feed-links' );

	// Register Menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'timmmmydotblog' ) );

	// Register Photo Card Thumb
	add_image_size( 'photo-card', 600, 600, true );
}

/**
 * Remove Plugin Assets
 */
function stardust_remove_plugin_assets() {
	wp_deregister_style( 'semantic-linkbacks-css' );
	wp_deregister_style( 'syndication-style' );
	wp_deregister_style( 'indieweb' );
}

/**
 * Enqueue scripts and styles for theme
 */
function stardust_bundle_assets() {
	wp_enqueue_script(
		'stardust-scripts',
		SD_TEMPLATE_URL . '/dist/js/frontend/frontend-bundle.js',
		[],
		SD_VERSION,
		true
	);

	wp_enqueue_style(
		'stardust-styles',
		SD_TEMPLATE_URL . '/dist/css/frontend.css',
		[],
		SD_VERSION
	);

	wp_enqueue_style(
		'type',
		'https://use.typekit.net/jlg8dnu.css',
		[],
		SD_VERSION
	);
}

/**
 * Enqueue comment script
 */
function sd_enqueue_comments_reply() {

	if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) === 1 ) ) {
		// Load comment-reply.js (into footer)
		wp_enqueue_script(
			'comment-reply',
			'/wp-includes/js/comment-reply.min.js',
			[],
			SD_VERSION,
			true
		);
	}

}

/**
 * IndieWeb Plugins Support
 *
 * @return void
 */
function sd_indieweb_plugin_support() {

	// Remove syndication links from body
	remove_filter( 'the_content', array( 'Syn_Config', 'the_content' ), 30 );
}

/**
 * Enqueue core block filters, styles and variations.
 *
 * @return void
 */
function core_block_overrides() {
	$overrides = SD_DIST_PATH . 'js/core-block-overrides/core-block-overrides-bundle.asset.php';
	if ( file_exists( $overrides ) ) {
		$dep = require_once $overrides;
		wp_enqueue_script(
			'core-block-overrides',
			SD_DIST_URL . 'js/core-block-overrides/core-block-overrides-bundle.js',
			$dep['dependencies'],
			$dep['version'],
			true
		);
	}
}
