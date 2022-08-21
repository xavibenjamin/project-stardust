<?php
/**
 * Letterboxd Output Template
 *
 * @package Stardust
 */

use function Stardust\DataLetterboxd\get_letterboxd_data;

$films = get_letterboxd_data();

if ( empty( $films ) ) {
	return;
}
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
		$film_title         = $film['title'];
		$film_rating        = $film['rating'];
		$film_canonical_url = $film['url'];
		$film_rewatch       = $film['rewatch'];
		$timestamp          = $film['timestamp'];
		$formatted_date     = gmdate( 'D, M jS, Y', $timestamp );
		$film_poster        = $film['poster'];

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
						<?php if ( ! empty( $film_rewatch ) ) : ?>
							<span>
								<?php get_template_part( 'template-parts/svg/icon', 'sync' ); ?>
							</span>
						<?php endif; ?>
					</div>
				</div>
			</article>
		</li>


					<?php
	}
	?>
	</ul>
</div>
