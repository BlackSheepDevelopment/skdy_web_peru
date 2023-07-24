<?php

require dirname( __FILE__ ) . '/post-types/mood.php';
define('WC_TEMPLATE_DEBUG_MODE', true);


function theme_support() {
	add_theme_support( 'post-thumbnails' );

	$logo_width  = 120;
	$logo_height = 90;

	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_theme_support( 'title-tag' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'script',
			'style',
			'comment-list',
			'comment-form'
		)
	);

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'align-wide' );

	load_theme_textdomain( 'blacksheep' );
}

add_action( 'after_setup_theme', 'theme_support' );


/* Register menus */
function register_menus() {
	register_nav_menus(
		array(
			'head-menu'   => __( 'Head Menu' ),
			'home-menu'   => __( 'Home Menu' ),
			'shop-menu'   => __( 'Shop Menu' ),
			'mobile-menu' => __( 'Mobile Menu' )
		)
	);
}

add_action( 'init', 'register_menus' );


/* Load assets */
function load_assets( $entries ) {
	$assets = file_get_contents( get_stylesheet_directory() . '/assets.json' );
	$assets = json_decode( $assets );

	foreach ( $assets as $chunk => $files ) {
		foreach ( $entries as $entry ) {
			if ( $chunk == $entry ) {
				foreach ( $files as $type => $asset ) {
					switch ( $type ) {
						case 'js':
							wp_enqueue_script( $chunk, get_stylesheet_directory_uri() . '/dist/' . $asset, array(), false, true );
							break;
						case 'css':
							wp_enqueue_style( $chunk, get_stylesheet_directory_uri() . '/dist/' . $asset );
					}
				}
			}
		}
	}
}

/**
 * Remove actions
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );


/* Prevent scale big images */
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'jpeg_quality', function ( $arg ) {
	return 90;
} );


/**
 * Remove admin bar in mobile
 */
add_filter( 'show_admin_bar', '__return_false' );


/**
 * Change separator
 * @return string
 */
function custom_document_title_separator() {
	return '|';
}

add_filter( 'document_title_separator', 'custom_document_title_separator', 10, 1 );

/**
 * Options page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => __( 'Configuración', 'skullcandy' ),
		'position'   => 59.3,
		'menu_slug'  => 'theme-settings',
		'icon_url'   => 'dashicons-admin-customizer'
	) );

	acf_add_options_sub_page( array(
		'page_title'  => __( 'General', 'skullcandy' ),
		'menu_title'  => __( 'General', 'skullcandy' ),
		'menu_slug'   => 'general-settings',
		'post_id'     => 'general',
		'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
		'page_title'  => __( 'Mega Menu', 'skullcandy' ),
		'menu_title'  => __( 'Mega Menu', 'skullcandy' ),
		'menu_slug'   => 'mega-menu-settings',
		'post_id'     => 'mega_menu',
		'parent_slug' => 'theme-settings'
	) );

	acf_add_options_sub_page( array(
		'page_title'  => __( 'Footer', 'skullcandy' ),
		'menu_title'  => __( 'Footer', 'skullcandy' ),
		'menu_slug'   => 'footer-settings',
		'post_id'     => 'footer',
		'parent_slug' => 'theme-settings'
	) );

}

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
	return array();
}

/**
 * Added thumbnails for product swatches
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'show_variations_thumbnails', 20 );
function show_variations_thumbnails() {
	global $product;

	if ( $product->is_type( 'variable' ) ) :
		$variations = $product->get_available_variations();
		$count = 0;
		$additional = 0; ?>
        <div class="list-swatches">
			<?php foreach ( $variations as $variation ) :
				$count ++;
				$name = $variation['attributes']['attribute_color'];
				if ( $count <= 5 ): ?>
                    <a class="swatch-link"
                       href="<?php echo $product->get_permalink(); ?>?attribute_color=<?php echo $name ?>">
                        <img src="<?php echo $variation['image']['url'] ?>"
                             alt="<?php echo $name; ?>"
                             title="<?php echo $name; ?>">
                    </a>
				<?php else:
					$additional ++;
				endif; ?>
			<?php endforeach;
			if ( $additional > 0 ): ?>
                <div class="additional">
                    +<?php echo $additional; ?>
                    <br>
					<?php _e( 'Más', 'skullcandy' ) ?>
                </div>
			<?php endif; ?>
        </div>
	<?php endif;
}

/* 
	Add banner to Woocomerce Shop Page
	Date: 05/07 Author: Raúl Escandón
*/

