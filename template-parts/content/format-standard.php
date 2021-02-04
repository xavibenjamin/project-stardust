<article <?php post_class('entry h-entry'); ?>>
  <header class="entry__header">
    <div class="entry__taxonomy"><?php the_category(' '); ?></div>
    <h1 class="entry__title">
      <a href="<?php the_permalink(); ?>"><?php echo theme_widont( get_the_title() ); ?></a>
    </h1>
    <?php if ( has_excerpt() ) : ?>
      <h2 class="entry__subtitle"><?php echo theme_widont( get_the_excerpt() ); ?></h2>
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

  <div class="e-content entry__content hyphens">
    <?php the_content(); ?>
  </div>

  <?php if ( is_singular('post') ) : ?>
  <footer class="entry__footer">
    <?php if ( comments_open() || get_comments_number() > 0 ) : ?>
      <div id="post-discussion" class="entry-comments">        
        <div class="entry-comments__comments">
          <?php comments_template(); ?>
        </div>
        
      </div>
    <?php endif; ?>
  </footer>
  <?php endif; ?>

</article>
