<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wph
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'wph_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">

			<?php
			/**
			 * Functions hooked in to wph_footer action
			 *
			 * @hooked wph_footer_widgets - 10
			 * @hooked wph_credit         - 20
			 */
			do_action( 'wph_footer' ); ?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'wph_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