add_action('woocommerce_before_main_content','banner_menu_shop');
function banner_menu_shop(){
	$shop_id = get_option( 'woocommerce_shop_page_id' );
	$image = get_field('banner_shop', $shop_id);
	?>

	<?php if(is_shop()):?>
		<?php if($image):?>
			<div class="banner_menu_shop">
				<img class="banner_menu_shop__img" src="<?php echo $image['url']; ?>" />
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php
}

/**
 * Added to woocommerce_before_shop_loop
 */
add_action( 'woocommerce_before_shop_loop', 'bar_menu_shop', 10 );
function bar_menu_shop() {
	$shop_id = get_option( 'woocommerce_shop_page_id' ); ?>

    <div id="bar-menu">
		<?php if ( is_search() ):
			global $wp_query; ?>
            <div class="category-link">
                <a href="#" class="btn-link count selected disabled">
                    <span></span>
                    <span><?php _e( 'Productos', 'skullcandy' ) ?></span>
                    <span><?php echo $wp_query->found_posts ?></span>
                </a>
            </div>
            <div class="category-link">
                <a href="#" class="btn-link count">
                    <span></span>
                    <span><?php _e( 'Soporte', 'skullcandy' ) ?></span>
                    <span>1</span>
                </a>
            </div>
		<?php else: ?>
			<select class="category-link"   onchange="javascript:location.href = this.value;">
			<?php while ( have_rows( 'bar_menu', $shop_id ) ):
				the_row();
				$link = get_sub_field( 'link' );
				?>
                    <option value="<?php echo $link['url']?>" class="btn-link"><?php echo $link['title'] ?></option>
			<?php endwhile;?>
			</select>
			<?php woocommerce_catalog_ordering(); ?>
		<?php endif; ?>
    </div>
<?php }


/**
 * Product header
 */

// Add product header
add_action( 'woocommerce_before_single_product_summary', 'product_header_before', 0 );
function product_header_before() {
	$layout = get_query_var( 'LAYOUT' ); ?>
    <div id="product-header">
		<?php if ( $layout == 'layout-1' ): ?>
            <div class="background">
                <picture>
                    <source srcset="" media="(min-width: 551px)"/>
                    <img src="<?php echo get_stylesheet_directory_uri() . '/uploads/placeholder.png' ?>"
                         alt="<?php the_title() ?>">
                </picture>
            </div>
            <div class="overlay"></div>
		<?php endif; ?>
		<?php if ( $layout == 'layout-2' ): ?>
            <div class="background-slider"></div>
		<?php endif; ?>
        <div class="container">
			<?php }

			// Close product header
			add_action( 'woocommerce_after_single_product_summary', 'product_header_after', 0 );
			function product_header_after() { ?>
        </div> <!-- End container -->
    </div> <!-- End product-header -->
<?php }

// Add custom fields in summary
add_action( 'woocommerce_single_product_summary', 'product_header_title', 4 );
function product_header_title() {
	$header = get_field( 'header' ); ?>
    <div class="header-container">
        <h2 class="header-title"><?php echo $header['title']; ?></h2>
		<?php }

		add_action( 'woocommerce_single_product_summary', 'product_custom_name', 5 );
		function product_custom_name() {
			$product_name = get_field( 'product_name' ); ?>
            <h1 class="product-name">
                <span class="desktop"><?php echo $product_name['desktop'] ?></span>
                <span class="mobile"><?php echo $product_name['mobile'] ?></span>
            </h1>
		<?php }

		add_action( 'woocommerce_single_product_summary', 'close_header_container', 11 );
		function close_header_container() { ?>
    </div>
<?php }

