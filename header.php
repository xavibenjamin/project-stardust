<?php
/**
 * Header
 *
 * @package Stardust
 */

?>
<!DOCTYPE html>
<html lang="en" data-theme="primrose">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />

	<?php wp_head(); ?>
</head>

<body <?php body_class( $class ); ?>>

<header class="site-header">
	<div class="[ site-header__wrapper ] [ wrapper ]">
		<?php
			get_template_part( 'template-parts/header/site', 'id' );
			get_template_part( 'template-parts/header/site', 'navigation' );
		?>
	</div>
</header>
