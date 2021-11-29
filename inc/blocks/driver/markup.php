<?php
/**
 * Example block markup
 *
 * @package Stardust\Blocks\Driver
 *
 * @var array $args {
 *     $args is provided by get_template_part.
 *
 *     @type array $attributes Block attributes.
 *     @type array $content    Block content.
 *     @type array $block      Block instance.
 * }
 */

// Set defaults.
$attributes = $args['attributes'];
$class_name = $args['class_name'] ?? '';
$variant    = $attributes['className'] ?? false;
$content    = $args['content'] ?? false;
$title      = $attributes['title'] ?? 'Note';

?>
<div class="<?php echo esc_attr( $class_name ); ?> <?php echo esc_attr( $variant ); ?>">
	<p class="wp-block-stardust-driver__label"><?php echo esc_html( $title ); ?></p>

	<?php echo $content; // phpcs:disable ?>
	<div class="wp-block-stardust-driver__icon">
		<?php
		get_template_part(
			'template-parts/svg/icon-alert',
			$variant
		);
		?>
	</div>
</div>
