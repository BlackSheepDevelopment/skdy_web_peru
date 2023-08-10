<?php set_query_var( 'ENTRY', 'checkout' );

$order = filter_input( INPUT_GET, 'order' );

get_header(); ?>

    <div id="main-container">
        <div class="content">
			<?php if ( is_null( $order ) ): ?>
                <h1 class="checkout-title"><?php the_title(); ?></h1>
			<?php endif; ?>

			<div class="coupon-container">
				<div class="coupon-container__title">¿Te gustaría recibir un 15% de descuento en esta compra?</div>
				<a class="coupon-container__link"  target=”_blank” href="https://forms.office.com/r/sgWrV96UJw">¡Responde la encuesta!</a>
			</div>

			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
			?>
        </div>

		<div class="checkout_additional_info">
			<div class="checkout_additional_info__title">
				RECUERDA
			</div>

			<div class="checkout_additional_info__content">
				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">El tiempo de entrega por Envío Rápido es de 1 a 3 días habiles y Envío Regular de 2 a 4 días hábiles
					(solo Lima Metropolitana y Callao sin contar Sábados, Domingos y feriados).</p>
					<a class="checkout_additional_info__element__btn" href="<?php echo home_url('/envios'); ?>">
						Ver más
					</a>			
				</div>

				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">El tiempo de entrega a provincia es de 4 a 15 días hábiles según la región.</p>
					<a class="checkout_additional_info__element__btn" href="<?php echo home_url('/envios'); ?>">
						Ver más
					</a>
				</div>

				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">Entérate sobre nuestra política de cambios y devoluciones.</p>
					<a class="checkout_additional_info__element__btn" href="<?php echo home_url('/politica-de-cambios-y-garantias'); ?>">
						Ver más
					</a>
				</div>
			</div>
		</div>
    </div>

<?php get_footer();
