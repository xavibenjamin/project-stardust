<?
get_header();
?>

<main tabindex="-1" id="main-content">
  <div class="wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post();

      if ( has_post_format( 'status') || has_post_format( 'image') ) {
        get_template_part( 'template-parts/content/format', get_post_format() );
      } else {
        get_template_part( 'template-parts/content/format-standard' );
      }

    endwhile; endif; ?>
  </div>
</main>

<?php
get_footer();
?>
