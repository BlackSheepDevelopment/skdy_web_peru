<?php set_query_var( 'ENTRY', 'retailers' );
get_header(); ?>

<div class="main_retailers">
    <div class="header">MAYORISTAS</div>
    <p class="subtitle">Gracias por tu interés en comprar Skullcandy para tu tienda. Nosotros te ofrecemos:</p>
    <ul class="mayorista-features">
        <li class="mayorista-features__item">Nuestro catálogo mayorista está disponible desde compras mínimas de S/.750</li>
        <li class="mayorista-features__item">Despacho de los productos a tu almacén</li>
        <li class="mayorista-features__item">Pago en línea mediante tarjeta de crédito o débito. Si deseas realizar algún depósito bancario, contáctate con contacto@blacksheep.com.pe</li>
    </ul>


    <div class="mayorista-store">
        <?php 
            $args = array('visibility' => 'catalog', 'category' => array( 'retailer' ),);
            $products = wc_get_products($args);

            // Check if there are products in the array
            if (!empty($products)) { ?>
                <div class="product-list"> <?php
                    foreach ($products as $product) {
                        ?>
                        <div class="product-container">
                            <?php $variations = $product->get_available_variations(); ?> 

                            <div class="product-image">
                                <a href="<?php echo $product -> get_permalink() ?>" class="product-link">
                                    <?php echo $product->get_image(); ?>
                                </a>
                            </div>
                            <div class="product-info">
                                <p class="product-name"> <?php echo $product->get_name() ?></p>
                                <p class="product-price"> <?php echo $product->get_price_html() ?></p>

                                <?php if ( have_rows( 'tech_specs', $product -> get_id()) ): ?>
                                    <div class="tech-specs">
                                        <?php while ( have_rows( 'tech_specs' ) ): the_row() ?>
                                            <div class="spec">
                                                <?php $icon = get_sub_field( 'icon' ) ?>
                                                <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
                                                <span><?php the_sub_field( 'title' ); ?></span>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>


                                <div class="list-swatches">
                                    <?php 
                                        if(sizeof($variations) > 1){
                                            ?> <p class="swatch-title">También disponible en:</p>

                                            <div class="swatch-elements"> <?php
                                                foreach ( $variations as $variation ) {
                                                    $name = $variation['attributes']['attribute_color'];
                                                    ?>
                                                        <a class="swatch-link"
                                                        href="<?php echo $product->get_permalink(); ?>?attribute_color=<?php echo $name ?>">
                                                            <img src="<?php echo $variation['image']['url'] ?>"
                                                                alt="<?php echo $name; ?>"
                                                                title="<?php echo $name; ?>" class="swatch-image">
                                                            <p class="swatch-name"><?php echo $name; ?></p>
                                                        </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php
            } else {
                echo '<p class="no-product">No products found.</p>';
            }
        ?>

    </div>
</div>


<?php get_footer();