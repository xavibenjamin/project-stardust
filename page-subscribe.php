<?php
/*
* Template Name: Subscribe
*/
get_header(); ?>

<main tabindex="-1" id="main-content" class="site-content">
  <div class="wrapper">
    <div class="site-newsletter">
      <h1 class="site-newsletter__title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <small>If email isn't your thing, <a href="<?php bloginfo('rss2_url'); ?>">grab the <span class="caps">RSS</span> feed</a>.</small>
    </div>
  </div>
</main>

<? get_footer(); ?>
