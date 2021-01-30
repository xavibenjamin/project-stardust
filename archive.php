<?
get_header();
?>

<main tabindex="-1" id="main-content" class="site-content">
  <div class="wrapper">
    <header class="page-header">
      <h1 class="page-header__title" id="page-title">
        <?php
          single_cat_title();
        ?>
        <small>
          <?php
            echo $wp_query->found_posts;
          ?>
        </small>
      </h1>
      
      <?php if (get_the_archive_description()) : ?>
        <?php 
          the_archive_description('<div class="page-header__description">', '</div>');
        ?>
      <?php endif; ?>
    </header>

    <div class="site-feed">
      <?php if (have_posts()) : while (have_posts()) : the_post();

        get_template_part( 'template-parts/content/format-standard' );

      endwhile; endif; ?>
    </div>

  </div>
</main>

<?php
get_footer();
?>
