<?php
/*
* Template Name: Subscribe
*/
get_header(); ?>

<main tabindex="-1" id="main-content" class="site-content">
  <div class="wrapper">
    <div class="site-newsletter">
      <h1 class="site-newsletter__title"><?php the_title(); ?></h1>
      <div class="entry__content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</main>

<? get_footer(); ?>
