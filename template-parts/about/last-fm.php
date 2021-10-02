<?php
/**
 * Recently Played
 *
 * Displays the last 10 last fm songs.
 *
 * @package Stardust
 */

use function Stardust\DataLastFm\get_lastfm_data;

$tracks = get_lastfm_data();
?>

<?php if ( ! empty( $tracks ) ) : ?>
<div class="recently-played sidebar-section">

	<h2 class="sidebar-section__title">
		<?php esc_html_e( 'Recently Listened', 'stardust' ); ?>
		<?php get_template_part( 'template-parts/svg/icon-music' ); ?>
	</h2>

	<ul class="sidebar-section__list">
		<?php
		foreach ( $tracks as $track ) :
			[
				'name' => $song_name,
				'url' => $song_url,
				'artist' => [
					'#text' => $artist_name
				],
				'image' => [
					'2' => [
						'#text' => $cover_img
					]
				]
			] = $track;
			?>

			<li>
				<article class="card card--song">
					<div class="card__media">
						<img
							src="<?php echo esc_attr( $cover_img ); ?>"
							alt="Cover Art for <?php echo esc_attr( $song_name ); ?> by <?php echo esc_attr( $artist_name ); ?>">
					</div>
					<div class="card__info">
						<h3 class="card__title">
							<?php echo esc_attr( $song_name ); ?>
						</h3>
						<a
							class="card__link"
							href="<?php echo esc_attr( $song_url ); ?>" target="_blank"
						></a>
						<div class="card__meta">
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
