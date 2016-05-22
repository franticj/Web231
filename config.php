<?php
$currency = '$'; //Currency Character or code

//MySql 
$db_username 	= 'jturneon';
$db_password 	= 'Z11n6jfh?';
$db_name 		= 'jturneon_virtualcart';
$db_host 		= 'localhost';

//paypal settings
$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'franticj-facilitator_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword 		= 'HHY34955KW38LM4W'; //Paypal API password
$PayPalApiSignature 	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31A3TgtA9BwRSLKIyees6-DZ36bZHF'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://www.jturne14.com/VirtualPlanet/paypal-express-checkout/'; //Point to paypal-express-checkout page
$PayPalCancelURL 		= 'http://www.jturne14.com/VirtualPlanet/paypal-express-checkout/cancel_url.html'; //Cancel URL if user clicks cancel

//Additional taxes and fees											
$HandalingCost 		= 0.00;  //Handling cost for the order.
$InsuranceCost 		= 0.00;  //shipping insurance cost for the order.
$shipping_cost      = 1.50; //shipping cost
$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
$taxes              = array( //List your Taxes percent here.
                            
                            'Tax' => 5
                            );

//connection to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