add_action( 'woocommerce_single_product_summary', 'variation_grid', 25 );
function variation_grid() {
	global $product;

	if ( $product->is_type( 'variable' ) && get_query_var( 'LAYOUT' ) == 'layout-2' ) :
		$variations = $product->get_available_variations(); ?>
        <div class="list-swatches">
			<?php foreach ( $variations as $variation ) :
				$name = $variation['attributes']['attribute_color']; ?>
                <div class="swatch" data-color="<?php echo $name ?>">
                    <img src="<?php echo $variation['image']['url'] ?>" alt="<?php echo $name; ?>"
                         title="<?php echo $name; ?>">
                    <span><?php echo $name ?></span>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif;
}

add_action( 'woocommerce_single_product_summary', 'product_tech_specs', 55 );
function product_tech_specs() {
	if ( get_query_var( 'LAYOUT' ) == 'layout-2' ): ?>
		<?php if ( have_rows( 'tech_specs' ) ): ?>
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
		<?php if ( get_field( 'more_tech_specs' ) ): ?>
            <div class="more-tech-specs">
                <div class="title"><?php _e( 'Más especificaciones', 'skullcandy' ) ?></div>
                <div class="text"><?php the_field( 'more_tech_specs' ); ?></div>
            </div>
		<?php endif; ?>
	<?php endif;
}

add_action( 'woocommerce_single_product_summary', 'product_extra_links', 50 );
function product_extra_links() {
	$product_notice = get_field( 'product_notice', 'general' );
	if ( $product_notice ): ?>
        <div class="product-notice"><?php echo $product_notice ?></div>
	<?php endif; ?>
	<?php $layout = get_query_var( 'LAYOUT' );
	if ( $layout == 'layout-1' ): ?>
        <div class="extra-links">
            <form action="<?php the_permalink( get_page_by_path( 'comparar' ) ); ?>" method="post"
                  class="add-to-compare">
                <input type="hidden" name="product_id" value="<?php echo get_the_ID() ?>">
				<?php wp_nonce_field() ?>
                <button><?php _e( 'Añadir para comparar', 'skullcandy' ) ?></button>
            </form>
            <a href="#reviews">
                <span><?php _e( 'Opiniones', 'skullcandy' ) ?></span>
            </a>
        </div>
	<?php endif; ?>
	<?php
}

add_action( 'woocommerce_after_single_product_summary', 'product_storytelling', 5 );
function product_storytelling() {
	get_template_part( 'content/product', 'storytelling' );

	if ( get_query_var( 'LAYOUT' ) == 'layout-1' ) {
		get_template_part( 'content/product', 'box-info' );
	}

	comments_template();
}

/**
 * Custom review form
 */
add_filter( 'woocommerce_reviews_title', 'change_reviews_title' );
function change_reviews_title( $reviews_title ) {
	return __( 'Opiniones', 'skullcandy' );
}

add_filter( 'woocommerce_product_review_comment_form_args', 'change_submit_button' );
function change_submit_button( $review_form ) {
	$review_form['submit_button'] = '<button name="%1$s" id="%2$s" class="%3$s">%4$s</button>';
	$review_form['title_reply']   = '<button id="add-review">' . __( 'Escribe tu opinión', 'skullcandy' ) . '</button>';

	return $review_form;
}

/**
 * Add select2 to color swatch
 */

add_action( 'wp', 'color_swatch' );
function color_swatch() {
	if ( is_product() ) {
		if ( ! wp_script_is( 'select2', 'enqueued' ) ) {
			wp_enqueue_script( 'select2', WC()->plugin_url() . '/assets/js/select2/select2.full.min.js', [ 'jquery' ] );
		}

		if ( ! wp_style_is( 'select2', 'enqueued' ) ) {
			wp_enqueue_style( 'select2', WC()->plugin_url() . '/assets/css/select2.css', [] );
		}

		wp_enqueue_script( 'woo-select2', get_template_directory_uri() . '/extra/woo-variations-select2.js', [
			'jquery',
			'select2'
		] );
	}
}

/**
 * Change search title
 */
add_filter( 'woocommerce_page_title', 'custom_search_title' );
function custom_search_title( $page_title ) {
	if ( is_search() ) {
		$page_title = sprintf( __( 'Resultado de la búsqueda para &apos;%s&apos;', 'skullcandy' ), get_search_query() );
	}

	return $page_title;
}

