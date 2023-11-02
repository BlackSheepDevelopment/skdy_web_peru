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
    <div class="main">
        <div class="main-header">
                <div class="header">TIENDAS PEQUEÑAS</div>
                <p class="subtitle">Gracias por tu interés en comprar Skullcandy para tu tienda. Regístrate o Inicia Sesión.</p>
        </div>

        <div class="main_forms">

            <div class="main_forms__register">
                
                <p class="main_forms__title">
                    Regístrate
                </p>

                <p class="main_forms__subtitle">
                    Si deseas comprar Skullcandy para tu tienda, por favor completa el siguiente formulario y nos pondremos en contacto contigo.
                </p>

                <div class="main_forms__register__forms">
                    <?php echo do_shortcode( '[contact-form-7 id="171612" title="formulario-mayoristas"]' ); ?>
                </div>

            </div>

            <span class="main_forms__separator"></span>
            <div class="main_forms__login">

                <p class="main_forms__title">
                    Inicia sesión
                </p>

                <p class="main_forms__subtitle">
                    Si ya tienes una cuenta, por favor ingresa tus datos.
                </p>

                <form class="main_forms__login__forms" action="" method="post">
                    <input class="main_forms__login__forms__input" type="text" name="username_retailer" id="username_retailer" required placeholder="Usuario">
                    
                    <input class="main_forms__login__forms__input" type="password" name="password_retailer" id="password_retailer" required placeholder="Contraseña">
                    
                    <input class="main_forms__login__forms__submit" type="submit" value="Acceder">
                </form>

            </div>

        </div>

    </div>

<?php
} ?>




<?php get_footer();
