<?php set_query_var( 'ENTRY', 'checkout' );

$order = filter_input( INPUT_GET, 'order' );

get_header(); ?>

    <div id="main-container">
        <div class="content">
			<?php if ( is_null( $order ) ): ?>
                <h1 class="checkout-title"><?php the_title(); ?></h1>
			<?php endif; ?>

			<div class="shop-features">
				<div class="shop-features__container">
					<svg  width="75" height="75" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
					<div class="shop-features__container__info">
						<p class="shop-features__container__info__title">Garantía de 1 año en todos nuestros productos</p>
					</div>
				</div>
				<div class="shop-features__container">
					<svg width="75" height="75" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16"> <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/> </svg>
					<div class="shop-features__container__info">
					<p class="shop-features__container__info__title">Envíamos el producto a cualquier parte del Perú</p>
					</div>

				</div>
				<div class="shop-features__container">
					<svg width="75" height="75" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16"> <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/> <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/> </svg>
					<div class="shop-features__container__info">
						<p class="shop-features__container__info__title">Cómpralo antes de las 4:00 PM y te lo entregamos al día siguiente (Lima Metropolitana y Callao) </p>
					</div>
					
				</div>
			</div>


			<!-- <div class="coupon-container">
				<div class="coupon-container__title">¿Te gustaría recibir un 10% de descuento en esta compra?</div>
				<a class="coupon-container__link"  target=”_blank” href="https://forms.office.com/r/WUxdx8qvhj">¡Responde la encuesta!</a>
			</div> -->

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
				PROMOCIONES SKULLDAYS  
			</div>

			<div class="checkout_additional_info__content">
				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">Compra desde 3 cuotas sin intereses para productos mayores a S/.89 (Válido con tarjetas BBVA, BCP y Diners Club)</p>			
				</div>
				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">Utiliza el cupón CUOTEALO y recibe S/.100 de descuento si compras con Cuotéalo BCP.</p>			
				</div>
			</div>
		</div>
    </div>

<?php get_footer();
