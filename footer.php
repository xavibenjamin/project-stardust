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

<?php wp_footer(); ?>

<script aync src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>
<script>
	twemoji.parse(document.body, {
		folder:'svg',
		ext:'.svg'
	});
</script>
</body>
</html>
