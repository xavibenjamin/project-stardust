<?
get_header();
?>

<main tabindex="-1" id="main-content" class="site-content">
  <div class="wrapper">

    <div class="photo-grid">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php
          $count = count( get_attached_media( 'image', $post->ID ) );
        ?>

        <article class="photo-grid__card">
          <?php if ( get_the_post_thumbnail() != '' ): ?>
            <?php the_post_thumbnail(); ?>
          <?php else: ?>
          <img src="<?php echo get_the_first_image() ?>" alt="">
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

      <?php endwhile; endif; ?>
    </div>
  </div>
</main>

<?php
get_footer();
?>
