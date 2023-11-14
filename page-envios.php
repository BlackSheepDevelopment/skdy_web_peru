<?php set_query_var( 'ENTRY', 'envios' );
get_header(); ?>

<div class="main">
    <div class="envios-main"></div>
        <div class="envios-container__back__container">
            <a href="javascript:history.back()">
                <button class="envios-container__back">REGRESAR</button>
            </a>
        </div>

        <h1 class="envios-main__title">ENVÍOS</h1>
        <div class="envios-container">
            <div class="envios-container__left">
                <div class="envios-container__left__title">
                    Envío Rápido
                </div>
                <div class="envios-container__left__content">
                    <p class="envios-container--first-check"><em>Envío Rápido hasta agotar stock en productos seleccionados.</em></p>
                    <p>
                    - Puedes hacer seguimiento <strong>horas</strong> después de realizada la compra en <a class="envios-container__content__more" href="https://www.savarexpress.com.pe/">SAVAR EXPRESS</a> con con el tracking SKDY(#PEDIDO). Ejemplo: SKDY15962
                    </p>
                    <p class="envios-container--important">Tiempo de Entrega</p>
                    <ul class="envio-container--list">
                        <li class=" ">
                            - Lima Metropolitana: Entre 1 a 3 días hábiles (dependiendo de la zona)
                        </li>
                        <li class="envio-container--item">
                            - Lima Provincias y Regiones: Entre 4 a 15 días hábiles 
                        </li>
                    </ul>

                </div>
            </div>
            <div class="envios-container__right">
                <div class="envios-container__right__title">
                    Envío Regular
                </div>
                <div class="envios-container__right__content">
                    <p class="envios-container--first-check"><em>Envío Regular es seleccionado en caso Envío Rápido no esté disponible.</em></p>
                    <p>- Puedes hacer seguimiento  <strong> un día</strong> después de realizada la compra en <a class="envios-container__content__more" href="https://tracking.ng.paquery.com/package">Chazqui</a> con el tracking SKDY_21_(#PEDIDO). Ejemplo: SKDY_21_15962</p>
                    <p class="envios-container--important">Tiempo de Entrega</p>
                    <ul class="envio-container--list">
                        <li class=" ">
                            - Lima Metropolitana: Entre 3 a 4 días hábiles mediante Chazki.
                        </li>
                        <li class="envio-container--item">
                            - Lima Provincias y Regiones: Entre 4 a 15 días hábiles mediante Olva Courrier.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer();
