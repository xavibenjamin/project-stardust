<?php
/**
 * Newsletter Bar
 *
 * @package Stardust
 */

$title       = 'Baked and Pixelated';
$description = 'Subscribe to my queer-monthly newsletter with what I’m working on, music I’m listening to, and interesting things I find around the web.';

if ( is_active_sidebar( 'newsletter-bar-widget-area' ) ) : ?>
<div id="js-newsletter-bar" class="newsletter-bar">
	<div class="newsletter-bar__wave">
		<?php get_template_part( 'template-parts/svg/svg', 'wave' ); ?>
	</div>
	<div class="newsletter-bar__inner">
		<div class="wrapper wrapper--large">
			<div class="newsletter-bar__body">
				<button
					id="js-newsletter-bar-close"
					class="newsletter-bar__close"
				>
					<?php get_template_part( 'template-parts/svg/icon', 'cancel' ); ?>
				</button>

				<div class="newsletter-bar__text">
					<h3 class="newsletter-bar__title">
						<?php echo esc_html( $title ); ?>
					</h3>
					<p class="newsletter-bar__description">
						<?php echo esc_html( $description ); ?>
					</p>
				</div>

				<div class="newsletter-bar__form">
					<?php dynamic_sidebar( 'newsletter-bar-widget-area' ); ?>
				</div>
			</div>
		</div>

	</div>
</div>
<?php endif; ?>
