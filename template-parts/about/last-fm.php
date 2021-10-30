<?php
/**
 * Recently Played
 *
 * Displays the last 10 last fm songs.
 *
 * @package Stardust
 */

use function Stardust\DataLastFm\get_recent_tracks;
use function Stardust\DataLastFm\get_top_artists;

$tracks  = get_recent_tracks();
$artists = get_top_artists();

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

<?php if ( ! empty( $artists ) ) : ?>
<div class="top-artists sidebar-section">
	<h2 class="sidebar-section__title">
		<?php esc_html_e( 'Top Artists', 'stardust' ); ?>
		<?php get_template_part( 'template-parts/svg/icon-microphone' ); ?>
	</h2>

	<ul class="sidebar-section__list sidebar-section__list--compressed">
		<?php
		foreach ( $artists as $artist ) :
			[
				'name'      => $artist_name,
				'url'       => $artist_url,
				'playcount' => $artist_playcount,
			] = $artist;
			?>

			<li>
				<a class="pill" href="<?php echo esc_url( $artist_url ); ?>">
					<span class="pill__title"><?php echo esc_html( $artist_name ); ?></span>
					<span class="pill__meta"><?php echo esc_html( $artist_playcount ); ?></span>
				</a>
			</li>

		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
