<?php
/*
* Template Name: Archive
*/


  get_header(); ?>

<main tabindex="-1" id="main-content" class="site-content">
  <div class="wrapper">
  
    <div class="taxonomy-list">
      <h2 class="taxonomy-list__title">Browse by Subject</h2>
      <ul class="taxonomy-list__list">
			 <?php wp_list_categories( array(
        'exclude'  => 1,
        'title_li' => ''
    ) ); ?>
      </ul>
    </div>

    <div class="taxonomy-list">
      <h2 class="taxonomy-list__title">Browse by Year</h2>
      <ul class="taxonomy-list__list">
			 <?php wp_get_archives('type=yearly'); ?>
      </ul>
    </div>

  </div>
</main>


<?php get_footer(); ?>
