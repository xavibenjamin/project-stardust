<?php
/*
* Template Name: Photos
*/


  get_header();

  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    
    'tax_query' => array(
      array(
        'taxonomy' => 'post_format',
        'field'    => 'slug',
        'terms'    => array( 'post-format-image' ),
      ),
    ),
  );

  $photo_query = new WP_Query( $args ); ?>

<main tabindex="-1" id="main-content" class="site-content">
  <div class="wrapper">

    <div class="photo-grid alignwide">

      <?php
      
      if ( $photo_query->have_posts() ) : while ( $photo_query->have_posts() ) : $photo_query->the_post();

      $count = count( get_attached_media( 'image', $post->ID ) ); ?>

       <article class="photo-grid__card">
  
        <?php if ( get_the_post_thumbnail() != '' ): ?>
          <?php the_post_thumbnail(); ?>
        <?php else: ?>
        <img src="<?php echo get_the_first_image() ?>" alt="" loading="lazy">
        <?php endif; ?>
        <a href="<?php the_permalink(); ?>" aria-label="Visit image post from <?php echo get_the_date('D, M jS, Y'); ?>"></a>
        
        <?php
          if ( $count > 1 ) {
            get_template_part(
            'template-parts/svg/icon',
            'images'
            );
          }
          ?>
      </article>
      
      <?php
      endwhile; endif;

      /* Restore original Post Data */
      wp_reset_postdata(); ?>

    </div>
  </div>
</main>


<?php get_footer(); ?>
