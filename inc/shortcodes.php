<?php
/**
 * Shortcodes
 * 
 * @package Stardust
 */

namespace Stardust\Shortcodes;

function setup() {

  $n = function( $function ) {
    return __NAMESPACE__ . "\\$function";
  };

  add_shortcode( 'alert', $n( 'sd_alert_shortcode' ) );
}

function sd_alert_shortcode( $atts, $content = '' ) { 

  $attributes = shortcode_atts( [
    'label'   => 'Note',
    'variant' => 'primary',
    'content' => $content,
  ], $atts );
  
  ob_start();

  // include template
  get_template_part( 
    'template-parts/shortcodes/alert', 
    null, 
    $attributes
  );

  return ob_get_clean();
}


