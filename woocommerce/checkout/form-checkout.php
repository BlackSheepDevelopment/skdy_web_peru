<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );

	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

    <div class="order_review_container">
        <div class="order_review__main">
            <p class="order-review__general-title">VER PEDIDO</p>
            <div class="order-review__toggle">
                <a href="#" id="see-more">
                    <button class="order-review__toggle__btn">+</button>
                </a>
            </div>
        </div>

        <div id="order_review" class="woocommerce-checkout-review-order order-review--hidable">
            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>        
        </div>
    </div>



	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>


        <div class="checkout-steps">
            <div class="checkout-steps__step checkout-steps__step--info">
                <div class="checkout-steps__number">1</div>
                <div class="checkout-steps__title">INFORMACIÓN DE CONTACTO</div>
            </div>

            <div class="checkout-steps__step checkout-steps__step--envio">
                <div class="checkout-steps__number">2</div>
                <div class="checkout-steps__title">ENVÍO</div>
            </div>

            <div class="checkout-steps__step checkout-steps__step--pago">
                <div class="checkout-steps__number">3</div>
                <div class="checkout-steps__title">Pago</div>
            </div>



        </div>


        <div class="col2-set" id="customer_details">
            <div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
            </div>

            
        </div>

        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

 


</form>


<div class="nav-steps">
        <a href="#" id="prev-step">Anterior</a>
        <a href="#" id="next-step">Continuar</a>
    </div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
