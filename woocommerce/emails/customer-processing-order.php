<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<?php /* translators: %s: Order number */ ?>
<p> Hemos recibido tu orden:  #<?php printf( esc_html( $order->get_order_number() ) ); ?></p>

<div>
	<h3>Si tu compra fue con:</h3>

	<div style="padding: 15px; border: 1px solid #000; color:black">
		<p style="font-size:0.9rem; color:black;">Envío Rápido</p>
		<p>Se entregará entre 24 a 72 horas sólo para Lima Metropolitana.</p>
		<a href="https://www.savarexpress.com.pe/rastrea-un-envio/?cod=SKDY<?php echo $order -> get_order_number()?>">Ver pedido</a>
	</div>
	<div style="padding: 15px; border: 1px solid #000; color:black;">
		<p style="font-size:0.9rem; color:black;">Envío Regular</p>
		<p>Se te entregará entre 48 a 72 horas sólo </p>
		<p>*Para compras realizadas entre Lunes y Jueves: La página de seguimiento se activará a partir de las 10AM del siguiente día.</p>
		<p>*Para compras realizadas entre Viernes y Domingo: La página de seguimiento se activará a partir del Lunes siguiente a las 10AM </p>
		<a style="padding" href="https://www.prime-express.pe/trackstatus/tracking/px-det-op.php?npedido=<?php echo $order -> get_order_number()?>&dni=<?php echo $order->get_meta('billing_id')?>">Ver pedido</a>
	</div>
	<a style="padding-top:10px color:black" href="https://skullcandy.com.pe/envios/">OBTÉN MÁS INFORMACIÓN AQUÍ</a></p>
	<a style="padding-top:10px color:black" href="https://wa.link/xfavry">CHATEA CON NOSOTROS AQUÍ</a></p>
</div>


<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
