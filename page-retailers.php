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
                        <a class="product" href="<?php echo $product -> get_permalink() ?>">
                            <?php $variations = $product->get_available_variations(); ?> 
                            <div class="product-image">
                                    <?php echo $product->get_image(); ?>
                            </div>
                            <div class="product-info">
                                <p class="product-name"> <?php echo $product->get_name() ?></p>
                                <div class="product-detail">
                                    <p class="product-category">True Wireless</p>
                                    <p class="product-price"> <?php echo $product->get_price_html() ?></p>
                                    <p class="product-price"> PRECIO MAYORISTA: <?php echo intval($product->get_price())*0.9 ?></p>
                                </div>

                            </div>
                        </a>
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
