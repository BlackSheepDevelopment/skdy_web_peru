<?php set_query_var( 'ENTRY', 'retailers' );
get_header(); ?>

<div class="main_retailers">

    <div class="main-header">
        <div class="header">COMPRAS AL POR MAYOR</div>
        <p class="subtitle">Gracias por tu interés en comprar Skullcandy para tu tienda.</p>
        <p class="subtitle">Por favor, ten en cuenta las siguientes indicaciones:</p>
        <ul class="mayorista-features">
            <li class="mayorista-features__item">
                1. Nuestro catálogo mayorista está disponible desde compras mayores a S/.750.
            </li>
            <li class="mayorista-features__item">
                2. Seleccione los productos que deseas comprar y agrégalos al carrito.
            </li>
            <li class="mayorista-features__item">
                3. Modifica la cantidad de unidades deseadas en el carrito.
            </li>
            <li class="mayorista-features__item">
                4. Completa el proceso de facturación indicando tu RUC y la dirección de despacho
            </li>
        </ul>
        <p class="subtitle">Para mayor información comunícate por nuestro WhatsApp</p>
    </div>



    <div class="mayorista-store">
        <?php 
            $args = array('visibility' => 'catalog', 'category' => array( 'retailer' ),);
            $products = wc_get_products($args);

            // Check if there are products in the array
            if (!empty($products)) { ?>
                <div class="mayorista-store__header">
                    <p class="mayorista-store__header__store">TIENDA</p>
                    <p class="mayorista-store__header__subtitle">Encuentra <?php echo sizeof($products)?> productos</p>
                </div>
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
                                    <div class="product-price">
                                        <div class="product-price__normal">
                                            <p>Normal</p>
                                            <p>S/.<?php echo intval($product->get_price()) ?></p>
                                        </div>
                                        <div class="product-price__mayorista">
                                            <p>Mayorista</p>
                                            <p>S/.<?php echo intval($product->get_price())*0.9 ?></p>
                                        </div>
                                    </div>
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

    <a href="https://www.wa.link/xfavry/" id="fixedbutton" target="_blank">
        <img class="fixedbutton__img" src="<?php echo get_template_directory_uri() ?>/src/assets/AYUDA_WSP.png" >
    </a>
</div>


<?php get_footer();
