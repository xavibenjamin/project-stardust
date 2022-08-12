<?php
/**
 * Template Name: About
 *
 * @package Stardust
 */

get_header();

?>

<main tabindex="-1" id="main-content" class="site-content">

	<article class="grid grid--subgrid entry">

		<div class="entry__featured-image alignfull">
			<?php the_post_thumbnail( 'full' ); ?>
			<?php if ( get_the_post_thumbnail_caption() ) : ?>
				<figcaption class="entry__featured-image-caption"><?php the_post_thumbnail_caption(); ?></figcaption>
			<?php endif; ?>
		</div>

		<div class="entry__content hyphens">
			<?php the_content(); ?>
		</div>

		<div class="entry__aside entry__aside--about">
			<?php
				get_template_part( 'template-parts/about/last-fm' );
				get_template_part( 'template-parts/about/letterboxd' );
			?>
		</div>

	</article>
</main>

<?php get_footer(); ?>