/**
 * Strong password level
 * 3 => Strong (default) | 2 => Medium | 1 => Weak | 0 => Very Weak (anything).
 */
add_filter( 'woocommerce_min_password_strength', 'reduce_min_strength_password_requirement' );
function reduce_min_strength_password_requirement( $strength ) {
	return 1;
}

/**
 * Get my account url
 */
function get_account_url() {
	$page_id = get_option( 'woocommerce_myaccount_page_id' );

	if ( $page_id ) {
		return get_permalink( $page_id );
	}

	return false;
}

/**
 * Product is added
 */
add_filter( 'wp_footer', 'product_is_added', 200 );
function product_is_added() {
	if ( is_product() ) {
		$added = filter_input( INPUT_POST, 'add-to-cart' );
		if ( ! is_null( $added ) ) { ?>
            <script>
                jQuery(document).ready(function () {
                    window.show_mini_cart();
                });
            </script>
		<?php }
	}
}

/**
 * Add product thumbnail in checkout page
 */
add_filter( 'woocommerce_cart_item_name', 'ts_product_image_on_checkout', 10, 3 );
function ts_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {
	if ( ! is_checkout() ) {
		return $name;
	}

	$_product  = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$thumbnail = $_product->get_image();

	$image = '<div class="product-image">' . $thumbnail . '</div>';

	return $image . '<div class="product-title">' . $name . '</div>';
}

add_filter( 'woocommerce_order_item_name', 'ts_product_image_on_order', 10, 3 );
function ts_product_image_on_order( $name, $item ) {

	$_product  = $item->get_product();
	$thumbnail = $_product->get_image();

	$image = '<div class="product-image">' . $thumbnail . '</div>';

	return $image . '<div class="product-title">' . $name . '</div>';
}

/**
 * Remove dashboard tab in my accoutn
 */
add_filter( 'woocommerce_account_menu_items', 'account_menu_items_callback' );
function account_menu_items_callback( $items ) {
	foreach ( $items as $key => $item ) {
		unset( $items[ $key ] );
		break;
	}

	return $items;
}

/**
 * Redirect to order in my account
 */
add_action( 'template_redirect', 'template_redirect_callback' );
function template_redirect_callback() {
	if ( is_account_page() && is_user_logged_in() && ! is_wc_endpoint_url() ) {
		$first_myaccount_endpoint = 'orders';
		wp_redirect( wc_get_account_endpoint_url( $first_myaccount_endpoint ) );
	}
}

/**
 * Get last mood
 */
function get_last_mood() {
	$post = get_posts( array(
		'post_status' => 'publish',
		'numberposts' => 1,
		'post_type'   => 'mood'
	) );

	return get_the_permalink( $post[0]->ID );
}

/*
 * Replace WooCommerce Default Pagination with WP-PageNavi Pagination
 */
add_action( 'woocommerce_pagination_args', 'custom_woocommerce_pagination', 10 );
function custom_woocommerce_pagination( $args ) {
	$args['prev_text'] = __( 'Anterior', 'skullcandy' );
	$args['next_text'] = __( 'Siguiente', 'skullcandy' );

	return $args;
}

/*
 * Add class for product layout
 */
add_filter( 'body_class', function ( $classes ) {
	$layout = get_query_var( 'LAYOUT' );

	if ( $layout ) {
		return array_merge( $classes, array( $layout ) );
	}

	return $classes;
} );


/*
 * Customization shipping
 */
function get_location_config( $term ) {
	$config = get_field( 'config', 'visits' );
	foreach ( $config as $c ) {
		if ( $c['location'] == $term ) {
			return $c;
		}
	}

	return null;
}

