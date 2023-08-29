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
                    <a class="home-title__button" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">COMPRA AHORA</a>
                </div>
            </div>
        </div>
        <div class="top-products">
            <div class="top-products__title">MÁS VISTOS.</div>
            <div class="top-products-container">
                <div>
                    <?php
                        $product_id = 110786;
                        $product = wc_get_product($product_id);
                    ?>
                    <a class="top-products-container__item" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
                        <div class="product-image">
                            <?php echo $product->get_image(); ?>
                        </div>
                        <div class="product-details">
                            <h2 class="product-title"><?php echo $product->get_name(); ?></h2>
                            <p class="product-price"><?php echo $product->get_price_html(); ?></p>
                        </div>
                    </a>
                </div>
                <div >
                    <?php
                        $product_id = 156632;
                        $product = wc_get_product($product_id);
                    ?>
                    <a class="top-products-container__item" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
                        <div class="product-image">
                            <?php echo $product->get_image(); ?>
                        </div>
                        <div class="product-details">
                            <h2 class="product-title"><?php echo $product->get_name(); ?></h2>
                            <p class="product-price"><?php echo $product->get_price_html(); ?></p>
                        </div>
                    </a>

                </div>
                <div>
                    <?php
                        $product_id = 113375;
                        $product = wc_get_product($product_id);
                    ?>
                    <a class="top-products-container__item" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
                        <div class="product-image">
                            <?php echo $product->get_image(); ?>
                        </div>
                        <div class="product-details">
                            <h2 class="product-title"><?php echo $product->get_name(); ?></h2>
                            <p class="product-price"><?php echo $product->get_price_html(); ?></p>
                        </div>
                    </a>
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
            <div class="enterate__container">
                <div class="enterate__container__item" >
                    <picture class="enterate__container__item__picture">
                        <img src="<?php echo get_template_directory_uri() ?>/src/assets/BANNER_ANC.png" alt="skkullcandy_enterate_1"
                            class="enterate__container__item__picture__image">
                    </picture>
                    <div class="enterate__container__info">
                        <div class="enterate__container__item__title">Skullcandy ANC</div>
                        <div class="enterate__container__item__subtitle">Conoce nuestros productos con cancelación de ruido para todo momento y lugar.</div>
                        <a class="enterate__container__item__button" href="https://skullcandy.com.pe/ancs/">Entérate más</a>
                    </div>
                </div>

                <div class="enterate__container__item">
                    <picture class="enterate__container__item__picture">
                        <img src="<?php echo get_template_directory_uri() ?>/src/assets/ENVIOS_GRATIS_CROP.png" alt="skullcandy_enterate_2"
                            class="enterate__container__item__picture__image">
                    </picture>
                    <div class="enterate__container__info">
                        <div class="enterate__container__item__title">¡Envios gratis!</div>
                        <div class="enterate__container__item__subtitle">Compra tus audífonos o packs y te lo envíamos gratis, sin monto mínimo.</div>
                        <a class="enterate__container__item__button" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">Entérate más</a>
                    </div>
                </div>

                <div class="enterate__container__item">
                    <picture class="enterate__container__item__picture">
                        <img src="<?php echo get_template_directory_uri() ?>/src/assets/VOLKSXSKDY.png" alt="skullcandy_enterate_3"
                            class="enterate__container__item__picture__image">
                    </picture>
                    <div class="enterate__container__info">
                        <div class="enterate__container__item__title">Skullcandy x Volkswagen</div>
                        <div class="enterate__container__item__subtitle">Conoce más sobre nuevo el Volkswagen Polo y llévate un pack Skullcandy.</div>
                        <a class="enterate__container__item__button" href="https://www.volkswagen.com.pe/es/modelos/polo.html">Entérate más</a>
                    </div>
                </div>

            </div>
        </div>

    </div>



    <a href="https://www.wa.link/xfavry/" id="fixedbutton">
        <img class="fixedbutton__img" src="<?php echo get_template_directory_uri() ?>/src/assets/SKDY_LOGO_CHAT.png" >
        <p class="fixedbutton__text">DALE VOZ A TUS PREGUNTAS!!</p>
    </a>

<?php get_footer();
