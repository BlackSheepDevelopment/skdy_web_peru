<?php set_query_var( 'ENTRY', 'retailers' );
get_header(); ?>

<div class="main_retailers">
    <div class="header">Tienda para Mayorista</div>
    <p class="subtitle">Gracias por tu interés en comprar Skullcandy para tu tienda. Nosotros te ofrecemos:</p>
    <ul class="mayorista-features">
        <li class="mayorista-features__item">Nuestro catálogo mayorista está disponible desde compras mínimas de S/.750</li>
        <li class="mayorista-features__item">Despacho de los productos a tu almacén</li>
        <li class="mayorista-features__item">Pago en línea mediante tarjeta de crédito o débito. Si deseas realizar algún depósito bancario, contáctate con contacto@blacksheep.com.pe</li>
    </ul>


    <div class="mayorista-store">
        <div clas="mayorista-store__title">
            PRODUCTOS
        </div>
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
                            <a href="<?php echo $product -> get_permalink() ?>" class="product">
                                <img class="product-image" src="<?php echo $product->get_image()?>"/>
                                <p class="product-name"> <?php echo $product->get_name() ?></p>
                                <p clas="product-price"> <?php echo $product->get_price_html() ?></p>
                            </a>

                            <div class="list-swatches">
                                <?php foreach ( $variations as $variation ) {
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
