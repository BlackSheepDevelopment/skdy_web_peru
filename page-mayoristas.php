<?php set_query_var( 'ENTRY', 'mayoristas' );
get_header(); ?>

<div class="main">
    <div>
        <h1>MAYORISTAS</h1>
        <p>Gracias por tu interés en comprar Skullcandy para tu negocio.</p>
        <p>Los productos mostrados en nuestro catálogo web son los disponibles para la compra al por mayor</p>
        <?php echo do_shortcode( '[contact-form-7 id="161606" title="formulario-mayoristas"]' ); ?>


    </div>
</div>


<?php get_footer();
