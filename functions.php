<?php
/**
 * wph engine room
 *
 * @package wph
 */

/**
 * Assign the wph version to a var
 */
$theme              = wp_get_theme( 'wph' );
$wph_version = $theme['Version'];

/**
 * Initialize all the things.
 */
require 'inc/class-wph.php';
require 'inc/jetpack/class-wph-jetpack.php';
require 'inc/customizer/class-wph-customizer.php';

require 'inc/wph-functions.php';
require 'inc/wph-template-hooks.php';
require 'inc/wph-template-functions.php';

if ( is_woocommerce_activated() ) {
	require 'inc/woocommerce/class-wph-woocommerce.php';
	require 'inc/woocommerce/wph-woocommerce-template-hooks.php';
	require 'inc/woocommerce/wph-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	require 'inc/admin/class-wph-admin.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/WP Hive/theme-customisations
 */
