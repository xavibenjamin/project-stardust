<?php
/**
 * Letterboxd Data
 *
 * @package Stardust
 */

namespace Stardust\DataLetterboxd;

/**
 * Retrieve Letterboxd Data
 *
 * @return array $rss_items
 */
function get_letterboxd_data() {
	$username       = 'ttimsmith';
	$letterboxd_url = "https://letterboxd.com/$username/rss/";
	$rss            = fetch_feed( $letterboxd_url );

	$maxitems = 0;

	if ( ! is_wp_error( $rss ) ) {
		$maxitems  = $rss->get_item_quantity( 5 );
		$rss_items = $rss->get_items( 0, $maxitems );
	}

	return $rss_items;
}
