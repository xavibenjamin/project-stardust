<?php
/**
 * Letterboxd Output Template
 *
 * @package Stardust
 */

use function Stardust\DataLetterboxd\get_letterboxd_data;

$films = get_letterboxd_data();
?>

<div class="recently-watched sidebar-section">
	<h2 class="sidebar-section__title">
		<?php
			echo esc_html( 'Recently Watched' );
			get_template_part( 'template-parts/svg/icon-movie' );
		?>
	</h2>

	<ul class="sidebar-section__list">
	<?php
	foreach ( $films as $film ) {
		$film_title         = $film->get_item_tags( 'https://letterboxd.com', 'filmTitle' )[0]['data'];
		$film_rating        = $film->get_item_tags( 'https://letterboxd.com', 'memberRating' )[0]['data'];
		$film_watched_date  = $film->get_item_tags( 'https://letterboxd.com', 'watchedDate' );
		$film_canonical_url = $film->get_link();
		$timestamp          = strtotime( $film_watched_date[0]['data'] );
		$formatted_date     = gmdate( 'D, M jS, Y', $timestamp );
		$content            = $film->get_content();
		preg_match( '/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $first_image );
		$film_poster = $first_image['src'] ?? false;

		$ratings_partial_args = [
			'rating' => $film_rating,
		];

		?>

		<li>
			<article class="card card--film">
				<?php if ( ! empty( $film_poster ) ) : ?>
					<div class="card__media">
						<img src="<?php echo esc_attr( $film_poster ); ?>" alt="<?php echo esc_attr( "Poster for $film_title" ); ?>">
					</div>
				<?php endif; ?>
				<div class="card__info">
					<h3 class="card__title">
						<?php echo esc_html( $film_title ); ?>
						<?php
							get_template_part(
								'template-parts/svg/svg-rating',
								null,
								$ratings_partial_args
							);
						?>
					</h3>
					<a href="<?php echo esc_attr( $film_canonical_url ); ?>" class="card__link" aria-label="View <?php echo esc_attr( $film_title ); ?> on Letterboxd" target="_blank"></a>
					<div class="card__meta">
						<span>
							<?php echo esc_html( $formatted_date ); ?>
						</span>
					</div>
				</div>
			</article>
		</li>


					<?php
	}
	?>
	</ul>
</div>
