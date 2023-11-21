<?php set_query_var( 'ENTRY', 'ola' );
get_header(); ?>


<main class="main">
    <div class="main-banner">
        <img class="main-banner__bg" src="<?php echo get_stylesheet_directory_uri() . '/uploads/OLA_BANNER_MAIN.webp' ?>" alt="skullcandy-ola"/>
        <img class="main-banner__logo" src="<?php echo get_stylesheet_directory_uri() . '/uploads/OLA_LOGO.png' ?>"  />
    </div>
    <div class="winners-banner">
        <h1 class="winners-banner__title">Manda tu mejor ola y gánate unos Skullcandy</h1>
        <div class="winner-banner__prizes">
            
            <div class="winner-banner__prizes__item">
                <img class="winner-banner__prizes__item__img" src="<?php echo get_stylesheet_directory_uri() . '/uploads/OLA_WINNER_FIRST.webp' ?>"/>
                <div class="winner-banner__prizes__item__text">
                    <p class="winner-banner__prizes__item__text__subtitle">Primer Puesto</p>
                    <p class="winner-banner__prizes__item__text__title">Hesh Evo</p>
                </div>
            </div>
            <div class="winner-banner__prizes__item">
                <img class="winner-banner__prizes__item__img" src="<?php echo get_stylesheet_directory_uri() . '/uploads/OLA_WINNER_SECOND.webp' ?>"/>
                <div class="winner-banner__prizes__item__text">
                    <p class="winner-banner__prizes__item__text__subtitle">Segundo Puesto</p>
                    <p class="winner-banner__prizes__item__text__title">Smokin' Buds</p>
                </div>
            </div>
            <div class="winner-banner__prizes__item">
                <img class="winner-banner__prizes__item__img" src="<?php echo get_stylesheet_directory_uri() . '/uploads/OLA_WINNER_THIRD.webp' ?>"/>
                <div class="winner-banner__prizes__item__text">
                    <p class="winner-banner__prizes__item__text__subtitle">Tercer Puesto</p>
                    <p class="winner-banner__prizes__item__text__title">Dime</p>
                </div>
            </div>
        </div>
    </div>
    <section class="instructions">
        <h1 class="instructions__title">¿Cómo participar?</h1>
        <div class="instruction__steps">
            <div class="instructions__steps__item">
                <h1 class="instructions__steps__number">01</h1>
                <p class="instructions__steps__text"> Graba tu mejor ola </p>
            </div>
            <div class="instructions__steps__item">
                <h1 class="instructions__steps__number">01</h1>
                <p class="instructions__steps__text"> Graba tu mejor ola </p>   
                <!-- Adjuntar forms -->
            </div>
        </div>

    </section>
</main>



<?php get_footer();
