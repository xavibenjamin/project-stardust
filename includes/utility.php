<?php
/**
 * Utility functions
 *
 * - widont()
 * - get_the_first_image()
 *
 * @package Stardust
 */

namespace Stardust\Utility;

/**
 * Widont
 * - add non-breaking space between the last two words of a string
 *
 * @param string $str the content or other string
 * @return string
 */
function widont( $str = '' ) {

	// Strip spaces.
	$str = trim( $str );
	// Find the last space.
	$space = strrpos( $str, ' ' );

	// If there's a space then replace the last on with a non breaking space.
	if ( false !== $space ) {
		$str = substr( $str, 0, $space ) . '&nbsp;' . substr( $str, $space + 1 );
	}

	// Return the string.
	return $str;
}


/**
 * Get the first image of a post
 *
 * @return string
 */
function get_the_first_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output    = preg_match_all( '/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches );
	$first_img = $matches[1][0];

	return $first_img;
}

/**
 * Allowed SVG tags and attrs for syndication links
 *
 * @return array
 */
function syndication_allowed_html_svg(): array {
	return wp_parse_args(
		[
			'ul'    => [
				'class' => true,
			],
			'span'  => [
				'class'       => true,
				'aria-label'  => true,
				'aria-hidden' => true,
			],
			'a'     => [
				'aria-label' => true,
				'class'      => true,
				'href'       => true,
				'rel'        => true,
			],
			'li'    => [
				'li' => true,
			],
			'svg'   => [
				'fill'    => true,
				'role'    => true,
				'viewbox' => true,
				'xmlns'   => true,
			],
			'path'  => [
				'd'         => true,
				'fill'      => true,
				'fill-rule' => true,
				'stroke'    => true,
				'clip-rule' => true,
			],
			'title' => [
				'title' => true,
			],
		],
		[]
	);
}
