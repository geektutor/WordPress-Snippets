/* This snippet allows me to add a picture to the cart page that is beside the pricing calculator. Useful for when you want to display a message there. Check image cart-beside.png to see an example.

Usage: Simply chamge what is in the echo to what you want to show
*/

add_action( 'woocommerce_cart_collaterals', 'processG', 10 );
function processG() {
echo '<img src="#" width="50%"/>';
}


