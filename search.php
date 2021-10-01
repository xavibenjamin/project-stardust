<?php
/**
 * Search Template
 *
 * @package Stardust
 */

get_header();
?>

<main tabindex="-1" id="main-content" class="site-content">
	<div class="wrapper">

		<header class="page-header">

			<h1 class="mini-headline">Search Results</h1>

			<div class="site-search">
				<form action="/" method="get">
					<label for="search-box" class="screen-reader-hide">Search</label>
					<input type="text" id="search-box" name="s" class="site-search__input" placeholder="Search…" value="<?php the_search_query(); ?>" autofocus>
				</form>
				<div class="site-search__results">
					<?php

						$allsearch      = new WP_Query( "s=$s&showposts=0" );
						$results        = $allsearch->found_posts;
						$results_output = sprintf( _n( 'Found %s result', 'Found %s results', $results ), $results );
					?>
					<p><?php echo esc_html( $results_output ); ?></p>
				</div>
			</div>
		</header>

		<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content/excerpt' );
			endwhile;
		?>

		<?php else : ?>
			<p><?php echo esc_html( 'No posts found. Try a different search?' ); ?></p>
		<?php endif; ?>

		<?php wp_pagenavi(); ?>

	</div>
</main>

<?php get_footer(); ?>
