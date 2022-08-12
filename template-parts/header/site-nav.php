<?php
/**
 * Site Navigation Partial
 * - includes menu toggle and menu
 *
 * @package Stardust
 */

?>

<div class="site-nav">
	<button
		id="js-site-navigation-toggle"
		class="site-nav__toggle"
		aria-haspopup="true"
		aria-controls="js-site-nav-menu"
		aria-expanded="false"
		aria-label="Toggle Main Navigation"
	>
		<?php
			get_template_part(
				'template-parts/svg/icon',
				'menu'
			);
			?>
	</button>

	<nav
		id="js-site-nav-menu"
		class="site-nav__menu"
		aria-hidden="true"
	>
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'site-nav__list',
					'menu_id'        => 'primary-nav',
				)
			);
			?>
	</nav>
	<div id="js-site-nav-scrim" class="site-nav__scrim"></div>
</div>

