<?php
/**
 * Post Tags
 *
 * @package Stardust
 */

	$posttags = get_the_tags();

if ( $posttags ) :
	?>

	<div class="entry__tags">
	<?php get_template_part( 'template-parts/svg/icon-tags' ); ?>

	<?php the_tags( '<span class="entry__tags-list">', ', ', '</span>' ); ?>
	</div>
<?php endif; ?>
