<?php /* Template Name: Gracias */

set_query_var( 'ENTRY', 'thanks' );

$id  = filter_input( INPUT_GET, 'id' );
$key = filter_input( INPUT_GET, 'key' );

if ( is_null( $id ) || is_null( $key ) ) {
	wp_redirect( '/' );
	exit();
}

try {
	$order = new WC_Order( $id );
} catch ( Exception $e ) {
	wp_redirect( '/' );
	exit();
}

if ( $order->key_is_valid( $key ) ):
	get_header(); ?>
    <div id="main-container">
        <h1><?php the_title() ?></h1>
		<?php if ( have_posts() ):
			while ( have_posts() ):
				the_post(); ?>
                <div class="content">
					<?php the_content(); ?>
                    <br>
                    <div>
                        <b>E-mail:</b> <?php echo $order->get_billing_email() ?>
                    </div>
                </div>
			<?php endwhile;
		endif; ?>
    </div>
	<?php get_footer();
else:
	wp_redirect( '/' );
	exit();
endif;