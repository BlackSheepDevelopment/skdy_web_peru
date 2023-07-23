<?php set_query_var( 'ENTRY', 'envios' );
get_header(); ?>

<div class="main">
    <div class="envios-main">
        <h1 class="envios-main__title">ENVÍOS</h1>
        <a href="javascript:history.back()">
            <button>REGRESAR</button>
        </a>
        <div class="envios-container">
            <div class="envios-container__left">
                <div class="envios-container__left__title">
                    Envío Rápido
                </div>
                <div class="envios-container__left__content">
                    <p>- Envío Rápido hasta agotar stock en productos seleccionados</p>
                    <p>
                    - Puedes hacer seguimiento horas después de realizada la compra en <a class="envios-container__content__more" href="https://www.savarexpress.com.pe/">SAVAR EXPRESS</a> con con el tracking SKDY(#PEDIDO). Ejemplo: SKDY15962
                    </p>
                    <p class="envios-container--important">Tiempo de Entrega</p>
                    <ul class="envio-container--list">
                        <li class=" ">
                            - Lima Metropolitana: Entre 1 a 3 días hábiles (dependiendo de la zona)
                        </li>
                        <li class="envio-container--item">
                            - Lima Provincias y Regiones: Entre 4 a 15 días hábiles (<a class="envios-container__content__more" href="https://skullcandy.com.pe/wp-content/uploads/2022/01/LEAD-TIME-A-NIVEL-NACIONAL.pdf">Ver zonas de cobertura</a>)
                        </li>
                    </ul>

                </div>
            </div>
            <div class="envios-container__right">
                <div class="envios-container__right__title">
                    Envío Regular
                </div>
                <div class="envios-container__right__content">
                    <p>Realizamos envíos a CABA y GBA a través de <strong>Moto Mensajería</strong>.</p>
                    <p>El costo de envío se calcula automáticamente al ingresar tu código postal en el carrito de compras.</p>
                    <p>El tiempo de entrega es de 24 a 48 hs hábiles.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer();