add_action( 'wp_ajax_nopriv_availability', 'availability_date' );
add_action( 'wp_ajax_availability', 'availability_date' );
function availability_date() {
	$_date    = filter_input( INPUT_GET, 'date' );
	$date     = new DateTime( $_date );
	$term     = filter_input( INPUT_GET, 'term' );
	$config   = get_location_config( $term );
	$day      = $config[ 'day_' . $date->format( 'N' ) ];
	$hours    = $day['business_hour'];
	$_start   = $date->format( 'Y-m-d' ) . ' ' . $hours['start_hour'];
	$_end     = $date->format( 'Y-m-d' ) . ' ' . $hours['end_hour'];
	$period   = new DatePeriod(
		new DateTime( $_start ), new DateInterval( 'PT1H' ), new DateTime( $_end )
	);
	$response = [];

	if ( $day['enabled'] ) {
		foreach ( $period as $value ) {
			$hour = $value->format( 'H:i' );

			if ( $value->format( 'Y-m-d H:i:s' ) > current_time( 'Y-m-d H:i:s' ) ) {
				$_orders = get_posts( array(
					'post_type'      => 'shop_order',
					'posts_per_page' => - 1,
					'post_status'    => array( 'wc-pending', 'wc-processing', 'wc-on-hold', 'wc-completed' ),
					'meta_query'     => array(
						'relation' => 'AND',
						array(
							'key'     => 'visit_hour',
							'value'   => $value->format( 'H:i:s' ),
							'compare' => '=',
						),
						array(
							'key'     => 'visit_date',
							'value'   => $date->format( 'Ymd' ),
							'compare' => '=',
						),
					),
				) );
				$total   = 0;
				foreach ( $_orders as $_order ) {
					$order = wc_get_order( $_order->ID );
					foreach ( $order->get_items() as $item ) {
						$item_id = $item->get_id();
					}
					$result = wc_get_order_item_meta( $item_id, 'Location' );
					if ( ! empty( $result ) ) {
						$location_term_id = get_term_by( 'name', $result, 'locations' )->term_id;
					} else {
						$location_term_id = null;
					}
					if ( $location_term_id == $term ) {
						$total ++;
					}
				}
				$available = $day['capacity_per_hour'] - $total;
			} else {
				$available = 0;
			}
			$response[] = [
				'hour'      => $hour,
				'available' => $available
			];
		}
	}

	wp_send_json( $response );
}

//add_action( 'woocommerce_review_order_after_shipping', 'visit_location_row_layout' );
function visit_location_row_layout() {
	if ( is_wcmlim_chosen_shipping_method() ): ?>
        <tr class="visit-location">
            <th>Fecha y hora</th>
            <td data-title="Fecha y hora">
                <input type="date" name="visit-date" id="visit-date" min="<?php echo current_time( 'Y-m-d' ) ?>">
                <select name="visit-hour" id="visit-hour">
                    <option disabled selected>Seleccione fecha</option>
                </select>
            </td>
        </tr>
	<?php endif;
}

add_action( 'woocommerce_checkout_update_order_meta', 'pickup_location_checkout_field_update_order_meta', 10, 2 );
function pickup_location_checkout_field_update_order_meta( $order_id, $data ) {
	$visit_date = filter_input( INPUT_POST, 'visit-date' );
	$visit_hour = filter_input( INPUT_POST, 'visit-hour' );

	if ( ! empty( $visit_date ) && ! empty( $visit_hour ) ) {
		$date = new DateTime( $visit_date );
		$hour = new DateTime( $visit_hour );
		update_field( 'field_618c812081bc2', $date->format( 'Ymd' ), $order_id );
		update_field( 'field_618c813b81bc3', $hour->format( 'H:i:s' ), $order_id );
	}
}

/*
 * Savar
 */
