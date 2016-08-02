<?php
/**
 * wph hooks
 *
 * @package wph
 */

/**
 * General
 *
 * @see  wph_header_widget_region()
 * @see  wph_get_sidebar()
 */
add_action( 'wph_before_content', 'wph_header_widget_region', 10 );
add_action( 'wph_sidebar',        'wph_get_sidebar',          10 );

/**
 * Header
 *
 * @see  wph_skip_links()
 * @see  wph_secondary_navigation()
 * @see  wph_site_branding()
 * @see  wph_primary_navigation()
 */
add_action( 'wph_header', 'wph_skip_links',                       0 );
add_action( 'wph_header', 'wph_site_branding',                    20 );
add_action( 'wph_header', 'wph_secondary_navigation',             30 );
add_action( 'wph_header', 'wph_primary_navigation_wrapper',       42 );
add_action( 'wph_header', 'wph_primary_navigation',               50 );
add_action( 'wph_header', 'wph_primary_navigation_wrapper_close', 68 );

/**
 * Footer
 *
 * @see  wph_footer_widgets()
 * @see  wph_credit()
 */
add_action( 'wph_footer', 'wph_footer_widgets', 10 );
add_action( 'wph_footer', 'wph_credit',         20 );

/**
 * Homepage
 *
 * @see  wph_homepage_content()
 * @see  wph_product_categories()
 * @see  wph_recent_products()
 * @see  wph_featured_products()
 * @see  wph_popular_products()
 * @see  wph_on_sale_products()
 * @see  wph_best_selling_products()
 */
add_action( 'homepage', 'wph_homepage_content',      10 );
add_action( 'homepage', 'wph_product_categories',    20 );
add_action( 'homepage', 'wph_recent_products',       30 );
add_action( 'homepage', 'wph_featured_products',     40 );
add_action( 'homepage', 'wph_popular_products',      50 );
add_action( 'homepage', 'wph_on_sale_products',      60 );
add_action( 'homepage', 'wph_best_selling_products', 70 );

/**
 * Posts
 *
 * @see  wph_post_header()
 * @see  wph_post_meta()
 * @see  wph_post_content()
 * @see  wph_init_structured_data()
 * @see  wph_paging_nav()
 * @see  wph_single_post_header()
 * @see  wph_post_nav()
 * @see  wph_display_comments()
 */
add_action( 'wph_loop_post',         'wph_post_header',          10 );
add_action( 'wph_loop_post',         'wph_post_meta',            20 );
add_action( 'wph_loop_post',         'wph_post_content',         30 );
add_action( 'wph_loop_post',         'wph_init_structured_data', 40 );
add_action( 'wph_loop_after',        'wph_paging_nav',           10 );
add_action( 'wph_single_post',       'wph_post_header',          10 );
add_action( 'wph_single_post',       'wph_post_meta',            20 );
add_action( 'wph_single_post',       'wph_post_content',         30 );
add_action( 'wph_single_post',       'wph_init_structured_data', 40 );
add_action( 'wph_single_post_after', 'wph_post_nav',             10 );
add_action( 'wph_single_post_after', 'wph_display_comments',     20 );

/**
 * Pages
 *
 * @see  wph_page_header()
 * @see  wph_page_content()
 * @see  wph_init_structured_data()
 * @see  wph_display_comments()
 */
add_action( 'wph_page',       'wph_page_header',          10 );
add_action( 'wph_page',       'wph_page_content',         20 );
add_action( 'wph_page',       'wph_init_structured_data', 30 );
add_action( 'wph_page_after', 'wph_display_comments',     10 );
