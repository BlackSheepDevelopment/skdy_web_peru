<?php /* Template Name: Compare */

set_query_var( 'ENTRY', 'compare_family' );
if ( ! session_id() ) {
	session_start();
}

$nonce = $_REQUEST['_wpnonce'];
if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! wp_verify_nonce( $nonce ) ) {
	die( __( 'Security check', 'skullcandy' ) );
}

$_ids = $_SESSION['products'];
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$product_id = filter_input( INPUT_POST, 'product_id' );
	$action     = filter_input( INPUT_POST, 'action' );

	if ( $action === 'remove' ) {
		if ( ( $key = array_search( $product_id, $_ids ) ) !== false ) {
			unset( $_ids[ $key ] );
		}
	} else {
		if ( is_null( $_ids ) ) {
			$_ids = array( $product_id );
		} else {
			$_ids[] = $product_id;
		}
	}

	$_SESSION['products'] = $_ids;
}

$_products = array();
foreach ( $_ids as $_id ) {
	$_products[] = new WC_Product( $_id );
}

get_header(); ?>
    <div id="main-container" class="full-width">
        <h1><?php the_title() ?></h1>
		<?php if ( ! empty( $_products ) ): ?>
            <div class="container-scroll">
                <section class="products compare list">
					<?php foreach ( $_products as $product ):
						$_id = $product->get_id();
						$features = null;
						while ( have_rows( 'storytelling', $_id ) ) {
							the_row();
							$bg = get_sub_field( 'background' );
							while ( have_rows( 'content' ) ) {
								the_row();
								if ( get_row_layout() == 'icons' ) {
									$features = get_sub_field( 'list' );
									break;
								}
							}
							if ( ! is_null( $features ) ) {
								break;
							}
						}
						?>
                        <article>
                            <div class="flipper">
                                <form action="" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $_id ?>">
                                    <input type="hidden" name="action" value="remove">
									<?php wp_nonce_field() ?>
                                    <button class="remove-product"><?php _e( 'Quitar', 'skullcandy' ) ?></button>
                                </form>
                                <div class="front" style="background-image: url(<?php echo $bg['desktop']['url']; ?>)">
                                    <picture>
                                        <img src="<?php echo $bg['mobile']['url'] ?>"
                                             alt="<?php echo $product->get_name() ?>">
                                    </picture>
                                    <div class="content">
										<?php $header = get_field( 'header', $_id ); ?>
                                        <div class="title"><?php echo $header['title'] ?></div>
                                        <div class="description"><?php echo $product->get_name() ?></div>
                                    </div>
									<?php if ( have_rows( 'tech_specs' ) ): ?>
                                        <br>
                                        <ul class="features">
											<?php while ( have_rows( 'tech_specs' ) ): the_row() ?>
                                                <li>
                                                    <picture>
														<?php $icon = get_sub_field( 'icon' ) ?>
                                                        <img src="<?php echo $icon['url'] ?>"
                                                             alt="<?php echo $icon['alt'] ?>">
                                                    </picture>
                                                    <span><?php the_sub_field( 'title' ); ?></span>
                                                </li>
											<?php endwhile; ?>
                                        </ul>
									<?php endif; ?>
									<?php if ( have_rows( 'list' ) ): ?>
                                        <br>
                                        <ul class="features">
											<?php while ( have_rows( 'list' ) ): the_row() ?>
                                                <li>
                                                    <picture>
														<?php $icon = get_sub_field( 'icon' ) ?>
                                                        <img src="<?php echo $icon['url'] ?>"
                                                             alt="<?php echo $icon['alt'] ?>">
                                                    </picture>
                                                    <span><?php the_sub_field( 'text' ); ?></span>
                                                </li>
											<?php endwhile; ?>
                                        </ul>
									<?php endif; ?>
                                    <a href="<?php echo $product->get_permalink() ?>" target="_blank"
                                       class="btn"><?php _e( 'Comprar', 'skullcandy' ) ?></a>
                                </div>
                            </div>
                        </article>
					<?php endforeach; ?>
                </section>
            </div>
		<?php else: ?>
            <div class="no-products">
                <h3><?php _e( 'No has añadido productos para comparar.', 'skullcandy' ) ?></h3>
            </div>
		<?php endif; ?>
    </div>
<?php get_footer();
