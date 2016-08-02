<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wph
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to wph_page add_action
	 *
	 * @hooked wph_page_header          - 10
	 * @hooked wph_page_content         - 20
	 * @hooked wph_init_structured_data - 30
	 */
	do_action( 'wph_page' );
	?>
</article><!-- #post-## -->
