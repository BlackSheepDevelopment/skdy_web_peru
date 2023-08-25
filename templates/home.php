<?php /* Template Name: Inicio */

set_query_var( 'ENTRY', 'home' );

get_header();

$shop_notice = get_field( 'shop_notice', 'general' );
if ( $shop_notice['show'] && $shop_notice['text'] ): ?>
    <div class="shop-notice">
        <a <?php if ( $shop_notice['link'] ): ?>href="<?php echo $shop_notice['link'] ?>" <?php endif; ?>>
			<?php echo $shop_notice['text'] ?>
        </a>
    </div>
<?php endif; ?>
    <div class="main-container">
        <div id="home-grid">
            <div class="home-picture">
                <picture>
                    <source srcset="<?php echo get_template_directory_uri() ?>/src/assets/MAIN_BANNER_WEB_DESK.png"
                            media="(min-width: 551px)"/>
                    <img src="<?php echo get_template_directory_uri() ?>/src/assets/MAIN_BANNER_WEB_MOV.png" alt="Home Grid v2"
                        class="home-grid__picture">
                </picture>
            </div>

            <div class="home-info">
                <p class="home-title">SINTONIZA</p>
                <p class="home-title">CADA MOMENTO</p>
                <p class="home-title home-title--bold">CON LA FUNCIÓN PERFECTA</p>
                <img class="home-title__image" src="<?php echo get_template_directory_uri() ?>/src/assets/FEEL_SKULLCANDY_WHITE.png"/>
                <div>
                    <button class="home-title__button">COMPRA AHORA</button>
                </div>
            </div>
        </div>
        <div class="top-products">
            <div class="top-products__title">MÁS VENDIDOS</div>
            <div class="top-products-container">
                <div class="top-products-container__item">
                <?php
                    $product_id = 110786;
                    $product = wc_get_product($product_id);
                ?>
                    <div class="product-image">
                        <?php echo $product->get_image(); ?>
                    </div>
                    <div class="product-details">
                        <h2 class="product-title"><?php echo $product->get_name(); ?></h2>
                        <p class="product-price"><?php echo $product->get_price_html(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
