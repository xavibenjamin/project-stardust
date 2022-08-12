<?php
/**
 * Template Name: Archive
 *
 * @package Stardust
 */

get_header();
?>

<main tabindex="-1" id="main-content" class="site-content">
	<div class="wrapper wrapper--large">

		<div class="taxonomy-list">
			<h2 class="taxonomy-list__title">Browse by Category</h2>
			<ul class="taxonomy-list__list">
				<?php



					wp_list_categories(
						array(
							'exclude'  => array( 1, 156 ),
							'title_li' => '',
						)
					);
					?>
			</ul>
		</div>

		<div class="taxonomy-list">
			<h2 class="taxonomy-list__title">Browse by Popular Tags</h2>
			<?php
			$tags = get_tags(
				array(
					'orderby' => 'count',
					'order'   => 'DESC',
					'number'  => 20,
				)
			);
			$html = '<ul class="taxonomy-list__list">';
			foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );

					$html .= "<li><a href='{$tag_link}' title='Tag: {$tag->name}'>";
					$html .= "{$tag->name}</a></li>";
			}
			$html .= '</ul>';
			echo wp_kses_post( $html );
			?>
		</div>

		<div class="taxonomy-list">
			<h2 class="taxonomy-list__title">Browse by Month</h2>
			<ul class="taxonomy-list__list">
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>

	</div>
</main>


<?php get_footer(); ?>
