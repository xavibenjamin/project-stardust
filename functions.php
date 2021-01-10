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

// Theme Widont
function theme_widont( $str = '' ) {

  // Strip spaces.
  $str = trim( $str );
  // Find the last space.
  $space = strrpos( $str, ' ' );

  // If there's a space then replace the last on with a non breaking space.
  if ( false !== $space ) {
    $str = substr( $str, 0, $space ) . '&nbsp;' . substr( $str, $space + 1 );
  }

  // Return the string.
  return $str;
}

// Comment Replies
function sd_enqueue_comments_reply() {

  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
  
}
add_action(  'wp_enqueue_scripts', 'sd_enqueue_comments_reply' );
