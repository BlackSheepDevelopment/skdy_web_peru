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
            <div class="home-picture" id="skullcandy-peru-container">
                <picture>
                    <source srcset="<?php echo get_template_directory_uri() ?>/src/assets/MAIN_BANNER_WEB_DESK.png"
                            media="(min-width: 768px)"/>
                    <img src="<?php echo get_template_directory_uri() ?>/src/assets/MAIN_BANNER_WEB_MOV.png" alt="Home Grid v2"
                        id="skullcandy-homeimage" class="home-grid__picture">
                </picture>
            </div>

            <div class="home-info">
                <p class="home-title">SINTONIZA</p>
                <p class="home-title">CADA MOMENTO.</p>
                <p class="home-title home-title--bold">VIVE LA MÚSICA</p>
                <img class="home-title__image" src="<?php echo get_template_directory_uri() ?>/src/assets/FEEL_SKULLCANDY_WHITE.png"/>
                <div>
                    <button class="home-title__button">COMPRA AHORA</button>
                </div>
            </div>
        </div>
        <div class="top-products">
            <div class="top-products__title">Más vendidos.</div>
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
                <div class="top-products-container__item">
                    <?php
                        $product_id = 156632;
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
                <div class="top-products-container__item">
                    <?php
                        $product_id = 113375;
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
        <div class="categories">
            <div  class="top-products__title">CATEGORÍAS.</div>
            <div class="categories-additionals">
                <button class="categories-additionals__button categories-additionals__button--ofertas">OFERTAS</button>
                <button class="categories-additionals__button categories-additionals__button--packs">PACKS</button>
            </div>
            <div class="categories-generals">
                <button class="categories-generals__button categories-generals__button--headphones">HEADPHONES</button>
                <button class="categories-generals__button categories-generals__button--bluetooth">BLUETOOTH</button>
                <button class="categories-generals__button categories-generals__button--tw">TRUE WIRELESS</button>
            </div>
        </div>
        <div class="enterate">
            <div  class="top-products__title">ENTÉRATE.</div>
        </div>

        <div class="social">
            <div  class="top-products__title">COMUNIDAD.</div>
        </div>
    </div>



    <a href="https://www.wa.link/xfavry/" id="fixedbutton">
        <img class="fixedbutton__img" src="<?php echo get_template_directory_uri() ?>/src/assets/SKDY_LOGO_CHAT.png" >
        <p class="fixedbutton__text">DALE VOZ A TUS PREGUNTAS!!</p>
    </a>

<?php get_footer();
