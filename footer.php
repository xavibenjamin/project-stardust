<?php
/**
 * Footer
 *
 * @package Stardust
 */

?>
<footer class="site-footer">
	<div class="footer-logo">
		<?php
		get_template_part(
			'template-parts/svg/icon-smith'
		);
		?>
	</div>
</footer>
<?php
if ( ! is_page( 'links' ) ) {
	get_template_part( 'template-parts/newsletter-bar' );
}

wp_footer();
?>
</body>
</html>
