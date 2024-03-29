<?php
/**
 * Site ID Partial
 * - includes logo, name, pronouns and my short bio
 *
 * @package Stardust
 */

use function Stardust\Utility\widont;

$site_pronouns = get_option( 'sd_site_pronouns' ) ?? false;
$site_bio      = widont( get_bloginfo( 'description' ) );
$base_classes  = [
	'site-id',
	'h-card',
];

if ( ! is_home() ) {
	array_push( $base_classes, 'site-id--compact' );
}

$partial_classes = join( ' ', $base_classes );
?>

<div class="<?php echo esc_attr( $partial_classes ); ?>">
	<div class="site-id__image">
		<img class="u-photo" src="<?php site_icon_url( 200 ); ?>" alt="Xavi Benjamín Avatar Illustration">
	</div>
	<div class="site-id__info">
		<h1 class="site-name">
			<a class="p-name u-url" rel="me" href="<?php echo esc_url( site_url() ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
			<?php if ( ! empty( $site_pronouns ) ) : ?>
				<span class="site-pronouns"><?php echo esc_html( $site_pronouns ); ?></span>
			<?php endif; ?>
		</h1>
		<p class="site-username"><?php echo esc_html( '@elxaviben' ); ?></p>
		<p class="site-bio"><?php echo esc_html( $site_bio ); ?></p>
	</div>
</div>
