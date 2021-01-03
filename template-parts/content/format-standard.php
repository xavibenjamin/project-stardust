<article <?php post_class('entry'); ?>>
  <header class="entry__header">
    <div class="entry__taxonomy"><?php the_category(' '); ?></div>
    <h1 class="entry__title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h1>
    <?php if ( has_excerpt() ) : ?>
      <div class="entry__subtitle"><?php the_excerpt(); ?></div>
    <?php endif; ?>
    <div class="entry__meta">
      <a href="<?php the_permalink(); ?>" class="entry__date u-url"><time class="dt-published"><?php echo get_the_date('D, M jS, Y'); ?></time></a>
    </div>
  </header>

  <?php if ( has_post_thumbnail() ) : ?>
    <figure class="entry__featured-image">
      <?php the_post_thumbnail( 'medium_large' ); ?>
      <?php if ( get_the_post_thumbnail_caption() ) : ?>
        <figcaption class="entry__featured-image-caption"><?php the_post_thumbnail_caption(); ?></figcaption>
      <?php endif; ?>
    </figure>
  <?php endif; ?>

  <div class="e-content entry__content">
    <?php the_content(); ?>
  </div>

</article>
