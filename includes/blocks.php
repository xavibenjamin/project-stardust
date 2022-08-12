<?php
/**
 * Gutenberg Blocks setup
 *
 * @package Stardust\Core
 */

namespace Stardust\Blocks;

use Stardust\Blocks\Driver;


/**
 * Set up blocks
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'enqueue_block_editor_assets', $n( 'blocks_editor_assets' ) );

	add_filter( 'block_categories', $n( 'blocks_categories' ), 10, 2 );

	add_action( 'init', $n( 'register_theme_blocks' ) );

	// phpcs:ignore add_action( 'init', $n( 'block_patterns_and_categories' ) );
}

/**
 * Add in blocks that are registered in this theme
 *
 * @return void
 */
function register_theme_blocks() {
	// Filter the plugins URL to allow us to have blocks in themes with linked assets. i.e editorScripts
	add_filter( 'plugins_url', __NAMESPACE__ . '\filter_plugins_url', 10, 2 );

	// Require custom blocks.
	require_once SD_BLOCK_DIR . '/driver/register.php';

	// Call block register functions for each block.
	Driver\register();

	// Remove the filter after we register the blocks
	remove_filter( 'plugins_url', __NAMESPACE__ . '\filter_plugins_url', 10, 2 );
}

/**
 * Filter the plugins_url to allow us to use assets from theme.
 *
 * @param string $url  The plugins url
 * @param string $path The path to the asset.
 *
 * @return string The overridden url to the block asset.
 */
function filter_plugins_url( $url, $path ) {
	$file = preg_replace( '/\.\.\//', '', $path );
	return trailingslashit( get_stylesheet_directory_uri() ) . $file;
}

/**
 * Enqueue editor-only JavaScript/CSS for blocks.
 *
 * @return void
 */
function blocks_editor_assets() {

	// Block JS Overrides
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

/**
 * Filters the registered block categories.
 *
 * @param array  $categories Registered categories.
 * @param object $post       The post object.
 *
 * @return array Filtered categories.
 */
function blocks_categories( $categories, $post ) {
	if ( ! in_array( $post->post_type, array( 'post', 'page' ), true ) ) {
		return $categories;
	}

	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'stardust-blocks',
				'title' => __( 'Stardust Blocks', 'stardust' ),
			),
		)
	);
}
