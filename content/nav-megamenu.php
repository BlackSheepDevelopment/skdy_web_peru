<?php if ( have_rows( 'menu', 'mega_menu' ) ): ?>
    <div id="mega-menu-catalog" class="mega-menu-wrapper">
        <div class="mega-menu">
            <section class="container">
				<?php if ( have_rows( 'left_menu', 'mega_menu' ) ): ?>
                    <article class="left">
						<?php while ( have_rows( 'left_menu', 'mega_menu' ) ): the_row();
							$link  = get_sub_field( 'link' );
							$color = get_sub_field( 'color' ); ?>
                            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>"
							   <?php if ( $color ): ?>style="color: <?php echo $color ?>"<?php endif; ?>>
								<?php echo $link['title'] ?>
                            </a>
						<?php endwhile; ?>
                    </article>
				<?php endif; ?>
				<?php while ( have_rows( 'menu', 'mega_menu' ) ): the_row() ?>
                    <article>
						<?php $header = get_sub_field( 'header' ); ?>
                        <a href="<?php echo $header['link'] ?>" class="header">
                            <span class="title"><?php echo $header['title'] ?></span>
                        </a>
						<?php if ( have_rows( 'links' ) ): ?>
                            <ul>
								<?php while ( have_rows( 'links' ) ): the_row() ?>
                                    <li>
										<?php $link = get_sub_field( 'link' ); ?>
                                        <a href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
                                    </li>
								<?php endwhile; ?>
                            </ul>
						<?php endif; ?>
                    </article>
				<?php endwhile; ?>
                <article class="right">
					<?php $right_menu = get_field( 'right_menu_image', 'mega_menu' ) ?>
                    <a href="<?php echo $right_menu['link']['url'] ?>"
                       target="<?php echo $right_menu['link']['alt'] ?>">
                        <picture>
                            <img src="<?php echo $right_menu['image']['url'] ?>"
                                 alt="<?php echo $right_menu['image']['alt'] ?>">
                        </picture>
                        <div class="title">
							<?php echo $right_menu['link']['title'] ?>
                        </div>
                    </a>
                    <a href="<?php the_permalink( get_page_by_path( 'comparar' ) ); ?>" class="btn-compare">
						<?php _e( 'Comparar', 'skullcandy' ) ?>
                    </a>
                </article>
            </section>
        </div>
    </div>
<?php endif;
if ( have_rows( 'inside_menu', 'mega_menu' ) ): ?>
    <div id="mega-menu-inside" class="mega-menu-wrapper">
        <section class="mega-menu">
			<?php while ( have_rows( 'inside_menu', 'mega_menu' ) ): the_row() ?>
                <article>
					<?php $link = get_sub_field( 'link' ); ?>
                    <a href="<?php echo $link['url'] ?>">
						<?php $image = get_sub_field( 'image' ); ?>
                        <img src="<?php echo $image['desktop']['url'] ?>" alt="<?php echo $image['desktop']['alt'] ?>"
                             class="image">
                        <h2><?php echo $link['title'] ?></h2>
                    </a>
                </article>
			<?php endwhile; ?>
        </section>
    </div>
<?php endif; ?>
<div class="search-wrapper">
    <div id="search">
        <div class="container">
			<?php $shop_url = get_permalink( wc_get_page_id( 'shop' ) ); ?>
            <form action="<?php echo $shop_url ?>" method="get">
                <input type="search" name="s" placeholder="<?php _e( 'Buscar...', 'skullcandy' ) ?>">
            </form>
            <div class="close"></div>
        </div>
    </div>
</div>
<div class="cart-wrapper">
    <div class="content">
        <div class="mini-cart-wrapper">
            <div class="mini-cart">
                <div class="head">
                    <h3 class="title"><?php _e( 'MI CARRITO', 'skullcandy' ) ?></h3>
                    <div class="close"></div>
                </div>

                <?php
                global $woocommerce;
                if ( $woocommerce->cart->get_cart_contents_count() == 0 ) {
                        ?>
                        <div class="list-cart">
                            <p class="list-cart__no-product">No hay productos en su carrito aún</p> 
                        </div>  <?php
                }
                else{
                ?>
                <div class="list-cart">
                    <?php
					$items = $woocommerce->cart->get_cart();
					foreach ( $items as $key => $item ):
						if ( ! is_null( $item['variation_id'] ) ) {
							$product = new WC_Product_Variation( $item['variation_id'] );
						} else {
							$product = new WC_Product( $item['product_id'] );
						} ?>
                        <a href="<?php echo $product->get_permalink() ?>">
                            <div class="item">
                                <div class="thumbnail"><?php echo $product->get_image() ?></div>
                                <div class="info">
                                    <div class="name"><?php echo $product->get_name() ?></div>
                                    <div class="quantity">Cantidad: <?php echo $item['quantity']; ?></div>
                                    <div class="price">
										<?php echo get_woocommerce_currency_symbol() . ' ' . $item['line_subtotal'] ?></div>
                                </div>
                            </div>
                        </a>
					<?php endforeach; ?>
                </div>
                <div class="actions">
                    <a href="<?php echo wc_get_checkout_url() ?>" class="btn">
						<?php _e( 'Checkout', 'skullcandy' ) ?>
                    </a>
                    <a class="text" href="<?php echo wc_get_cart_url() ?>">
						<?php _e( 'Ver carro completo', 'skullcandy' ) ?>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="mega-menu-support" class="mega-menu-wrapper">
    <div class="mega-menu">
        <section class="container">
            <ul>
				<?php while ( have_rows( 'support', 'mega_menu' ) ): the_row() ?>
                    <li>
						<?php $link = get_sub_field( 'link' ) ?>
                        <a href="<?php echo $link['url'] ?>"
                           target="<?php echo $link['target'] ?>"><?php echo $link['title'] ?></a>
                    </li>
				<?php endwhile; ?>
            </ul>
        </section>
    </div>
</div>
