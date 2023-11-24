<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>

	<a class="product-ref" href="<?php echo $product -> get_permalink() ?>">
		<?php $variations = $product->get_available_variations(); ?> 

		<?php
			global $product_discounts;
			$product_id = $product->get_id();
			if (array_key_exists($product_id, $product_discounts)) {
				// Product ID exists in the array, so display the <p> container
				echo '<p class="product-discount">SKULLDAYS</p>';
			}
		?>
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
						if ($cname != 'Urbano' && $cname != 'Deportivo' && $cname != 'Envío Rápido' && $cname != 'retailer' && $cname != 'Ofertas' && $cname != 'PACKS' && $cname != 'Ver todo' ){
							echo $category->name;
						}
					} ?>
				</p>
				<div class="product-price">
					<!-- Show only regular price if is not on sale -->
					<?php if ( $product ->get_variation_sale_price( 'max' ) == '' || intval($product ->get_variation_sale_price( 'max' )) ==  intval($product ->get_variation_regular_price( 'max' )) ) { ?>
						<p class="product-price__only">S/.<?php echo $product ->get_variation_regular_price( 'max' ); ?></p>
					<?php }
					else{ ?>
						<p class="product-price__after">S/.<?php echo $product ->get_variation_sale_price( 'max' ); ?></p>
						<p class="product-price__before">S/.<?php echo $product ->get_variation_regular_price( 'max' ); ?></p>
					<?php } ?>
				</div>
				<div class="product-stock">
					<?php 
						// generate a function that randomly decreases the number 20 as time passes
						$stock = 20;
						$available = $number - (time() % 20);
						$sold = $stock - $available;
					?>
					<!-- <div class="product-stock__available">
						<p class="product-stock__available__number"><?php #echo $available ?></p>
						<p class="product-stock__available__text">Disponible</p>
					</div>
					<div class="product-stock__sold">
						<p class="product-stock__sold__number"><?php #echo$sold?></p>
						<p class="product-stock__sold__text">Vendidos</p>
					</div> -->
				</div>


			</div>
		</div>
	</a>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	// do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	// do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
