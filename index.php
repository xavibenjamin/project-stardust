<?php
/**
 * Index Template
 *
 * @package Stardust
 */

get_header();
?>

<main tabindex="-1" id="main-content" class="site-content">
	<div class="wrapper">

		<div class="site-feed">
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part(
						'template-parts/content/content'
					);

			endwhile;
endif;
			?>
		</div>
	</div>
</main>

<?php
get_footer();
?>
