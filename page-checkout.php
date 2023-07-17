<?php set_query_var( 'ENTRY', 'checkout' );

$order = filter_input( INPUT_GET, 'order' );

get_header(); ?>

    <div id="main-container">
		<button id="testing-callback" type="button">PRUEBA DE SIEMPRE</button>
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
    </div>

<?php get_footer();
