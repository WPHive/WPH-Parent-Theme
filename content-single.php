<?php
/**
 * Template used to display post content on single pages.
 *
 * @package wph
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked into wph_single_post add_action
	 *
	 * @hooked wph_post_header          - 10
	 * @hooked wph_post_meta            - 20
	 * @hooked wph_post_content         - 30
	 * @hooked wph_init_structured_data - 40
	 */
	do_action( 'wph_single_post' );
	?>

</article><!-- #post-## -->
