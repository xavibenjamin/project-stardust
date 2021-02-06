<article class="photo-grid__card">
  <?php
    $count = count( get_attached_media( 'image', $post->ID ) );
  ?>

  <?php if ( get_the_post_thumbnail() != '' ): ?>
    <?php the_post_thumbnail( 'photo-card' ); ?>
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
