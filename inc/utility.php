<?php

/**
 * Utility functions
 * 
 * - widont()
 * - get_the_first_image()
 */

namespace Stardust\Utility;

// Theme Widont
function widont( $str = '' ) {

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


// Retrieve first image
function get_the_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  return $first_img;
}
