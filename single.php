<?php
/**
 * The template for displaying all single posts.
 *
 * @package wph
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post();

			do_action( 'wph_single_post_before' );

			get_template_part( 'content', 'single' );

			/**
			 * Functions hooked in to wph_single_post_after action
			 *
			 * @hooked wph_post_nav         - 10
			 * @hooked wph_display_comments - 20
			 */
			do_action( 'wph_single_post_after' );

		endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'wph_sidebar' );
get_footer();
