<?php
/**
 * Post Tags
 *
 * @package Stardust
 */

$snippet_types = get_the_term_list(
	get_the_ID(),
	'sd_snippet_type',
	'<span class="entry__tags-list">',
	', ',
	'</span>'
);


if ( $snippet_types ) :
	?>
	<div class="entry__tags">
	<?php get_template_part( 'template-parts/svg/icon-code-folder' ); ?>

	<?php echo wp_kses_post( $snippet_types ); ?>
	</div>
<?php endif; ?>
