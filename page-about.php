<?php
/**
 * Template Name: About
 *
 * @package Stardust
 */

get_header();

use function Stardust\DataLastFm\show_lastfm;
?>

<main tabindex="-1" id="main-content" class="site-content">
	<div class="about-cover">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>

	<div class="about-body">
		<div class="wrapper wrapper--large grid grid--about">
			<div class="about-body__main">
				<div class="entry__content hyphens">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="about-body__sidebar">
				<?php
					$songs = show_lastfm();
					echo wp_kses_post( $songs );
				?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
?>
