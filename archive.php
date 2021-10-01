<?php
/**
 * Archive Template
 *
 * @package Stardust
 */

get_header();
?>

<main tabindex="-1" id="main-content" class="site-content">
	<div class="wrapper">
		<header class="page-header">
			<h1 class="[ page-header__title ] [ headline ]" id="page-title">
				<?php
					echo wp_kses_post( get_the_archive_title() );
				?>
			</h1>

			<?php if ( get_the_archive_description() ) : ?>
				<?php
					the_archive_description( '<div class="page-header__description">', '</div>' );
				?>
			<?php endif; ?>
		</header>

		<div class="site-feed">
			<?php
			if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content/excerpt' );

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
