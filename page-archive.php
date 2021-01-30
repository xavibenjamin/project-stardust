<?php
/*
* Template Name: Archive
*/


  get_header(); ?>

<main tabindex="-1" id="main-content" class="site-content">
  <div class="wrapper">

    <div class="archive-list">

      <?php

      $query = new WP_Query( array( 'posts_per_page' => -1 ) );
      
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

       <article class="archive-list__item">
        <span class="archive-list__item-title"><?php the_title(); ?></span>
        <span class="archive-list__item-excerpt"><?php echo get_the_excerpt(); ?></span>&nbsp;<a href="<?php the_permalink(); ?>" class="archive-list__item-link"><time class="dt-published"><?php echo get_the_date('M j, Y'); ?></time></a>
      </article>
      
      <?php
      endwhile; endif;

      /* Restore original Post Data */
      wp_reset_postdata(); ?>

    </div>
  </div>
</main>


<?php get_footer(); ?>
