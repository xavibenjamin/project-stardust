<?php
/**
 * Excerpt
 *
 * @package Stardust
 */

$rating = get_post_meta( get_the_ID(), 'rating', true ) ?? false;
$args   = [
	'rating' => $rating,
];

?>
<article class="archive-list__item">
	<?php if ( get_the_title() ) : ?><span class="archive-list__item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><?php endif; ?><?php if ( ! empty( $rating ) ) { get_template_part( 'template-parts/svg/svg-rating', '', $args ); } ?> <span class="archive-list__item-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></span>&nbsp;<a href="<?php the_permalink(); ?>" class="archive-list__item-link"><time class="dt-published"><?php echo get_the_date( 'M j, Y' ); ?></time></a>
</article>
