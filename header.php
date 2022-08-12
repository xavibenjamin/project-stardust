<?php
/**
 * Header
 *
 * @package Stardust
 */

$color_theme = get_option( 'sd_theme_color' ) ?? 'bright-pixels';
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo esc_attr( $color_theme ); ?>">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />

	<!-- Deployed using GitHub Actions -->
	<?php wp_head(); ?>
</head>

<body <?php body_class('grid'); ?>>

<header class="site-header">
	<div class="site-header__wrapper">
		<?php
			get_template_part( 'template-parts/header/site', 'id' );
			get_template_part( 'template-parts/header/site', 'nav' );
		?>
	</div>
</header>
