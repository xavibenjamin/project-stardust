<?php
/**
 * Last FM
 * - Fetches and displays the latest listening date from Last FM
 *
 * @package Stardust
 */

namespace Stardust\DataLastFm;

/**
 * Get Data
 * - retrieve data from Last FM api
 *
 * @return array
 */
function get_lastfm_data() {
	$api_key  = $_ENV['LASTFM_API_KEY'];
	$username = 'timothybsmith';
	$api_root = 'http://ws.audioscrobbler.com/2.0/';
	$api_url  = "{$api_root}?method=user.getrecenttracks&user={$username}&limit=5&api_key={$api_key}&format=json";

	$lastfm_data = get_transient( 'sd_lastfm_data' );

	if ( false === $lastfm_data ) {
		$response = wp_remote_get( $api_url );
		if ( ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
			$body = json_decode( wp_remote_retrieve_body( $response ), true );
			set_transient( 'sd_lastfm_data', $body, DAY_IN_SECONDS );
		}
	}

	return $lastfm_data['recenttracks']['track'];
}
