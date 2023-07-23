<?php set_query_var( 'ENTRY', 'envios' );
get_header(); ?>

<div class="main">
    <div class="envios-main">
        <h1 class="envios-main__title">ENVÍOS</h1>
        <div class="envios-container">
            <div class="envios-container__left">
                <div class="envios-container__left__title">
                    <h2>Envío Rápido</h2>
                </div>
            <div class="envios-container__left__content">
                <p>Realizamos envíos a todo el país a través de <strong>Correo Argentino</strong> y <strong>Andreani</strong>.</p>
                <p>El costo de envío se calcula automáticamente al ingresar tu código postal en el carrito de compras.</p>
                <p>El tiempo de entrega es de 3 a 7 días hábiles.</p>
            </div>
        </div>
        <div class="envios-container__right">
            <div class="envios-container__right__title">
                <h2>Envío Regular</h2>
            </div>
            <div class="envios-container__right__content">
                <p>Realizamos envíos a CABA y GBA a través de <strong>Moto Mensajería</strong>.</p>
                <p>El costo de envío se calcula automáticamente al ingresar tu código postal en el carrito de compras.</p>
                <p>El tiempo de entrega es de 24 a 48 hs hábiles.</p>
            </div>
        </div>
    </div>
</div>


<?php get_footer();
