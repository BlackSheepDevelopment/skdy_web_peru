<!doctype html>
<html lang="<?php bloginfo( 'language' ) ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php
	$entry = get_query_var( 'ENTRY' );
	load_assets( [ 'main', $entry ] );
	wp_head();
	?>
</head>
<body <?php body_class( 'woocommerce' ); ?>>
<header id="main-header">
    <div class="container">
        <div class="menu-toggle">
            <div class="icon"></div>
        </div>
        <div class="left">
            <a href="<?php bloginfo( 'url' ); ?>" class="logo">
				<?php get_template_part( 'content/nav', 'logo' ); ?>
            </a>
            <ul class="menu">
                <li data-menu="mega-menu-catalog">
                    <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
                        <span><?php echo get_the_title( wc_get_page_id( 'shop' ) ) ?></span>
                    </a>
                </li>
                <li>
                    <a href="https://skullcandy.com.pe/shop/ofertas/">
                        <span>SKULLCYBER</span>
                    </a>
                </li>
                <li data-menu="mega-menu-inside">
                    <a href="#">
                        <span><?php _e( 'Inside Skullcandy', 'skullcandy' ) ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="right">
            <ul class="menu">
                <!-- <li class="mega-menu-item">
                    <a href="https://dev.skullcandy.com.pe/retailers/">Tiendas Pequeñas</a>
                </li> -->
                <li class="mega-menu-item">
                    <a href="https://skullcandy.com.pe/mayoristas/">Mayoristas</a>
                </li>
                <li data-menu="mega-menu-support">
                    <a href="#"><?php _e( 'Soporte', 'skullcandy' ) ?></a>
                </li>
            </ul>
            <div class="nav-icon">
                <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/flag.png' ?>" alt="Perú" width="26">
            </div>
            <a href="<?php echo get_account_url(); ?>" class="nav-icon">
				<?php get_template_part( 'content/nav', 'icon-account' ); ?>
            </a>
            <a href="#" class="nav-icon nav-search">
				<?php get_template_part( 'content/nav', 'icon-search' ); ?>
            </a>
            <a href="<?php echo esc_url( wc_get_cart_url() ) ?>" class="nav-icon nav-cart">
				<?php get_template_part( 'content/nav', 'icon-cart' );
				if ( WC()->cart->get_cart_contents_count() > 0 ): ?>
                    <span class="quantity"></span>
				<?php endif; ?>
            </a>
        </div>
    </div>
</header>
<?php get_template_part( 'content/nav', 'megamenu' );
if ( is_search() ): ?>
<div class="search-header"></div>
<?php endif;
