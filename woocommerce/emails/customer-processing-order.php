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
<p> Hemos recibido tu pedido #<strong><?php printf( esc_html( $order->get_order_number() ) ); ?></strong></p>

<div style="padding-bottom:10px">
	<h2 style="padding:8px 0;">Si tu compra fue con:</h2>
	<div style="padding:8px 0;; color:black">
		<h3 style="font-size:0.9rem; color:black; margin:0 0 6px">Envío Rápido</h3>
		<p style="margin:0 0 15px;">Lima Metropolitana y Callao: Se entregará entre 24 a 72 horas.</p>
		<p style="margin:0 0 15px;">Otras regiones: Se entregará entre 4 a 15 días hábiles según tu <a style="color:black" href="https://skullcandy.com.pe/wp-content/uploads/2022/01/LEAD-TIME-A-NIVEL-NACIONAL.pdf">región.</a></p>
		<a style="color:white; background-color:black; padding:8px 13px; text-decoration:none; margin:0 0 16px" href="https://www.savarexpress.com.pe/rastrea-un-envio/?cod=SKDY<?php echo $order -> get_order_number()?>">Ver pedido</a>
	</div>
	<hr/>
	<div style="padding:8px 0; color:black;">
		<h3 style="font-size:0.9rem; color:black; margin: 0 0 6px">Envío Regular</h3>
		<p style="margin:0 0 15px;">Lima Metropolitana y Callao: Se entregará entre 48 a 72 horas.</p>
		<p style="margin:0 0 15px;">Otras regiones: Se entregará entre 4 a 15 días hábiles (<strong><a href="https://wa.link/xfavry">Consúltanos por tu link de seguimiento</a></strong>).</p>
		<a style="color:white; background-color:black; padding:8px 13px; text-decoration:none;" href="https://www.prime-express.pe/trackstatus/tracking/px-det-op.php?npedido=<?php echo $order -> get_order_number()?>&dni=<?php echo $order->get_meta('billing_id')?>">Ver pedido (SOLO LIMA Y CALLAO)</a>
		<p style="margin:15px 0 2px; font-size:0.8rem; color:gray; font-style:italic;">*Para compras realizadas entre Lunes y Jueves: La página de seguimiento se activará a partir de las 10AM del siguiente día.</p>
		<p style="margin:0 0 2px; font-size:0.8rem; color:gray; font-style:italic;">**Para compras realizadas entre Viernes y Domingo: La página de seguimiento se activará a partir del Lunes siguiente a las 10AM.</p>
	</div>
	<hr/>
	<p><a style="color:black; margin:0 0 10px" href="https://skullcandy.com.pe/envios/">Obtén más información acerca de tu pedido aquí</a></p>
	<p><a style="color:black; margin:0 0 10px" href="https://wa.link/xfavry">Chatea con nosotros</a></p>
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
