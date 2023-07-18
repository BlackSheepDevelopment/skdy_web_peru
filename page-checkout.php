<?php set_query_var( 'ENTRY', 'checkout' );

$order = filter_input( INPUT_GET, 'order' );

get_header(); ?>

    <div id="main-container">
        <div class="content">
			<?php if ( is_null( $order ) ): ?>
                <h1 class="checkout-title"><?php the_title(); ?></h1>
			<?php endif; ?>
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
			?>
        </div>

		<div class="checkout_additional_info woocommerce-notices-wrapper">
			<div class="checkout_additional_info__title">
				RECUERDA
			</div>

			<div class="heckout_additional_info__content">
				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">Para Lima y Callao nuestro tiempo de entrega es de 2 a 3 días habiles (sin contar Feriados, Sábados y Domingos).</p>
				</div>

				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">Para envíos a provincia es de 4 a 15 días hábiles según la región</p>
					<a href="https://skullcandy.com.pe/envios/">
						<button class="checkout_additional_info__element__btn">Ver más</button>
					</a>
				</div>

				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">Sobre nuestra política de cambios y devoluciones</p>
					<a href="https://skullcandy.com.pe/politica-de-cambios-y-garantias/">
						<button class="checkout_additional_info__element__btn">Ver más</button>
					</a>
				</div>
			</div>
		</div>
    </div>

<?php get_footer();
