<?php
/**
 * Index Template
 *
 * @package Stardust
 */

get_header();
$is_photos = is_tax( 'post_format', 'post-format-image' );
?>

<main tabindex="-1" id="main-content" class="site-content">
<?php if ( is_archive() && ! $is_photos ) : ?>
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
		<?php endif; ?>

		<?php if ( $is_photos ) : ?>
			<div class="grid">
		<?php endif; ?>
		<div class="<?php echo $is_photos ? 'photo-grid' : 'site-feed'; ?>">
			<?php
			if ( have_posts() ) : 
				while ( have_posts() ) : the_post();

					if ( $is_photos ) {
						get_template_part(
							'template-parts/content/photo-card'
						);
					} elseif ( is_archive() ) {
						get_template_part(
							'template-parts/content/excerpt'
						);
					} else {
						get_template_part(
							'template-parts/content/content'
						);
					}
				endwhile;
			endif;
			?>
		</div>
		<?php if ( $is_photos ) : ?>
			</div>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/pagination' ); ?>
	</div>
</main>

<?php
get_footer();
?>
