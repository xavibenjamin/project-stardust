<?php
/**
 * Alert Shortcode
 * 
 * @package Stardust
 */

$label = ! empty( $args['label'] ) ? $args['label'] : 'Note';
$variant = ! empty( $args['variant'] ) ? $args['variant'] : 'primary';
$content = ! empty( $args['content'] ) ? $args['content'] : '';

?>

<div class="alert" data-variant="<?php echo esc_attr( $variant ); ?>">
  <p class="alert__label"><?php echo esc_attr( $label ); ?></p>
  <?php echo $content ?>
  <div class="alert__icon">
    <?php
      get_template_part( 
        'template-parts/svg/icon-alert', 
        $variant
      );
      ?>
  </div>
</div>
