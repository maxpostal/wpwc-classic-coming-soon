<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php esc_html_e( 'Shop is closed', 'wpwc-classic-coming-soon' ); ?></title>
    <style>
        .closed-shop-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .closed-shop_message {
            max-width: 600px;
            margin: 0 0 40px 0;
        }
    </style>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="closed-shop-container">
    <h1 class="wp-block_heading">
        <?php esc_html_e( 'Shop is closed', 'wpwc-classic-coming-soon' ); ?>
    </h1>

    <p class="closed-shop_message">
	    <?php esc_html_e( 'Shop is temporarily closed due to technical work. We apologize for any inconvenience this may cause and thank you for your understanding and patience.', 'wpwc-classic-coming-soon' ); ?>
    </p>
</div>

</body>
</html>