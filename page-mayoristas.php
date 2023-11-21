<?php set_query_var( 'ENTRY', 'mayoristas' );
get_header(); ?>

<div class="main">
    <div class="main-mayoristas">
        <h1 class="main-mayoristas__title">MAYORISTAS</h1>
        <p>
            Gracias por tu interés en comprar Skullcandy para tu negocio. Por favor, ingresa tus datos en el formulario y nosotros nos contactaremos contigo. 
        </p>
        <div class="forms-mayoristas">
            <?php echo do_shortcode( '[contact-form-7 id="178412" title="La Ola del Año"]' ); ?>
        </div>
        <div class="forms-adicional">
            <p class="forms-adicional__content"> Si deseas contactarte por otro medio, por favor comunícate con nuestro canal de atención al cliente <a href="https://www.wa.link/xfavry/">aquí</a>. También puedes enviarnos un correo a atencioncliente@blacksheep.com.pe</p>
        </div>
    </div>
</div>


<?php get_footer();
