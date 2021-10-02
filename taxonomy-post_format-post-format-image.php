<?php
/**
 * Image Format Archive
 *
 * @package Stardust
 */

get_header();
?>

<main tabindex="-1" id="main-content" class="site-content">
	<div class="wrapper wrapper--large">

		<div class="photo-grid">
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part(
						'template-parts/content/photo-card'
					);

				endwhile;
			endif;
			?>
		</div>

		<?php wp_pagenavi(); ?>
	</div>
</main>

<?php
get_footer();
?>
