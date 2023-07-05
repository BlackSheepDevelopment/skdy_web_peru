<?php set_query_var( 'ENTRY', 'checkout' );

$order = filter_input( INPUT_GET, 'order' );

get_header(); ?>

    <div id="main-container">
        <div class="content">
			<?php if ( is_null( $order ) ): ?>
                <h1><?php the_title(); ?></h1>
                <div class="list-images">
                    <div class="shipping active">
                        <picture>
                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/uploads/envio-desk.jpg' ?>"
                                    media="(min-width: 800px)"/>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/envio-phone.jpg' ?>"
                                 alt="Envío">
                        </picture>
                    </div>
                    <div class="billing">
                        <picture>
                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/uploads/factura-desk.jpg' ?>"
                                    media="(min-width: 800px)"/>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/factura-phone.jpg' ?>"
                                 alt="Facturación">
                        </picture>
                    </div>
                    <div class="payment">
                        <picture>
                            <source srcset="<?php echo get_stylesheet_directory_uri() . '/uploads/pago-desk.jpg' ?>"
                                    media="(min-width: 800px)"/>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/pago-phone.jpg' ?>"
                                 alt="Pago">
                        </picture>
                    </div>
                </div>
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
    </div>

<?php get_footer();
