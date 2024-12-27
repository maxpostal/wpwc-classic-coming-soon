<?php

namespace WPWC\ClassicComingSoon;

use Automattic\Jetpack\Constants;
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
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'public_enqueue_styles' ] );
		add_filter( 'coming-soon_template', [ __CLASS__, 'coming_soon_template' ], 100, 3 );
		add_filter( 'woocommerce_coming_soon_exclude', [ __CLASS__, 'coming_soon_exclude' ] );
	}

	/**
	 * Enqueue public styles.
	 */
	public static function public_enqueue_styles() {

		wp_enqueue_style(
			'wpwc-classic-coming-soon',
			plugin_dir_url( WPWC_CLASSIC_COMING_SOON_FILE ) . 'assets/css/public.css',
			[],
			'1.0.1'
		);
	}

	/**
	 * Load classic coming soon template.
	 */
	public static function coming_soon_template( $template, $type, $templates ): string {

		global $_wp_current_template_content;

		if ( static::$coming_soon_helper->is_site_coming_soon() ) {

			$template = locate_template( 'site-coming-soon.php' );

			return ! empty( $template ) && file_exists( $template ) ? $template : dirname( WPWC_CLASSIC_COMING_SOON_FILE ) . '/templates/site-coming-soon.php';

		} elseif ( static::$coming_soon_helper->is_store_coming_soon() ) {

			$template = locate_template( 'store-coming-soon.php' );
			$template = ! empty( $template ) && file_exists( $template ) ? $template : dirname( WPWC_CLASSIC_COMING_SOON_FILE ) . '/templates/store-coming-soon.php';

			$WC_version = Constants::get_constant( 'WC_VERSION' );

			if ( isset( $WC_version ) && version_compare( $WC_version, '9.5', '>=' ) ) {

				$page_ID = apply_filters( 'wpwc_classic_coming_soon_store_only_content_id', null );
				$post    = get_post( $page_ID );

				if ( is_null( $page_ID ) || empty( $post ) ) {
					return $template;
				}

				$_wp_current_template_content = apply_filters( 'the_content', $post->post_content );
			}

			return $template;

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
