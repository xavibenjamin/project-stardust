<?php

function stardust_scripts() {
  wp_enqueue_script( 'stardust-scripts', get_stylesheet_directory_uri() . '/dist/frontend-bundle.js', [], '', true );
  wp_enqueue_style( 'stardust-styles', get_stylesheet_directory_uri() . '/dist/frontend.css' );
}
add_action( 'wp_enqueue_scripts', 'stardust_scripts');

function stardust_setup() {

  // Add post-formats support
  add_theme_support(
    'post-formats',
    array(
      'image',
      'status',
    )
  );

  // Add support for featured images
  add_theme_support( 'post-thumbnails' );

  // Add support for full and wide align images
  add_theme_support( 'align-wide' );
  
  // Add support for responsive embedded content.
  add_theme_support( 'responsive-embeds' );

  // Add support for Wordpress generated titles
  add_theme_support( 'title-tag' );

  // Automatic feed
  add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'stardust_setup' );
