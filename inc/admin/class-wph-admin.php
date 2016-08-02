<?php
/**
 * wph Admin Class
 *
 * @author   WP Hive
 * @package  wph
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'wph_Admin' ) ) :
	/**
	 * The wph admin class
	 */
	class wph_Admin {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'admin_menu', 				array( $this, 'welcome_register_menu' ) );
			add_action( 'load-themes.php',			array( $this, 'activation_admin_notice' ) );
			add_action( 'admin_enqueue_scripts', 	array( $this, 'welcome_style' ) );

			add_action( 'wph_welcome', 		array( $this, 'welcome_intro' ), 			10 );
			add_action( 'wph_welcome', 		array( $this, 'welcome_enhance' ), 			20 );
			add_action( 'wph_welcome', 		array( $this, 'welcome_contribute' ), 		30 );
		}

		/**
		 * Adds an admin notice upon successful activation.
		 *
		 * @since 1.0.3
		 */
		public function activation_admin_notice() {
			global $pagenow;

			if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { // Input var okay.
				add_action( 'admin_notices', array( $this, 'wph_welcome_admin_notice' ), 99 );
			}
		}

		/**
		 * Display an admin notice linking to the welcome screen
		 *
		 * @since 1.0.3
		 */
		public function wph_welcome_admin_notice() {
			?>
				<div class="updated notice is-dismissible">
					<p><?php echo sprintf( esc_html__( 'Thanks for choosing wph! You can read hints and tips on how get the most out of your new theme on the %swelcome screen%s.', 'wph' ), '<a href="' . esc_url( admin_url( 'themes.php?page=wph-welcome' ) ) . '">', '</a>' ); ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=wph-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php esc_attr_e( 'Get started with wph', 'wph' ); ?></a></p>
				</div>
			<?php
		}

		/**
		 * Load welcome screen css
		 *
		 * @param string $hook_suffix the current page hook suffix.
		 * @return void
		 * @since  1.4.4
		 */
		public function welcome_style( $hook_suffix ) {
			global $wph_version;

			if ( 'appearance_page_wph-welcome' == $hook_suffix ) {
				wp_enqueue_style( 'wph-welcome-screen', get_template_directory_uri() . '/assets/sass/admin/welcome-screen/welcome.css', $wph_version );
				wp_style_add_data( 'wph-welcome-screen', 'rtl', 'replace' );
				wp_enqueue_style( 'thickbox' );
				wp_enqueue_script( 'thickbox' );
				wp_enqueue_script( 'masonry' );
				wp_enqueue_script( 'wph-welcome-screen-script', get_template_directory_uri() . '/assets/js/admin/welcome-screen/welcome.min.js', array( 'masonry' ), $wph_version );
			}
		}

		/**
		 * Creates the dashboard page
		 *
		 * @see  add_theme_page()
		 * @since 1.0.0
		 */
		public function welcome_register_menu() {
			add_theme_page( 'wph', 'wph', 'activate_plugins', 'wph-welcome', array( $this, 'wph_welcome_screen' ) );
		}

		/**
		 * The welcome screen
		 *
		 * @since 1.0.0
		 */
		public function wph_welcome_screen() {
			require_once( ABSPATH . 'wp-load.php' );
			require_once( ABSPATH . 'wp-admin/admin.php' );
			require_once( ABSPATH . 'wp-admin/admin-header.php' );
			?>
			<div class="wrap about-wrap">

				<?php
				/**
				 * Functions hooked into wph_welcome action
				 *
				 * @hooked welcome_intro      - 10
				 * @hooked welcome_enhance    - 20
				 * @hooked welcome_contribute - 30
				 */
				do_action( 'wph_welcome' ); ?>

			</div>
			<?php
		}

		/**
		 * Welcome screen intro
		 *
		 * @since 1.0.0
		 */
		public function welcome_intro() {
			require_once( get_template_directory() . '/inc/admin/welcome-screen/component-intro.php' );
		}


		/**
		 * Welcome screen enhance section
		 *
		 * @since 1.5.2
		 */
		public function welcome_enhance() {
			require_once( get_template_directory() . '/inc/admin/welcome-screen/component-enhance.php' );
		}

		/**
		 * Welcome screen contribute section
		 *
		 * @since 1.5.2
		 */
		public function welcome_contribute() {
			require_once( get_template_directory() . '/inc/admin/welcome-screen/component-contribute.php' );
		}

		/**
		 * Get product data from json
		 *
		 * @param  string $url       URL to the json file.
		 * @param  string $transient Name the transient.
		 * @return [type]            [description]
		 */
		public function get_wph_product_data( $url, $transient ) {
			$raw_products = wp_safe_remote_get( $url );
			$products     = json_decode( wp_remote_retrieve_body( $raw_products ) );

			if ( ! empty( $products ) ) {
				set_transient( $transient, $products, DAY_IN_SECONDS );
			}

			return $products;
		}
	}

endif;

return new wph_Admin();
