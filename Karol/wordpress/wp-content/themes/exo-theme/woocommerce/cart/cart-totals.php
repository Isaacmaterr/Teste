<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="cart_totals-wrap <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<div class="cart-totals-shipping">
		<h3><?php _e( 'Calculate Shipping', 'woocommerce' ); ?></h3>
		<?php woocommerce_shipping_calculator(); ?>
	</div>

	<div class="cart-totals-inner">
		<h3><?php _e( 'Cart Totals', 'woocommerce' ); ?></h3>
		<div class="cart-subtotal-wrap">
			<span class="label"><?php _e( 'Subtotal', 'woocommerce' ); ?></span>
			<?php wc_cart_totals_subtotal_html(); ?>	
		</div>
		<div class="cart-shipping-info">
			<?php
				echo '<span class="label">'. __('Shipping and Handling', THEMENAME) .'</span>';
				echo '<span class="package">'. WC()->cart->get_cart_shipping_total() .'</span>';
			?>
		</div>
		<div class="cart-total-order">
			<span class="label"><?php _e( 'Total', 'woocommerce' ); ?></span>
			<?php wc_cart_totals_order_total_html(); ?>
		</div>

	</div>


	<?php if ( WC()->cart->get_cart_tax() ) : ?>
		<p><small><?php

			$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
				? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
				: '';

			printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

		?></small></p>
	<?php endif; ?>

	

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
