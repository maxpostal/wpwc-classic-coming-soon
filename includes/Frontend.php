<?php

namespace WPWC\ClassicComingSoon;

use Automattic\WooCommerce\Internal\ComingSoon\ComingSoonHelper;

defined( 'ABSPATH' ) || exit;

class Frontend {

	/**
	 * Coming soon helper.
	 *
	 * @var null|ComingSoonHelper
	 */
	private static ?ComingSoonHelper $coming_soon_helper = null;

	/**
	 * Initialization.
	 */
	public static function init() {
		static::$coming_soon_helper = new ComingSoonHelper();
		add_filter( 'coming-soon_template', [ __CLASS__, 'coming_soon_template' ], 100, 3 );
		add_filter( 'woocommerce_coming_soon_exclude', [ __CLASS__, 'coming_soon_exclude' ] );
	}

	/**
	 * Load classic coming soon template.
	 */
	public static function coming_soon_template( $template, $type, $templates ): string {

		if ( static::$coming_soon_helper->is_site_coming_soon() ) {

			$template = locate_template( 'site-coming-soon.php' );

			return ! empty( $template ) && file_exists( $template ) ? $template : dirname( WPWC_CLASSIC_COMING_SOON_FILE ) . '/templates/site-coming-soon.php';

		} elseif ( static::$coming_soon_helper->is_store_coming_soon() ) {

			$template = locate_template( 'store-coming-soon.php' );

			return ! empty( $template ) && file_exists( $template ) ? $template : dirname( WPWC_CLASSIC_COMING_SOON_FILE ) . '/templates/store-coming-soon.php';

		} else {
			return '';
		}
	}

	/**
	 * Filter coming soon pages.
	 */
	public static function coming_soon_exclude( $is_excluded ): bool {
		return static::$coming_soon_helper->is_store_coming_soon() && ! ( is_woocommerce() || is_cart() || is_checkout() );
	}
}
