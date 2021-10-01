<?php
/**
 * Header
 *
 * @package Stardust
 */

?>
<!DOCTYPE html>
<html lang="en" data-theme="halloween">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />

	<?php wp_head(); ?>
</head>

<body <?php body_class( $class ); ?>>

<header class="site-header">
	<div class="[ site-header__wrapper ] [ wrapper wrapper--large ]">
		<div class="[ site-id ] [ h-card ]">
			<div class="site-id__image">
				<img class="u-photo" src="<?php site_icon_url( 200 ); ?>" alt="Tim Smith Avatar Illustration">
			</div>
			<div class="site-id__info">
				<h1 class="site-name">
					<a class="p-name u-url" rel="me" href="/">
						<?php bloginfo( 'name' ); ?>
					</a>
					<span class="site-pronouns"><?php esc_html_e( 'he/him', 'stardust' ); ?></span>
				</h1>
				<p class="site-bio"><?php bloginfo( 'description' ); ?></p>
			</div>
		</div>

		<nav class="site-nav">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_class'     => 'site-nav__menu',
						'menu_id'        => 'primary-nav',
					)
				);
				?>
		</nav>
	</div>
</header>
