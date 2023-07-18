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
				Recuerda...
			</div>

			<div class="checkout_additional_info__element">
				Tiempo de entrega 2 a 3 días habiles (sin contar Feriados, Sábados y Domingos)
			</div>

			<div class="checkout_additional_info__element">
				<a href="https://skullcandy.com.pe/envios/">
					<button class="checkout_additional_info__element__btn">Envíos a provincia</button>
				</a>
			</div>

			<div class="checkout_additional_info__element">
				<a href="https://skullcandy.com.pe/politica-de-cambios-y-garantias/">
					<button class="checkout_additional_info__element__btn">Garantías</button>
				</a>
			</div>


		</div>
    </div>

<?php get_footer();
