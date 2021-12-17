<?php
/**
 * Overrides for WordPress Core
 *
 * @package Stardust
 */

namespace Stardust\Overrides;

/**
 * Overrides Setup Function
 *
 * @return void
 */
function setup() {

	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Auto-Link Twitter usernames in posts and comments
	add_filter( 'the_content', $n( 'sd_twitter_profile_replace' ) );
	add_filter( 'comment_text', $n( 'sd_twitter_profile_replace' ) );

	// Modify Excerpt Length
	add_filter( 'excerpt_length', $n( 'sd_custom_excerpt_length' ), 999 );

	// Modify Excerpt Ending
	add_filter( 'excerpt_more', $n( 'sd_excerpt_more' ) );

	// Modify the archive title
	add_filter( 'get_the_archive_title', $n( 'sd_archive_title' ) );

	// Exclude posts in these categories from subscription emails
	add_filter( 'jetpack_subscriptions_exclude_these_categories', $n( 'sd_exclude_these' ) );

	// Modify Read More Link
	add_filter( 'the_content_more_link', $n( 'modify_read_more_link' ) );

	// Add Async Attrs to CSS
	add_filter( 'style_loader_tag', $n( 'sd_async_css' ), 10, 2 );

}

/**
 * Twitter Profile Replace
 * - autolink twitter profiles in the_content
 *
 * @param string $content this is the content
 * @return string
 */
function sd_twitter_profile_replace( $content ) {
	$twtreplace = preg_replace( '/(\s)@(\w+)/', '&nbsp;<a href="http://twitter.com/$2" target="_blank" rel="nofollow">@$2</a>', $content );

	return $twtreplace;
}

/**
 * Custom Excerpt Length
 *
 * @param int $length length
 * @return int
 */
function sd_custom_excerpt_length( $length ) {
	return 25;
}

/**
 * Custom Excerpt More
 *
 * @param string $more more
 * @return string
 */
function sd_excerpt_more( $more ) {
	return '…';
}

/**
 * Custom Archive Title
 *
 * @param string $title title
 * @return string
 */
function sd_archive_title( $title ) {
	if ( is_category() ) {
		$title = '<span class="page-header__tax-type">Category</span>' . single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = '<span class="page-header__tax-type">Tag</span>' . single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax( 'post_format' ) ) {
		$title = '<span class="page-header__tax-type">Post Format</span>' . single_term_title( '', false );
	} elseif ( is_tax( 'sd_snippet_type' ) ) {
		$title = '<span class="page-header__tax-type">Snippet Type</span>' . single_term_title( '', false );
	} elseif ( is_month() ) {
		$title = '<span class="page-header__tax-type">Month</span>' . get_the_date( _x( 'F Y', 'monthly archives date format' ) );
	}

	return $title;
}

/**
 * Exclude posts in these categories from subscription emails
 *
 * @param array $categories categories
 * @return array
 */
function sd_exclude_these( $categories ) {
	$categories = array( 'skip-email' );
	return $categories;
}

/**
 * Modify Read More Link
 *
 * @return string
 */
function modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Read More&nbsp;<span class="more-link__arrow">&rarr;</span></a>';
}

/**
 * Adds Async Attributes to stylesheet tag
 *
 * @param  string $html the original stylesheet tag
 * @return string the modified stylesheet tag
 */
function sd_async_css( $html ) {
	return str_replace( "rel='stylesheet'", "rel='stylesheet' media=\"print\" onload=\"this.media='all'\"", $html );
}
