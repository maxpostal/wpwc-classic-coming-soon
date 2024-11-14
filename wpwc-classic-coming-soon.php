<?php
/**
 * Plugin Name: WPWC classic Coming Soon
 * Requires Plugins: woocommerce
 * Plugin URI: https://wpwc.ru
 * Description: Adds a custom WooCommerce Coming Soon page for classic themes.
 * Version: 1.0.1
 * Author: WPWC
 * Author URI: https://profiles.wordpress.org/makspostal/
 * Text Domain: wpwc-classic-coming-soon
 * Domain Path: /languages
 *
 * Requires at least: 6.0
 * Requires PHP: 7.4
 *
 * WC requires at least: 9.1
 * WC tested up to: 9.3
 *
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package WPWC\ClassicComingSoon
 */

namespace WPWC\ClassicComingSoon;

defined( 'ABSPATH' ) || exit;

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Utilities\FeaturesUtil;

final class WPWC_ClassicComingSoon {

	/**
	 * Instance.
	 *
	 * @var WPWC_ClassicComingSoon|null The single instance of the class.
	 */
	private static ?WPWC_ClassicComingSoon $instance = null;

	/**
	 * Instance.
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @return WPWC_ClassicComingSoon An instance of the class.
	 */
	public static function instance(): ?WPWC_ClassicComingSoon {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor.
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 */
	private function __construct() {

		! defined( 'WPWC_CLASSIC_COMING_SOON_FILE' ) && define( 'WPWC_CLASSIC_COMING_SOON_FILE', __FILE__ );

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'woocommerce_loaded', [ $this, 'init' ] );
	}

	/**
	 * Load plugin textdomain.
	 *
	 * @return void
	 */
	public function i18n() {
		load_plugin_textdomain(
			'wpwc-classic-coming-soon',
			false,
			dirname( plugin_basename( WPWC_CLASSIC_COMING_SOON_FILE ) ) . '/languages'
		);
	}

	/**
	 * Initialize.
	 */
	public function init() {

		add_action( 'before_woocommerce_init', function () {
			if ( class_exists( FeaturesUtil::class ) ) {
				FeaturesUtil::declare_compatibility( 'custom_order_tables', WPWC_CLASSIC_COMING_SOON_FILE, true );
			}
		} );

		Frontend::init();
	}
}

WPWC_ClassicComingSoon::instance();