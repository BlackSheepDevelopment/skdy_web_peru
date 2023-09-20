<?php set_query_var( 'ENTRY', 'mayoristas' );
get_header(); ?>

<div class="main">
    <div class="main-mayoristas">
        <h1 class="main-mayoristas__title">MAYORISTAS</h1>
        <p>
            Gracias por tu interés en comprar Skullcandy para tu negocio. Por favor, ingresa tus datos en el formulario y nosotros nos contactaremos contigo. 
        </p>
        <div class="forms-mayoristas">
            <?php echo do_shortcode( '[contact-form-7 id="161606" title="formulario-mayoristas"]' ); ?>
        </div>
    </div>
</div>


<?php get_footer();
