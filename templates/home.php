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
                <div>
                    <div class="wave-container"></div>
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri() ?>/src/assets/MAIN_BANNER_WEB_DESK.png"
                                media="(min-width: 551px)"/>
                        <img src="<?php echo get_template_directory_uri() ?>/src/assets/MAIN_BANNER_WEB_MOV.png" alt="Home Grid v2"
                            class="home-grid__picture">
                    </picture>
                </di>

                <div class="home-info">
                    <p class="home-title">SINTONIZA</p>
                    <p class="home-title">CADA MOMENTO</p>
                    <p class="home-title home-title--bold">CON LA FUNCIÓN PERFECTA</p>
                    <img src="<?php echo get_template_directory_uri() ?>/src/assets/FEEL_SKULLCANDY_WHITE.png"/>
                </div>
                  
            </div>
    </div>
<?php get_footer();
