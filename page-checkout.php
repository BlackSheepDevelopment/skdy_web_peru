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

		<div class="checkout_additional_info">
			<div class="checkout_additional_info__title">
				RECUERDA
			</div>

			<div class="checkout_additional_info__content">
				<div class="checkout_additional_info__element">
					<p class="checkout_additional_info__element__label">El tiempo de entrega es de 1 a 3 días habiles para Lima Metropolitana y Callao (sin contar Feriados, Sábados y Domingos).</p>
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
