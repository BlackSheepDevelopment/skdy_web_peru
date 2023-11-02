<?php set_query_var( 'ENTRY', 'retailers' );
get_header(); ?>

<? if (current_user_can('retailer')){
?>
    <div class="main_retailers">

        <div class="main-header">
            <div class="header">TIENDAS PEQUEÑAS</div>
            <!-- <p class="subtitle">Gracias por tu interés en comprar Skullcandy para tu tienda. Por favor, ten en cuenta las siguientes indicaciones</p> -->
            <ul class="mayorista-features">
                <li class="mayorista-features__item">
                    <p class="item-number">1</p>
                    <p>Nuestro catálogo para tiendas pequeñas está disponible desde compras mayores a S/.750.</p>
                </li>
                <li class="mayorista-features__item">
                    <p class="item-number">2</p>
                    <p>Seleccione los productos que deseas comprar y agrégalos al carrito.</p>
                </li>
                <li class="mayorista-features__item">
                    <p class="item-number">3</p>
                    <p>Modifica la cantidad de unidades deseadas en el carrito.</p>
                </li>
                <li class="mayorista-features__item">
                    <p class="item-number">4</p>
                    <p>Finaliza la compra indicando tu RUC y la dirección de despacho.</p>
                </li>
            </ul>
        </div>



        <div class="mayorista-store">
            <?php 
                // $args = array('visibility' => 'catalog', 'category' => array( 'retailer' ), 'limit' => -1);
                $args = array('category' => array( 'retailer' ), 'limit' => -1);
                $products = wc_get_products($args);

                // Check if there are products in the array
                if (!empty($products)) { ?>
                    <div class="mayorista-store__header">
                        <p class="mayorista-store__header__store">TIENDA</p>
                        <p class="mayorista-store__header__subtitle">(<?php echo sizeof($products)?> productos)</p>
                    </div>
                    <div class="product-list"> <?php
                        foreach ($products as $product) {
                            ?>
                            <a class="product" href="<?php echo $product -> get_permalink() ?>?type=mayorist">
                                <?php $variations = $product->get_available_variations(); ?> 
                                <div class="product-image">
                                        <?php echo $product->get_image(); ?>
                                </div>
                                <div class="product-info">
                                    <p class="product-name"> <?php echo $product->get_name() ?></p>
                                    <div class="product-detail">
                                        <p class="product-category">
                                            <?php $categories_product = $product -> get_category_ids() ?>
                                            <?php foreach ($categories_product as $category_product) {
                                                $category = get_term_by('id', $category_product, 'product_cat');
                                                $cname = $category->name;
                                                if ($cname != 'Urbano' && $cname != 'Envío Rápido' && $cname != 'retailer' && $cname != 'Ofertas' && $cname != 'PACKS' ){
                                                    echo $category->name;
                                                }
                                            } ?>
                                        </p>
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
<?php
} else{
?>
    <div class="main_forms">
        <div class="main_forms__register">
            
            <p class="main-title">
                Regístrate como mayorista
            </p>

            <div class="forms-register">
                <div class="forms-mayoristas">
                    <?php echo do_shortcode( '[contact-form-7 id="171612" title="formulario-mayoristas"]' ); ?>
                </div>
                <div class="forms-adicional">
                    <p class="forms-adicional__content"> Si deseas contactarte por otro medio, por favor comunícate con nuestro canal de atención al cliente <a href="https://www.wa.link/xfavry/">aquí</a>. También puedes enviarnos un correo a atencioncliente@blacksheep.com.pe</p>
                </div>
            </div>

        </div>

        <div class="main_forms__login">

            <p class="main-title">
                    Regístrate como mayorista
            </p>

            <div class="forms-login" >
                <p>Debes ser un usuario registrado como tienda pequeña para acceder a esta página.</p>
                <p>Por favor, ingresa tus credenciales.</p>
                <form action="" method="post">
                    <label for="username_retailer">Usuario:</label>
                    <input type="text" name="username_retailer" id="username_retailer" required>
                    
                    <label for="password_retailer">Contraseña:</label>
                    <input type="password" name="password_retailer" id="password_retailer" required>
                    
                    <input type="submit" value="Register/Log In">
                </form>
            </div>

        </div>




    </div>
<?php
} ?>




<?php get_footer();
