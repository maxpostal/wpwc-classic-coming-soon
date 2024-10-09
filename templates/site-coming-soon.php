<?php defined( 'ABSPATH' ) || exit; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php esc_html_e( 'Shop is closed', 'wpwc-classic-coming-soon' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="closed-shop closed-shop_type_fullscreen">
    <h1 class="closed-shop__heading wp-block_heading">
		<?php esc_html_e( 'Shop is closed', 'wpwc-classic-coming-soon' ); ?>
    </h1>

    <p class="closed-shop__message">
		<?php esc_html_e( 'Shop is temporarily closed due to technical work. We apologize for any inconvenience this may cause and thank you for your understanding and patience.', 'wpwc-classic-coming-soon' ); ?>
    </p>
</div>

<?php wp_footer(); ?>
</body>
</html>