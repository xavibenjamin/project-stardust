<?php
/**
 * Snippets Custom Post Type stuff
 *
 * @package Stardust\CPT\Snippets
 */

namespace Stardust\CPT\Snippets;

/**
 * Sets up the file.
 */
function setup() {
	$n = function( $ns ) {
		return __NAMESPACE__ . "\\$ns";
	};

	add_action( 'init', $n( 'sd_register_post_type' ) );
	add_action( 'init', $n( 'sd_register_taxonomy' ) );
}

/**
 * Registers the Snippets CPT
 */
function sd_register_post_type() {
	$labels = [
		'name'               => __( 'Snippets', 'stardust' ),
		'singular_name'      => __( 'Snippet', 'stardust' ),
		'menu_name'          => __( 'Snippets', 'stardust' ),
		'name_admin_bar'     => __( 'Snippets', 'stardust' ),
		'add_new'            => __( 'Add New', 'stardust' ),
		'add_new_item'       => __( 'Add New Snippet', 'stardust' ),
		'new_item'           => __( 'New Snippet', 'stardust' ),
		'edit_item'          => __( 'Edit Snippet', 'stardust' ),
		'view_item'          => __( 'View Snippet', 'stardust' ),
		'all_items'          => __( 'All Snippets', 'stardust' ),
		'search_items'       => __( 'Search Snippets', 'stardust' ),
		'parent_item_colon'  => __( 'Parent Snippets:', 'stardust' ),
		'not_found'          => __( 'No snippets found', 'stardust' ),
		'not_found_in_trash' => __( 'No snippets found in Trash', 'stardust' ),
	];

	$args = [
		'labels'             => $labels,
		'description'        => __( 'Snippets of code that are gifts from Past Tim to Future Tim', 'stardust' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => [
			'slug'       => 'snippets',
			'with_front' => false,
		],
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-media-document',
		'show_in_rest'       => true,
		'supports'           => [
			'title',
			'editor',
			'author',
			'revisions',
			'excerpt',
			'custom-fields',
		],
	];

	register_post_type( 'sd_snippet', $args );
}



/**
 * Register Snippet Taxonomy
 */
function sd_register_taxonomy() {
	// register stuff in here

	$singular = __( 'Snippet Type', 'stardust' );
	$plural   = __( 'Snippet Types', 'stardust' );

	$labels = [
		'name'                       => $plural,
		'singular_name'              => $singular,
		/* translators: %s CPT Plural name. */
		'search_items'               => sprintf( __( 'Search %s', 'stardust' ), $plural ),
		/* translators: %s CPT Plural name. */
		'all_items'                  => sprintf( __( 'All %s', 'stardust' ), $plural ),
		/* translators: %s CPT Singular name. */
		'edit_item'                  => sprintf( __( 'Edit %s', 'stardust' ), $singular ),
		/* translators: %s CPT Singular name. */
		'view_item'                  => sprintf( __( 'View %s', 'stardust' ), $singular ),
		/* translators: %s CPT Singular name. */
		'update_item'                => sprintf( __( 'Update %s', 'stardust' ), $singular ),
		/* translators: %s CPT Singular name. */
		'add_new_item'               => sprintf( __( 'Add New %s', 'stardust' ), $singular ),
		/* translators: %s CPT Singular name. */
		'new_item_name'              => sprintf( __( 'New %s Name', 'stardust' ), $singular ),
		/* translators: %s CPT Plural name. */
		'not_found'                  => sprintf( __( 'No %s found.', 'stardust' ), $plural ),
		/* translators: %s CPT Plural name. */
		'no_terms'                   => sprintf( __( 'No %s', 'stardust' ), $plural ),
		/* translators: %s CPT Plural name. */
		'popular_items'              => sprintf( __( 'Popular %s', 'stardust' ), $plural ),
		/* translators: %s CPT Plural name. */
		'separate_items_with_commas' => sprintf( __( 'Separate %s with commas', 'stardust' ), $plural ),
		/* translators: %s CPT Plural name. */
		'add_or_remove_items'        => sprintf( __( 'Add or remove %s', 'stardust' ), $plural ),
		/* translators: %s CPT Plural name. */
		'choose_from_most_used'      => sprintf( __( 'Choose from the most used %s', 'stardust' ), $plural ),
	];

	$config = [
		'labels'            => $labels,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'rewrite'           => [
			'slug' => 'snippet-type',
		],
	];

	register_taxonomy( 'sd_snippet_type', 'sd_snippet', $config );
}
