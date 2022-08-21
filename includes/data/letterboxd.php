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

	$filtered_data = [];
	$films         = $rss_items;

	foreach ( $films as $film ) {

		$film_title         = $film->get_item_tags( 'https://letterboxd.com', 'filmTitle' )[0]['data'];
		$film_rating        = $film->get_item_tags( 'https://letterboxd.com', 'memberRating' )[0]['data'];
		$film_watched_date  = $film->get_item_tags( 'https://letterboxd.com', 'watchedDate' )[0]['data'];
		$film_rewatch       = $film->get_item_tags( 'https://letterboxd.com', 'rewatch' )[0]['data'];
		$film_canonical_url = $film->get_link();
		$timestamp          = strtotime( $film_watched_date );
		$formatted_date     = gmdate( 'D, M jS, Y', $timestamp );
		$content            = $film->get_content();
		preg_match( '/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $first_image );
		$film_poster = $first_image['src'];

		array_push(
			$filtered_data,
			[
				'title'     => $film_title,
				'rating'    => $film_rating,
				'timestamp' => $timestamp,
				'rewatch'   => 'Yes' === $film_rewatch ? true : false,
				'poster'    => $film_poster,
				'url'       => $film_canonical_url,
			]
		);
	}

	return $filtered_data;
}
