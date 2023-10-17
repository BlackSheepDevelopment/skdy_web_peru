<?php set_query_var( 'ENTRY', 'tienda_retail' );
get_header(); ?>

<div class="main">
    <div class="header">Tienda para Mayoristas</div>
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
            $args = array('visibility' => 'catalog',);
            $products = wc_get_products( $args ); 
        ?>
        <p><?php  echo $products ?></p>
<!-- 
        <div class="product-details">
            <h2 class="product-title"><?php echo $product->get_name(); ?></h2>
            <p class="product-price"><?php echo $product->get_price_html(); ?></p>
        </div> -->
    </div>
</div>


<?php get_footer();
