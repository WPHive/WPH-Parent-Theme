<?php
/**
 * wph WooCommerce hooks
 *
 * @package wph
 */

/**
 * Styles
 *
 * @see  wph_woocommerce_scripts()
 */

/**
 * Layout
 *
 * @see  wph_before_content()
 * @see  wph_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  wph_shop_messages()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb',                 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper',     10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar',                10 );
remove_action( 'woocommerce_after_shop_loop',     'woocommerce_pagination',                 10 );
remove_action( 'woocommerce_before_shop_loop',    'woocommerce_result_count',               20 );
remove_action( 'woocommerce_before_shop_loop',    'woocommerce_catalog_ordering',           30 );
add_action( 'woocommerce_before_main_content',    'wph_before_content',              10 );
add_action( 'woocommerce_after_main_content',     'wph_after_content',               10 );
add_action( 'wph_content_top',             'wph_shop_messages',               15 );
add_action( 'wph_content_top',             'woocommerce_breadcrumb',                 10 );

add_action( 'woocommerce_after_shop_loop',        'wph_sorting_wrapper',             9 );
add_action( 'woocommerce_after_shop_loop',        'woocommerce_catalog_ordering',           10 );
add_action( 'woocommerce_after_shop_loop',        'woocommerce_result_count',               20 );
add_action( 'woocommerce_after_shop_loop',        'woocommerce_pagination',                 30 );
add_action( 'woocommerce_after_shop_loop',        'wph_sorting_wrapper_close',       31 );

add_action( 'woocommerce_before_shop_loop',       'wph_sorting_wrapper',             9 );
add_action( 'woocommerce_before_shop_loop',       'woocommerce_catalog_ordering',           10 );
add_action( 'woocommerce_before_shop_loop',       'woocommerce_result_count',               20 );
add_action( 'woocommerce_before_shop_loop',       'wph_woocommerce_pagination',      30 );
add_action( 'woocommerce_before_shop_loop',       'wph_sorting_wrapper_close',       31 );

add_action( 'wph_footer',                  'wph_handheld_footer_bar',         999 );

/**
 * Products
 *
 * @see  wph_upsell_display()
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display',               15 );
add_action( 'woocommerce_after_single_product_summary',    'wph_upsell_display',                15 );
remove_action( 'woocommerce_before_shop_loop_item_title',  'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_after_shop_loop_item_title',      'woocommerce_show_product_loop_sale_flash', 6 );

/**
 * Header
 *
 * @see  wph_product_search()
 * @see  wph_header_cart()
 */
add_action( 'wph_header', 'wph_product_search', 40 );
add_action( 'wph_header', 'wph_header_cart',    60 );

/**
 * Structured Data
 *
 * @see wph_woocommerce_init_structured_data()
 */
add_action( 'woocommerce_before_shop_loop_item', 'wph_woocommerce_init_structured_data' );

if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'wph_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'wph_cart_link_fragment' );
}
