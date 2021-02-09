<article <?php post_class('entry h-entry'); ?>>

  <div class="e-content entry__content hyphens">
    <?php the_content(); ?>
  </div>

  <footer class="entry__footer">
    <div class="entry__meta">
      <a href="<?php the_permalink(); ?>" class="entry__date u-url"><span class="entry__date-arrow">&rarr;</span><time class="dt-published" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date('D, M jS, Y · g:i a'); ?></time></a>
    </div>

    <?php if ( is_singular('post') ) : ?>
      <?php
        get_template_part(
          'template-parts/content/post-tags'
        );
        ?>
    <?php if ( comments_open() || get_comments_number() > 0 ) : ?>
      <div id="post-discussion" class="entry-comments">        
        <div class="entry-comments__comments">
          <?php comments_template(); ?>
        </div>
        
      </div>
    <?php endif; endif; ?>
  </footer>

</article>
