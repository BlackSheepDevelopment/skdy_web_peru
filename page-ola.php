<?php set_query_var( 'ENTRY', 'ola' );
get_header(); ?>


<main class="main">
    <div class="main-banner">
        <img class="main-banner__bg" src="<?php echo get_stylesheet_directory_uri() . '/uploads/OLA_BANNER_MAIN.webp' ?>" alt="skullcandy-ola"/>
        <img class="main-banner__logo" src="<?php echo get_stylesheet_directory_uri() . '/uploads/OLA_LOGO.png' ?>"  />
    </div>
</main>



<?php get_footer();
