<?php defined( 'ABSPATH' ) || exit; ?>

<div class="closed-shop closed-shop_type_block">
    <h1 class="closed-shop__heading wp-block_heading">
		<?php esc_html_e( 'Shop is closed', 'wpwc-classic-coming-soon' ); ?>
    </h1>

    <p class="closed-shop__message">
		<?php esc_html_e( 'Shop is temporarily closed due to technical work. We apologize for any inconvenience this may cause and thank you for your understanding and patience.', 'wpwc-classic-coming-soon' ); ?>
    </p>

	<?php if ( ! is_front_page() ) { ?>
        <a href="<?php echo esc_url( home_url() ); ?>" class="closed-shop__button wp-block-button__link">
			<?php esc_html_e( 'Return to home', 'wpwc-classic-coming-soon' ); ?>
        </a>
	<?php } ?>
</div>