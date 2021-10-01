<?php
/**
 * Post Syndication Links
 *
 * @package Stardust
 */

use function Stardust\Utility\syndication_allowed_html_svg;

$html         = get_syndication_links();
$allowed_html = syndication_allowed_html_svg();

if ( get_syndication_links() ) : ?>
	<div class="entry__syndication">
		<?php echo wp_kses( $html, $allowed_html ); ?>
	</div>
<?php endif; ?>
