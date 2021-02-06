<?php

// Useful global constants.
define( 'SD_VERSION', '2021.13' );

function stardust_scripts() {
  wp_enqueue_script(
    'stardust-scripts',
    get_stylesheet_directory_uri() . '/dist/frontend-bundle.js',
    [],
    SD_VERSION,
    true 
  );

  wp_enqueue_style(
    'stardust-styles',
    get_stylesheet_directory_uri() . '/dist/frontend.css',
    [],
    SD_VERSION
  );
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

  // Register Menu
  register_nav_menu( 'primary', __( 'Primary Menu', 'timmmmydotblog' ) );

  // Register Photo Card Thumb
  add_image_size( 'photo-card', 600, 600, true );
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

// Auto-link Twitter usernames
function sd_twitter_profile_replace($content) {
  $twtreplace = preg_replace('/(\s)@(\w+)/',"&nbsp;<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);

  return $twtreplace;
}
add_filter('the_content', 'sd_twitter_profile_replace');
add_filter('comment_text', 'sd_twitter_profile_replace');

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

// Modify Excerpt Length
function sd_custom_excerpt_length( $length ) {
  return 25;
}
add_filter( 'excerpt_length', 'sd_custom_excerpt_length', 999 );

// Modify Excerpt Ending
function sd_excerpt_more( $more ) {
    return '…';
}
add_filter( 'excerpt_more', 'sd_excerpt_more' );

// Modify Archive Title
function sd_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_month() ) {
        $title  = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    }
  
    return $title;
}
add_filter( 'get_the_archive_title', 'sd_archive_title' );

// Exclude posts in these categories from subscription emails
function sd_exclude_these( $categories ) {
  $categories = array( 'skip-email' );
  return $categories;
}
add_filter( 'jetpack_subscriptions_exclude_these_categories', 'sd_exclude_these' );
