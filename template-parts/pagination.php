<?php
/**
 * Pagination
 *
 * @package Stardust
 */

// if not an archive, abandon
if ( ! is_archive() ) { return; }

$next_text       = __( 'Next', 'stardust' );
$prev_text       = __( 'Prev', 'stardust' );
$paged           = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$next_posts_link = get_next_posts_link( $next_text ) ?? false;
$prev_posts_link = get_previous_posts_link( $prev_text ) ?? false;
$view_more_link  = get_next_posts_link( __( 'View more', 'stardust' ) );
?>

<nav class="pagination" aria-label="Pagination">
	<div class="pagination__wrapper">
		<?php if ( 1 === $paged ) : ?>
			<span><?php echo wp_kses_post( $view_more_link ); ?></span>
		<?php else : ?>
			<?php if ( ! empty( $prev_posts_link ) ) : ?>
				<span class="pagination__label">
					<?php echo wp_kses_post( $prev_posts_link ); ?>
				</span>
			<?php else : ?>
				<span class="pagination__label pagination__label--disabled">
					<?php echo esc_html( $prev_text ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $paged ) ) : ?>
				<span class="pagination__label pagination__label--current" aria-current="page">
					<?php echo esc_html( "Page {$paged}" ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $next_posts_link ) ) : ?>
				<span class="pagination__label">
					<?php echo wp_kses_post( $next_posts_link ); ?>
				</span>
			<?php else : ?>
				<span class="pagination__label pagination__label--disabled">
					<?php echo esc_html( $next_text ); ?>
				</span>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</nav>
