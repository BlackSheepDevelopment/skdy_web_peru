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

        <div class="home-grid__social">
            <a class="home-grid__social__item" href="https://www.facebook.com/skullcandy.pe/?locale=es_LA" target="_blank"> 
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 24 24" class="icon-social__fb">
                    <path d="M12,2C6.477,2,2,6.477,2,12c0,5.013,3.693,9.153,8.505,9.876V14.65H8.031v-2.629h2.474v-1.749 c0-2.896,1.411-4.167,3.818-4.167c1.153,0,1.762,0.085,2.051,0.124v2.294h-1.642c-1.022,0-1.379,0.969-1.379,2.061v1.437h2.995 l-0.406,2.629h-2.588v7.247C18.235,21.236,22,17.062,22,12C22,6.477,17.523,2,12,2z"></path>
                </svg>
            </a>

            <a class="home-grid__social__item" href="https://www.instagram.com/skullcandyperu/?hl=es-la" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 24 24" class="icon-social__fb">
                    <path d="M 8 3 C 5.239 3 3 5.239 3 8 L 3 16 C 3 18.761 5.239 21 8 21 L 16 21 C 18.761 21 21 18.761 21 16 L 21 8 C 21 5.239 18.761 3 16 3 L 8 3 z M 18 5 C 18.552 5 19 5.448 19 6 C 19 6.552 18.552 7 18 7 C 17.448 7 17 6.552 17 6 C 17 5.448 17.448 5 18 5 z M 12 7 C 14.761 7 17 9.239 17 12 C 17 14.761 14.761 17 12 17 C 9.239 17 7 14.761 7 12 C 7 9.239 9.239 7 12 7 z M 12 9 A 3 3 0 0 0 9 12 A 3 3 0 0 0 12 15 A 3 3 0 0 0 15 12 A 3 3 0 0 0 12 9 z"></path>
                </svg>
            </a>
            <a class="home-grid__social__item" href="https://www.tiktok.com/@skullcandyperu" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 24 24" class="icon-social__fb">
                    <path d="M 6 3 C 4.3550302 3 3 4.3550302 3 6 L 3 18 C 3 19.64497 4.3550302 21 6 21 L 18 21 C 19.64497 21 21 19.64497 21 18 L 21 6 C 21 4.3550302 19.64497 3 18 3 L 6 3 z M 12 7 L 14 7 C 14 8.005 15.471 9 16 9 L 16 11 C 15.395 11 14.668 10.734156 14 10.285156 L 14 14 C 14 15.654 12.654 17 11 17 C 9.346 17 8 15.654 8 14 C 8 12.346 9.346 11 11 11 L 11 13 C 10.448 13 10 13.449 10 14 C 10 14.551 10.448 15 11 15 C 11.552 15 12 14.551 12 14 L 12 7 z"></path>
                </svg>
            </a>
            <!-- <div class="home-grid__social__item home-grid__social__item--name">NEWSLETTER</div> -->
        </div>

        <div id="home-grid">
            <!-- <button class="home-grid__prev">
                <svg class="home-grid__arrow__img" xmlns="http://www.w3.org/2000/svg" width="16" height="64" viewBox="0 0 12 12">
                    <path id="Polygon_2" data-name="Polygon 2" d="M8,0l8,12H0Z" transform="translate(0 16) rotate(-90)"/>
                </svg>

            </button>
            
            <button class="home-grid__next">
                <svg class="home-grid__arrow__img" xmlns="http://www.w3.org/2000/svg" width="16" height="64" viewBox="0 0 12 12">
                    <path id="Polygon_1" data-name="Polygon 1" d="M8,0l8,12H0Z" transform="translate(12) rotate(90)"/>
                </svg>  
            </button> -->

            <div class="home-picture" id="skullcandy-peru-container">               
                <div>
                    <picture class="home-grid__video">
                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/uploads/BANNER_WEB_MOV.jpg' ?>" media="(min-width: 758px)"/>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/BANNER_WEB.jpg' ?>"
                                    alt="mobile-main-banner">
                    </picture>
                    <!-- <picture class="home-grid__video">
                        <video class="home-grid__picture" src="<?php #echo get_stylesheet_directory_uri() . '/uploads/PORTADA_WEB_SKULLWEEK.mp4' ?>" autoplay muted loop playsinline> </video>
                    </picture> -->
                    <!-- <div class="home-info">
                            <p class="home-title home-title--bold">SKULLCANDY</p>
                            <p class="home-title">Siente lo mejor de la música.</p>
                            <img class="home-title__image" src="<?php #echo get_template_directory_uri() ?>/src/assets/FEEL_SKULLCANDY_WHITE.png"/>
                            <div>
                                <a class="home-title__button" href="<?php #echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">Compra ahora</a>
                            </div>
                    </div> -->
                    <div class="home-info">
                        <a class="home-title__button" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">¡Compra ahora!</a>
                    </div>
                </div>

                <!-- <div>
                    <picture class="home-grid__video">
                        <video class="home-grid__picture home-grid__picture--desktop" src="<?php #echo get_template_directory_uri() ?>/src/assets/PORTADA_SMOKIN.mp4" autoplay muted loop playsinline> </video>
                        <video class="home-grid__picture home-grid__picture--mobile" src="<?php #echo get_template_directory_uri() ?>/src/assets/PORTADA_SMOKIN_MOVIL.mp4" autoplay muted loop playsinline> </video>
                    </picture>

                    <div class="home-info">
                            <p class="home-title home-title--bold ">SMOKIN' BUDS</p>
                            <p class="home-title home-title home-title--desktop">Estilo, potencia y calidad.</p>
                            <img class="home-title__image home-title--desktop" src="<?php #echo get_template_directory_uri() ?>/src/assets/FEEL_SKULLCANDY_WHITE.png"/>
                            <div>
                                <a class="home-title__button" href="https://skullcandy.com.pe/producto/smokin-buds-true-wireless-eardbuds/">¡Compralos ya!</a>
                            </div>
                    </div>
                </div> -->

                <!-- <div>
                    <picture class="home-grid__video">
                        <video class="home-grid__picture home-grid__picture--desktop" src="<?php #echo get_template_directory_uri() ?>/src/assets/PORTADA_DIME.mp4" autoplay muted loop playsinline> </video>
                        <video class="home-grid__picture home-grid__picture--mobile" src="<?php #echo get_template_directory_uri() ?>/src/assets/PORTADA_DIME_MOVIL.mp4" autoplay muted loop playsinline> </video>
                    </picture>

                    <div class="home-info">
                            <p class="home-title home-title--bold ">DIME</p>
                            <p class="home-title home-title home-title--desktop">Pequeños y resistentes</p>
                            <img class="home-title__image home-title--desktop" src="<?php #echo get_template_directory_uri() ?>/src/assets/FEEL_SKULLCANDY_WHITE.png"/>
                            <div>
                                <a class="home-title__button" href="https://skullcandy.com.pe/producto/dime-xt-true-wireless/">¡Compralos ya!</a>
                            </div>
                    </div>
                </div> -->
            </div>

            <!-- <section>
                <picture>
                        <source srcset="<?php #echo get_template_directory_uri() ?>/src/assets/SKULLDAYS_MAIN_DESK.png" media="(min-width: 758px)"/>
                        <img src="<?php #echo get_template_directory_uri() ?>/src/assets/SKULLDAYS_MAIN_MOV.png"
                                alt="mobile-main-banner">
                </picture>
                <a class="home-title__button button__banner" href="<?php #echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">¡Conoce más!</a>
            </section>

            <section>
                <img class="home-grid-2__img" src="<?php #echo get_template_directory_uri() ?>/src/assets/SKULLDAYS_2.png"/>
                <a class="button_banner__secondary">
                    <p class="home-title--bold">NUEVO PACK</p>
                    <p>Compra Dime XT + Cassette</p>
                </a>
            </section>

            <section>
                <img class="home-grid-2__img" src="<?php #echo get_template_directory_uri() ?>/src/assets/SKULLDAYS_3.png"/>
                <a class="button_banner__secondary">
                    <p class="home-title--bold">OFERTAS</p>
                    <p>¡Compra ahora! </p>
                    
                </a>
            </section> -->

        </div>
        <div class="shop-features">
            <p class="shop-features__title">Por cada compra en Skullcandy, te garantizamos</p>
            <div class="shop-features__main" >
                <div class="shop-features__container">
                    <svg  width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    <div class="shop-features__container__info">
                        <p class="shop-features__container__info__title">Garantía de 1 año en todos nuestros productos</p>
                    </div>
                </div>
                <div class="shop-features__container">
                    <svg width="30" height="30" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16"> <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/> </svg>
                    <div class="shop-features__container__info">
                        <p class="shop-features__container__info__title">Envíamos el producto a cualquier parte del Perú</p>
                    </div>

                </div>
                <div class="shop-features__container">
                    <svg width="30" height="30" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16"> <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/> <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/> </svg>
                    <div class="shop-features__container__info">
                        <p class="shop-features__container__info__title">Entrega de 1 a 3 días hábiles en Lima Metropolitana y Callao</p>
                    </div>
                    
                </div>
            </div>

        </div>

        <div class="top-products">
            <?php if (have_rows('carrusel')): ?>
                <div class="top-products__title">MÁS VISTOS.</div>
                <div class="top-products-container">
                   <?php while(have_rows('carrusel')): the_row();                   
                            $product_id = get_sub_field('id'); 
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
                            <?php if(get_sub_field('anuncio')): ?>
                                <p class="product-off"><?php echo get_sub_field('anuncio') ?></p>
                            <?php endif; ?>
                        </a>
                    <?php endwhile ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="categories">
            <div  class="top-products__title">CATEGORÍAS.</div>
            <div class="categories-additionals">
                <a href="https://skullcandy.com.pe/shop/?cat=ofertas" class="categories-additionals__button categories-additionals__button--ofertas">OFERTAS</a>
                <a href="https://skullcandy.com.pe/shop/?cat=packs" class="categories-additionals__button categories-additionals__button--packs">PACKS</a>
            </div>
            <div class="categories-generals">
                <a href="https://skullcandy.com.pe/shop/?cat=headphones" class="categories-generals__button categories-generals__button--headphones">HEADPHONES</a>
                <a href="https://skullcandy.com.pe/shop/?cat=bluetooth" class="categories-generals__button categories-generals__button--bluetooth">BLUETOOTH</a>
                <a href="https://skullcandy.com.pe/shop/?cat=true-wireless" class="categories-generals__button categories-generals__button--tw">TRUE WIRELESS</a>
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
                        <img src="<?php echo get_template_directory_uri() ?>/src/assets/BANNER_OFERTAS_CROPPED.png" alt="skullcandy_enterate_2"
                            class="enterate__container__item__picture__image">
                    </picture>
                    <div class="enterate__container__info">
                        <div class="enterate__container__item__title">¡Envío a toda parte del Perú!</div>
                        <div class="enterate__container__item__subtitle">Compra tus audífonos o packs y te lo envíamos en donde sea que estés.</div>
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
    <a href="https://www.wa.link/xfavry/" id="fixedbutton" target="_blank">
        <img class="fixedbutton__img" src="<?php echo get_template_directory_uri() ?>/src/assets/AYUDA_WSP.png" >
    </a>

    <!-- <div class="home-popup-newsletter">
        <img alt="crusher-newsletter-img" class="home-popup__image" src="<?php echo get_template_directory_uri() ?>/src/assets/SKULLWEEK_ENVIOS_GRATIS.jpg"/>
        <div class="home-popup">
            <div class="home-popup__content">
                <div class="home-popup__header">
                    <button class="home-popup__header__close">&times;</button>
                </div>
                <div class="home-popup__body">
                    <p class="home-popup__body__offer">¡Recibe un 10% de descuento en tu siguiente compra!</p>
                    <p class="home-popup__body__subtitle">Sé parte de nuestra comunidad y accede a eventos y promociones exclusivas. </p>
                    <div class="home-popup__body__forms">
                    <?php #echo do_shortcode( '[contact-form-7 id="161895" title="Newsletter Register"]' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="home-popup-image">
        
        <img alt="popup-img" class="home-popup-image__img" src="<?php #echo get_template_directory_uri() ?>/src/assets/POP_UP_TT.png"/>
        <button class="home-popup-image__close">&times;</button>
    </div> -->

    <!-- <div id="overlay"></div> -->

<?php get_footer();