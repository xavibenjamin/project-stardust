<?php
/**
 * Last FM
 * - Fetches and displays the latest listening date from Last FM
 *
 * @package Stardust
 */

namespace Stardust\DataLastFm;

/**
 * Get API Options
 *
 * @return $settings Default settings
 */
function get_api_options() {
	$settings = [
		'api_key'  => $_ENV['LASTFM_API_KEY'],
		'username' => 'timothybsmith',
		'api_root' => 'http://ws.audioscrobbler.com/2.0/',
	];

	return $settings;
}

/**
 * Get Recent Tracks
 * - retrieve data from Last FM api
 *
 * @return array $filtered_data Just the tracks
 */
function get_recent_tracks() {
	$settings    = get_api_options();
	$api_key     = $settings['api_key'];
	$username    = $settings['username'];
	$api_root    = $settings['api_root'];
	$api_url     = "{$api_root}?method=user.getrecenttracks&user={$username}&limit=5&api_key={$api_key}&format=json";
	$lastfm_data = get_transient( 'sd_lastfm_data' );

	if ( false === $lastfm_data ) {
		$response = wp_remote_get( $api_url );
		if ( ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
			$body = json_decode( wp_remote_retrieve_body( $response ), true );
			set_transient( 'sd_lastfm_data', $body, DAY_IN_SECONDS );
		}
	}

	$filtered_data = $lastfm_data['recenttracks']['track'];

	return $filtered_data;
}

/**
 * Get Top Artists
 *
 * @return array $filtered_data the artists array
 */
function get_top_artists() {
	$settings         = get_api_options();
	$api_key          = $settings['api_key'];
	$username         = $settings['username'];
	$api_root         = $settings['api_root'];
	$api_url          = "{$api_root}?method=user.gettopartists&user={$username}&limit=10&api_key={$api_key}&format=json";
	$top_artists_data = get_transient( 'sd_lastfm_top_artists_data' );

	if ( false === $top_artists_data ) {
		$response = wp_remote_get( $api_url );
		if ( ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
			$body = json_decode( wp_remote_retrieve_body( $response ), true );
			set_transient( 'sd_lastfm_top_artists_data', $body, DAY_IN_SECONDS );
		}
	}

	$filtered_data = $top_artists_data['topartists']['artist'];

	return $filtered_data;
}
