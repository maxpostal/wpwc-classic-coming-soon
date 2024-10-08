<style>
    .closed-shop-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 30px 0 40px;
        text-align: center;
    }

    .closed-shop_message {
        max-width: 600px;
        margin: 0 0 40px 0;
    }
</style>

<div class="closed-shop-container">
    <h1 class="wp-block_heading">
		<?php esc_html_e( 'Shop is closed', 'wpwc-classic-coming-soon' ); ?>
    </h1>

    <p class="closed-shop_message">
		<?php esc_html_e( 'Shop is temporarily closed due to technical work. We apologize for any inconvenience this may cause and thank you for your understanding and patience.', 'wpwc-classic-coming-soon' ); ?>
    </p>

    <a href="<?php echo esc_url( home_url() ); ?>" class="wp-block-button__link">
		<?php esc_html_e( 'Return to home', 'wpwc-classic-coming-soon' ); ?>
    </a>
</div>