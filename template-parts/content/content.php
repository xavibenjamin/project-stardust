<?php
/**
 * Standard Template
 *
 * @package Stardust
 */

use function Stardust\Utility\widont;

$rating = get_post_meta( get_the_ID(), 'rating', true ) ?? false;
$args   = [
	'rating' => $rating,
];

$title   = ! empty( get_the_title() ) ? widont( get_the_title() ) : '';
$excerpt = has_excerpt() ? widont( get_the_excerpt() ) : '';

?>

<article <?php post_class( 'entry h-entry' ); ?>>
	<?php if ( ! has_post_format() ) : ?>
		<header class="entry__header">
			<?php if ( has_category() ) : ?>
				<div class="entry__taxonomy"><?php the_category( ' ' ); ?></div>
			<?php endif; ?>
			<h1 class="entry__title headline">
				<a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $title ); ?></a>
			</h1>
			<?php if ( has_excerpt() ) : ?>
				<h2 class="entry__subtitle"><?php echo esc_html( $excerpt ); ?></h2>
			<?php endif; ?>
			<div class="entry__meta">
				<a href="<?php the_permalink(); ?>" class="entry__date u-url"><time class="dt-published" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'D, M jS, Y' ); ?></time></a>
			</div>

			<?php
			if ( ! empty( $rating ) ) {
				get_template_part(
					'template-parts/svg/svg-rating',
					'',
					$args
				);
			}
			?>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<figure class="entry__featured-image">
				<?php the_post_thumbnail( 'medium_large' ); ?>
				<?php if ( get_the_post_thumbnail_caption() ) : ?>
					<figcaption class="entry__featured-image-caption"><?php the_post_thumbnail_caption(); ?></figcaption>
				<?php endif; ?>
			</figure>
		<?php endif; ?>

	<?php endif; ?>

	<div class="e-content entry__content hyphens">
		<?php the_content(); ?>
	</div>

	<footer class="entry__footer">
		<?php if ( has_post_format() && ! is_page() ) : ?>
			<div class="entry__meta">
				<a href="<?php the_permalink(); ?>" class="entry__date u-url"><span class="entry__date-arrow">&rarr;</span><time class="dt-published" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'D, M jS, Y · g:i a' ); ?></time></a>
			</div>
		<?php endif; ?>

		<?php if ( is_singular( 'post' ) ) : ?>
			<?php
				get_template_part(
					'template-parts/content/post-tags'
				);

				// Add Post Syndication
				get_template_part(
					'template-parts/content/post-syndication'
				);
			?>
			<?php if ( comments_open() || get_comments_number() > 0 ) : ?>
			<div id="post-discussion" class="entry-comments">
				<div class="entry-comments__comments">
					<?php comments_template(); ?>
				</div>

			</div>
				<?php
		endif;
endif;
		?>
	</footer>

</article>
