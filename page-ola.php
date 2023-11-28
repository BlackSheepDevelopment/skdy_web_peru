<?php set_query_var( 'ENTRY', 'ola' );
get_header(); ?>


<main class="main">
    <div class="main-banner">
        <img class="main-banner__bg" src="<?php echo get_stylesheet_directory_uri() . '/uploads/HOME_PAGE_LAOLA.png' ?>" alt="skullcandy-ola"/>
    </div>
    <div class="winners-banner">
        <h1 class="winners-banner__title">¡Manda tu mejor ola y gánate estos premios!</h1>
        <div class="winner-banner__prizes">
            
            <div class="winner-banner__prizes__item">
                <img class="winner-banner__prizes__item__img" src="<?php echo get_stylesheet_directory_uri() . '/uploads/PREMIO_1.png' ?>"/>
                <div class="winner-banner__prizes__item__text">
                    <p class="winner-banner__prizes__item__text__subtitle">Primer Puesto</p>
                    <p class="winner-banner__prizes__item__text__title">Tabla TWO HAPPY + Dime XT</p>
                </div>
            </div>
            <div class="winner-banner__prizes__item">
                <img class="winner-banner__prizes__item__img" src="<?php echo get_stylesheet_directory_uri() . '/uploads/PREMIO_2.png' ?>"/>
                <div class="winner-banner__prizes__item__text">
                    <p class="winner-banner__prizes__item__text__subtitle">Segundo Puesto</p>
                    <p class="winner-banner__prizes__item__text__title">Quilla Jeremy Flores + Dime XT</p>
                </div>
            </div>
            <div class="winner-banner__prizes__item">
                <img class="winner-banner__prizes__item__img" src="<?php echo get_stylesheet_directory_uri() . '/uploads/PREMIO_3.png' ?>"/>
                <div class="winner-banner__prizes__item__text">
                    <p class="winner-banner__prizes__item__text__subtitle">Tercer Puesto</p>
                    <p class="winner-banner__prizes__item__text__title">Pita Freedom Helix + Dime XT </p>
                </div>
            </div>
        </div>
    </div>
    <!-- <img class="seconday-banner" src="<?php #echo get_stylesheet_directory_uri() . '/uploads/OLA_BANNER_SECON.webp' ?>" alt="skullcandy-ola-secondary"/> -->
    <section class="instructions">
        <h1 class="instructions__title">¿Cómo participar?</h1>
        <div class="instructions__steps">
            <div class="instructions__steps__item">
                <h1 class="instructions__steps__item__number">1</h1>
                <p class="instructions__steps__item__text">Sube un video de tu mejor ola a YouTube, Instagram o Facebook.</p>
            </div>
            <div class="instructions__steps__item">
                <h1 class="instructions__steps__item__number">2</h1>
                <p class="instructions__steps__item__text">Copia el link de tu video y completa el siguiente formulario.</p>   
                <!-- Adjuntar forms -->
                <?php echo do_shortcode('[contact-form-7 id="178412" title="Ola SKDY"]') ?>
            </div>
        </div>

    </section>
</main>



<?php get_footer();
