<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

set_query_var( 'ENTRY', 'shop' );

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<!-- <h1 class="woocommerce-products-header__title page-title page-title-shop"><?php #woocommerce_page_title(); ?></h1> -->
	<?php endif; ?>
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<div class="main-shop__banner">
	<?php 
		$image_banner = get_field('shop_banner');
        if ($image_banner){
			?> <img class="main-shop__img" src="<?php echo $image_banner['url'] ?>"/> <?php
		}
		// else{
		// 	?> <img class="main-shop__img" src="<?php echo get_stylesheet_directory_uri() . '/uploads/BF_BANNER_SHOP.png' ?>"/> <?php
		// }
		$text_banner = get_field('shop_text');
		if ($text_banner !== ''){
			?> <div class="main-shop__text"> 
				<p>HASODASJD HOLA COMO ESTAS</p>
				<p class="main-shop__title"><?php echo esc_html($text_banner)?></p>
			</div> <?php
		}
		else{
			?> <div class="main-shop__text"> 
				<p class="main-shop__title">¡Siente la música al máximo con Skullcandy!</p>
			</div> <?php
		}
	?>

</div>





<div class="main-shop-menu">
	<div class="filter">
		<div class="filter-categories">
			<div class="filter-categories__title">Categorías</div>
			<div class="filter-categories__options">
				<button class="filter__section__button" id="">Todo</button>
				<button class="filter__section__button filter__section__button--ofertas " id="ofertas">OFERTAS</button>
				<button class="filter__section__button" id="packs">Packs</button>
				<button class="filter__section__button" id="true-wireless">True Wireless</button>
				<button class="filter__section__button" id="headphones">Headphones</button>
				<button class="filter__section__button" id="bluetooth">Bluetooth</button>
				<button class="filter__section__button" id="cableados">Cableados</button>
				<button class="filter__section__button" id="accesorios">Accesorios</button>
			</div>
		</div>
		<div class="filter-buttons">
			<a class="buy-button" href="https://wa.me/51974555080" target="_blank">Compra directa</a>
		</div>
		<div class="filter-buttons">
			<a class="buy-button" href="https://www.wa.link/xfavry/" target="_blank">¡Reserva tu cita de experiencia!</a>
		</div>
	</div>


	<div class="shop-store">
		<div class="filter-categories__title">Productos</div>
		<!-- <div class="banners">
			<picture class="shop_banner">
				<source srcset="<?php #echo get_stylesheet_directory_uri() . '/uploads/CUOTEALO_POPUP.png' ?>" media="(min-width: 758px)"/>
				<img src="<?php #echo get_stylesheet_directory_uri() . '/uploads/CUOTEALO_BANNER.png' ?>"
							alt="mobile-main-banner">
			</picture>
			<picture class="shop_banner shop_banner--envio">
				<source srcset="<?php #echo get_template_directory_uri() ?>/src/assets/BANNER_ENVIOS.png" media="(min-width: 758px)"/>
				<img src="<?php #echo get_template_directory_uri() ?>/src/assets/BANNER_ENVIOS_MOV.png"
							alt="mobile-main-banner">
			</picture>
		</div> -->


		<?php
		if ( woocommerce_product_loop() ) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );

			woocommerce_product_loop_start();


			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();
					do_action( 'woocommerce_shop_loop' );
					wc_get_template_part( 'content', 'product' );
				}
			}

			//  echo do_shortcode( '[products limit="1 columns="1" ids="' . get_sub_field( 'product' ) . '" ]' );
				
			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		} ?>
	</div>

</div>

<?php


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
?>