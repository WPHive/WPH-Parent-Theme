<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wph
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php
	do_action( 'wph_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php wph_header_styles(); ?>">
		<div class="row">

			<?php
			/**
			 * Functions hooked into wph_header action
			 *
			 * @hooked wph_skip_links                       - 0
			 * @hooked wph_social_icons                     - 10
			 * @hooked wph_site_branding                    - 20
			 * @hooked wph_secondary_navigation             - 30
			 * @hooked wph_product_search                   - 40
			 * @hooked wph_primary_navigation_wrapper       - 42
			 * @hooked wph_primary_navigation               - 50
			 * @hooked wph_header_cart                      - 60
			 * @hooked wph_primary_navigation_wrapper_close - 68
			 */
			do_action( 'wph_header' ); ?>

		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to wph_before_content
	 *
	 * @hooked wph_header_widget_region - 10
	 */
	do_action( 'wph_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="row">

		<?php
		/**
		 * Functions hooked in to wph_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'wph_content_top' );
