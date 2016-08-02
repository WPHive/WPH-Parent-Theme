<?php
/**
 * Template used to display post content.
 *
 * @package wph
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to wph_loop_post action.
	 *
	 * @hooked wph_post_header          - 10
	 * @hooked wph_post_meta            - 20
	 * @hooked wph_post_content         - 30
	 * @hooked wph_init_structured_data - 40
	 */
	do_action( 'wph_loop_post' );
	?>

</article><!-- #post-## -->
