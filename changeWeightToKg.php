<?php
// Add custom Theme Functions here

// Display the cart item weight in cart and checkout pages
function display_custom_item_data( $cart_item_data, $cart_item ) {
    // Get weight
    $weight = $cart_item['data']->get_weight();

    if ( $weight > 0 ) {
        // Set unit
        $weight_unit = 'kg';

        // Calculate
        $total_weight = $cart_item['quantity'] * $weight;

        if ( $total_weight < 1 ) {
            $total_weight = round(($total_weight * 1000), 2);
            $weight_unit = 'g'; // Change unit
        }

        $cart_item_data[] = array(
            'name' => __( 'Weight subtotal', 'woocommerce' ),
            'value' =>  $total_weight . ' ' . $weight_unit,
        );
    }
    return $cart_item_data;
}
add_filter( 'woocommerce_get_item_data', 'display_custom_item_data', 10, 2 );

// Save and Display the order item weight (everywhere)
function display_order_item_data( $item, $cart_item_key, $values, $order ) {
    // Get weight
    $weight = $values['data']->get_weight();

    if ( $weight > 0 ) {
        // Set unit
        $weight_unit = 'kg';

        // Calculate
        $total_weight = $item['quantity'] * $weight;

        if ( $total_weight <= 1 ) {
            $total_weight = round(($total_weight * 1000), 2);
            $weight_unit = 'g'; // Change unit
        }       

        $item->update_meta_data( __( 'Weight subtotal', 'woocommerce' ), ( $total_weight )  . ' ' . $weight_unit );
    }
}
add_action( 'woocommerce_checkout_create_order_line_item', 'display_order_item_data', 20, 4 );