add_action( 'wp_footer', 'visit_location_script' );
function visit_location_script() { ?>
    <script>
		const text = `
		<div class="more-notice">
			<p class="more-notice__text">Envío Rápido hasta agotar stock. Si no hay Envío Rápido cambia a Envío Regular automáticamente.</p>
			<a class="more-notice__check" href="${<?php echo home_url('/envios'); ?>}">
				<button class="more-notice__button">
					REVISA AQUÍ ANTES DE COMPRAR
				</button>
			</a> 
		</div>`;
		jQuery('.product-notice').html(text);
        window.original_shop_notice = jQuery('.product-notice').text();

        function showProductNotice() {
            const _class = jQuery('#select_location option:selected').attr('class');
			// const text = '<p class="more-notice" >Envío Rápido hasta agotar stock. Si no hay Envío Rápido cambia a Envío Regular en el checkout. <a class="more-notice__check" href="https://skullcandy.com.pe/legales" target="_blank">REVISA AQUÍ ANTES DE COMPRAR</a> </p>'
			// jQuery('.product-notice').html(text);
        }

        jQuery('#select_location').change(function () {
            showProductNotice();
        });
        jQuery(document).ajaxStop(function () {
            showProductNotice();
        });
        jQuery(document).ready(function () {
			jQuery('.product-notice').html(text);
			if (window.province_selector_init) {
	            window.province_selector_init();
			}

            jQuery('#billing_city').on('change', function () {
                const district = jQuery(this).val().split(' - ')[1];
                jQuery('#billing_district').val(district);

                window.update_province_selector();
            });
        });
        window.update_color = function (color) {
            jQuery('#color').val(color).trigger('change');
        }
        jQuery('form.woocommerce-checkout').on('change', '#visit-date, #wcmlim_pickup', function () {
            const val = jQuery('#visit-date').val();
            const ter = jQuery('#wcmlim_pickup option:checked').data('termid');
            const selector = jQuery('.visit-location select');
            jQuery.ajax({
                url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
                data: {
                    'action': 'availability',
                    'term': ter,
                    'date': val
                },
                beforeSend: function () {
                    selector.find('option').text('Cargando');
                },
                success: function (resp) {
                    selector.empty();
                    selector.append('<option disabled selected>Hora</option>');
                    resp.forEach(function (item) {
                        if (item['available'] > 0) {
                            selector.append('<option value="' + item['hour'] + '">' + item['hour'] + '</option>');
                        } else {
                            selector.append('<option disabled>' + item['hour'] + '</option>');
                        }
                    });
                }
            });
        })
    </script>
<?php }

add_action( 'woocommerce_checkout_update_order_meta', 'update_district', 1, 1 );
function update_district( $order_id ) {
	$order = wc_get_order( $order_id );
	$city  = explode( ' - ', $order->get_billing_city() );
	if ( empty( get_post_meta( $order_id, '_billing_district', true ) ) ) {
		update_post_meta( $order_id, '_billing_district', isset( $city[1] ) ? $city[1] : 'Distrito' );
	}
}

add_action( 'woocommerce_init', 'shipping_instance_form_fields_filters' );
function shipping_instance_form_fields_filters() {
	$shipping_methods = WC()->shipping->get_shipping_methods();
	foreach ( $shipping_methods as $shipping_method ) {
		add_filter( 'woocommerce_shipping_instance_form_fields_' . $shipping_method->id, 'shipping_instance_form_add_extra_fields' );
	}
}

function shipping_instance_form_add_extra_fields( $settings ) {
	$settings['send_savar'] = [
		'title' => 'Savar',
		'type'  => 'checkbox',
		'label' => 'Habilitar envío a Savar.'
	];

	return $settings;
}

function savar_auth() {
	$data_auth = array( 'UserName' => '2051947851101', 'Password' => '20519478511' );
	$curl      = curl_init();
	curl_setopt_array( $curl, array(
		CURLOPT_URL            => "https://www.savarapi.com.pe/wms/login/authenticate",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING       => "",
		CURLOPT_MAXREDIRS      => 10,
		CURLOPT_TIMEOUT        => 30,
		CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_0,
		CURLOPT_CUSTOMREQUEST  => "POST",
		CURLOPT_POSTFIELDS     => json_encode( $data_auth ),
		CURLOPT_HTTPHEADER     => array(
			"accept: application/json",
			"content-type: application/json"
		),
	) );
	$response = curl_exec( $curl );
	curl_close( $curl );

	return json_decode( $response, true );
}

