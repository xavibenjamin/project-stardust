<?php
/**
 * Template Name: About
 *
 * @package Stardust
 */

get_header();

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
					get_template_part( 'template-parts/about/last-fm' );
					get_template_part( 'template-parts/about/letterboxd' );
				?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
?>
