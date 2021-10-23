<?php
/**
 * Site ID Partial
 * - includes logo, name, pronouns and my short bio
 *
 * @package Stardust
 */

?>

<div class="[ site-id <?php if ( ! is_home() ) { echo esc_attr( 'site-id--compact ' ); } ?>] [ h-card ]">
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
		<p class="site-username"><?php echo esc_html( '@smithtimmytim' ); ?></p>
		<?php if ( is_home() ) : ?>
			<p class="site-bio"><?php bloginfo( 'description' ); ?></p>
		<?php endif; ?>
	</div>
</div>
