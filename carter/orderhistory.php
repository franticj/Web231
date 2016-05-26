<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Order History</title>
<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<body>
<header style="background-color:#000; color:#FFF">
  <h2>Welcome to Virtual Planet. Logo goes here</h2><span><?php if(isset($_COOKIE['c_name'])){  
    $cookie = $_COOKIE['c_name'];
    print "Hello " . $cookie . " Welcome Back &nbsp;<a href='http://csills02.com/Web231/TeamProject/Web231/puls/change.php'>Change Password</a>" . " If you are not " . $cookie . " then sign out here" . " <a href='http://csills02.com/Web231/TeamProject/Web231/puls/logout.php'>Sign Out<a/> ";
}
else{
    print "Welcome Guest." . "<a href='http://csills02.com/Web231/TeamProject/Web231/puls/index.php'>Please sign in here<a/>";
    // ### check login start ###
//session_start();
//session_regenerate_id(true); // Generate new session id and delete old (PHP >= 5 only)
//include_once("puls/includes/check.php");
// ### check login end ###
    }?></span></header>
 <?php
 echo "<h2 align='center'>Order History for: </h2>";
echo "<table align='center' style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Customer Name</th><th>Product Name</th><th>Unit Price</th><th>Ship Address</th><th>Product Code</th><th>Ship Date</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "csillsze";
$password = "Levon252!";
$dbname = "csillsze_virtualplanet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT orderid, custname, prodname, CONCAT('$',itemprice), shipaddress, prodcode, date_format(orderdate,'%M %D %Y') FROM orders");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?> 

<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>Your Shopping Cart</h3>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
		$product_system = $cart_itm["product_system"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$product_name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>

</body>
</html>