add_action( 'woocommerce_order_status_changed', 'savar_fulfillment_changed', 1, 3 );
function savar_fulfillment_changed( $order_id, $status_old, $status ) {
	$order      = wc_get_order( $order_id );
	$send_savar = 'no';

	foreach ( $order->get_shipping_methods() as $shipping_method ) {
		$options = get_option( 'woocommerce_' . $shipping_method->get_method_id() . '_' . $shipping_method->get_instance_id() . '_settings' );
		if ( isset( $options['send_savar'] ) ) {
			$send_savar = $options['send_savar'];
		}
	}

	if ( $status == 'processing' && $send_savar == 'yes' ) {
		$date = $order->get_date_created();
		if ( (int) $date->format( 'N' ) == 6 ) {
			$date->modify( '+2 days' );
		} else {
			$date->modify( '+1 days' );
		}
		$country  = $order->get_billing_country();
		$state    = $order->get_billing_state();
		$state    = WC()->countries->get_states( $country )[ $state ];
		$city     = explode( ' - ', $order->get_billing_city() );
		$district = $state . '|' . $city[0] . '|' . $city[1];
		$items    = [];
		$idx      = 1;
		foreach ( $order->get_items() as $item_id => $item ) {
			$product = $item->get_product();
			$items[] = array(
				'NroItem'     => $idx,
				'Sku'         => $product->get_sku(),
				'Descripcion' => $product->get_name(),
				'Cantidad'    => $item->get_quantity(),
				'Precio'      => $product->get_price()
			);
			$idx ++;
		}

		$body = array(
			'IdAlmacen'  => 'WH2',
			'IdBodega'   => '38',
			'IdCuenta'   => 'BLACKSHEEP',
			'UsuarioReg' => '2051947851101',
			'pedidos'    => array(
				array(
					'NroPedido'     => 'SKDY' . $order->get_id(),
					'SubServicio'   => 'Next Day',
					'TipoPago'      => 'PREPAGADO',
					'Consignatario' => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
					'LugarDespacho' => $order->get_billing_address_2(),
					'Direccion'     => $order->get_billing_address_1(),
					'Distrito'      => $district,
					'Descuento'     => 0,
					'ImpEnvio'      => 0,
					'FechaDespacho' => $date->format( 'Y-m-d' ),
					'Ecommerce'     => 'BLACKSHEEP',
					'TlfCliente'    => $order->get_billing_phone(),
					'EmailCliente'  => $order->get_billing_email(),
					'DocCliente'    => get_post_meta( $order->get_id(), '_billing_id', true ),
					'Items'         => $items
				)
			)
		);

		$auth = savar_auth();
		$curl = curl_init();
		curl_setopt_array( $curl, array(
			CURLOPT_URL            => "https://www.savarapi.com.pe/wms/pedidos/registrar2",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_0,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => json_encode( $body ),
			CURLOPT_HTTPHEADER     => array(
				"accept: application/json",
				"content-type: application/json",
				"authorization: Bearer " . $auth['token']
			),
		) );
		$response = curl_exec( $curl );
		$response = json_decode( $response, true );
		update_field( 'savar_request', json_encode( $body ), $order->get_id() );
		update_field( 'savar_response', json_encode( $response ), $order->get_id() );

		if ( isset( $response[0]['Success'] ) ) {
			if ( ! $response[0]['Success'] ) {
				error_log( json_encode( $body ) );
				error_log( json_encode( $response ) );

				if ( $status_old == 'retry' ) {
					update_field( 'savar_status', 'failed', $order->get_id() );
					$to      = array(
						'mauricio@blacksheep.com.pe',
						'juliocuellar@blacksheep.com.pe'
					);
					$message = 'La orden #' . $order->get_id() . ' no ha podido ser enviada a Savar. Error: ' . json_encode( $response );
					wp_mail( $to, 'Error al enviar a Savar', $message );
				} else {
					update_field( 'savar_status', 'retry', $order->get_id() );
				}
			} else {
				update_field( 'savar_status', 'accepted', $order->get_id() );
			}
		} else {
			update_field( 'savar_status', 'retry', $order->get_id() );
			$to      = array(
				'mauricio@blacksheep.com.pe',
				'juliocuellar@blacksheep.com.pe'
			);
			$message = 'La orden #' . $order->get_id() . ' no obtuvo una respuesta. Error: ' . json_encode( $response );
			wp_mail( $to, 'Error al enviar a Savar', $message );
		}
	}
}

