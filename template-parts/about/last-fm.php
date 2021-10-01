<?php
/**
 * Recently Played
 *
 * Displays the last 10 last fm songs.
 *
 * @package Stardust
 */

$tracks = $args['recenttracks']['track'] ?? false;
?>

<?php if ( ! empty( $tracks ) ) : ?>
<div class="recently-played">

	<h2 class="recently-played__title">
		<?php esc_html_e( 'Recently Listened', 'stardust' ); ?>
		<?php get_template_part( 'template-parts/svg/icon-music' ); ?>
	</h2>

	<ul class="recently-played__list">
		<?php
		foreach ( $tracks as $track ) :
			[
				'name' => $song_name,
				'url' => $song_url,
				'artist' => [
					'#text' => $artist_name
				],
				'image' => [
					'1' => [
						'#text' => $cover_img
					]
				]

			] = $track;
			?>

			<li>
				<article class="track">
					<div class="track__media">
						<img
							src="<?php echo esc_attr( $cover_img ); ?>"
							alt="Cover Art for <?php echo esc_attr( $song_name ); ?> by <?php echo esc_attr( $artist_name ); ?>">
					</div>
					<div class="track__info">
						<h3 class="track__title">
						<?php echo esc_attr( $song_name ); ?>
						</h3>
						<a
							class="track__link"
							href="<?php echo esc_attr( $song_url ); ?>" target="_blank"
						></a>
						<div class="track__artist">
							<span>
							<?php echo esc_attr( $artist_name ); ?>
							</span>
						</div>
					</div>
				</article>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
