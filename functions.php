<?php


function stardust_scripts() {
  wp_enqueue_script( 'stardust-scripts', get_stylesheet_directory_uri() . '/dist/frontend-bundle.js', [], '', true );
  wp_enqueue_style( 'stardust-styles', get_stylesheet_directory_uri() . '/dist/frontend.css' );
}

add_action( 'wp_enqueue_scripts', 'stardust_scripts');
