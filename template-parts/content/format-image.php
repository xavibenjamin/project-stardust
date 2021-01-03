<article <?php post_class('entry'); ?>>

  <div class="e-content entry__content">
    <?php the_content(); ?>
  </div>

  <footer class="entry__footer">
    <div class="entry__meta">
      <a href="<?php the_permalink(); ?>" class="entry__date u-url"><time class="dt-published"><?php echo get_the_date('D, M jS, Y · g:i a'); ?></time></a>
    </div>
  </footer>

</article>