add_action( 'woocommerce_after_checkout_validation', 'validate_document', 10, 2 );
function validate_document( $fields, $errors ) {

	$document = $fields['billing_id'];
	$type     = substr( $document, 0, 2 );
	$types    = array( '10', '20' );
	if ( $fields['billing_invoice'] == 'Boleta' && strlen( $document ) != 8 ) {
		$errors->add( 'validation', 'El número de documento debe tener 8 dígitos.' );
	} else if ( $fields['billing_invoice'] == 'Factura' && ( strlen( $document ) != 11 || ! in_array( $type, $types ) ) ) {
		$errors->add( 'validation', 'El ruc debe tener 11 dígitos y comenzar con 10 o 20.' );
	}

}


/*
* Cron
*/
add_filter( 'cron_schedules', 'every_five_minutes' );
function every_five_minutes( $schedules ) {
	$schedules['five_minutes'] = array(
		'interval' => 5 * 60,
		'display'  => esc_html__( 'Every Five Minutes' ),
	);

	return $schedules;
}

if ( ! wp_next_scheduled( 'cron_savar' ) ) {
	wp_schedule_event( time(), 'five_minutes', 'cron_savar' );
}

add_action( 'cron_savar', 'cron_savar_exec' );
function cron_savar_exec() {
	$posts = wc_get_orders( [
		'limit'      => - 1,
		'meta_key'   => 'savar_status',
		'meta_value' => 'retry'
	] );

	foreach ( $posts as $post ) {
		savar_fulfillment_changed( $post->get_id(), 'retry', 'processing' );
	}

}


/*
 * Dev
 */
add_filter( 'wp_get_attachment_url', 'attachments_in_dev', 10, 2 );
function attachments_in_dev( $url, $attachment_id ) {
	$parse           = parse_url( $url );
	$date            = new Datetime( '2021-08-20 23:00:00' );
	$attachment_date = get_post_time( 'Y-m-d', true, $attachment_id );

	if ( $date > new DateTime( $attachment_date ) ) {
		return str_replace( $parse['host'], 'skullcandy.com.pe', $url );
	} else {
		return $url;
	}
}

add_filter( 'wp_calculate_image_srcset', 'calculate_image_srcset_dev', 10, 5 );
function calculate_image_srcset_dev( $sources, $size_array, $image_src, $image_meta, $attachment_id ) {
	if ( ! is_admin() ) {
		$images          = [];
		$date            = new Datetime( '2021-08-20 23:00:00' );
		$attachment_date = get_post_time( 'Y-m-d', true, $attachment_id );

		foreach ( $sources as $source ) {
			if ( $date > new DateTime( $attachment_date ) ) {
				$parse = parse_url( $source['url'] );
				$src   = str_replace( $parse['host'], 'skullcandy.com.pe', $source['url'] );
			} else {
				$src = $source['url'];
			}
			$images[] = [
				'url'        => $src,
				'descriptor' => $source['descriptor'],
				'value'      => $source['value']
			];
		}

		return $images;
	}

	return $sources;
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
remove_action( 'woocommerce_output_all_notices', 'woocommerce_output_all_notices', 10 );

remove_action( 'woocommerce_before_checkout_payment', 'woocommerce_checkout_payment',20 );
remove_action( 'woocommerce_before_review_order_payment', 'woocommerce_review_order_payment',20 );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );

add_action( 'woocommerce_after_checkout_form', 'woocommerce_output_all_notices', 10 );

// New functionality
add_action( 'woocommerce_review_order_after_order_total','woocommerce_checkout_coupon_form',10);

add_action( 'woocommerce_checkout_after_customer_details','woocommerce_checkout_payment',10);
add_action('woocommerce_checkout_before_order_review', 'woocommerce_order_review',10);

/* Ocultar el botón de oferta/rebajado */
add_filter( 'woocommerce_sale_flash', 'ayudawp_quitar_oferta' );
function ayudawp_quitar_oferta( $sale_badge ){
return '';
}

if ( !function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification() {}
}

// COMPLETE FUNCTIONALITY WITHOUTH TYPE OF SHIPMENT