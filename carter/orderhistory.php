<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Order History</title>
<link rel="stylesheet" type="text/css" href="style/header.css"/>
</head>
<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<body>
<div class="wrap-header">
                   <header>
                                    
                   <img src="images/logo.png">
                   <div class="greeting" id="greeting" style="width:45%;">
  
  
  <b>Welcome to Virtual Planet.</b>
  <span><?php if(isset($_COOKIE['c_name'])){  
    $cookie = $_COOKIE['c_name'];
    print "Hello " . $cookie . " Welcome Back &nbsp;<a href='http://csills02.com/Web231/TeamProject/Web231/carter/puls/change.php'>Change Password</a>" . " If you are not " . $cookie . " then sign out here" . " <a href='http://csills02.com/Web231/TeamProject/Web231/carter/puls/logout.php'>Sign Out<a/> ";
}
else{
    print "Welcome Guest." . "<a href='http://csills02.com/Web231/TeamProject/Web231/carter/puls/index.php'>Please sign in here<a/>";
    // ### check login start ###
//session_start();
//session_regenerate_id(true); // Generate new session id and delete old (PHP >= 5 only)
//include_once("puls/includes/check.php");
// ### check login end ###
    }?></span></div>
                    <nav>
                	<ul>
                        	<li><a href="xbox1.php">XBox One</a></li>
                            <li><a href="ps4.php">Playstation 4</a></li>
                            <li><a href="pc.php">PC</a></li>
                            <li><a href="3ds.php">Nintendo 3DS</a></li>
                        </ul>
                        
                        
                        
                 </nav>
                 
                 
                 <div id="account">
                 		<ul>
                        	<li><a href="puls/register.php">Create Account</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Cart</a></li>
                        </ul>
                 </div>
                         
                  <div id="searchbar">
 					<form  class="customform l-8 s-12" action="http://google.com/">
                        <div class="s-9"><input type="text" title="Search form" /></div>
                        <div class="s-3"><button type="submit">Search</button></div>
                     </form>
                     </div>
        		  
               
          <!--</div>  -->    
</header>
</div>
<div class="clearboth"></div>
 <?php
 if(isset($_COOKIE['c_name'])){
$accountName = $_COOKIE['c_name'];
echo "<div id='history'>";
echo "<h2 align='center'>Order History for: $accountName</h2>";
echo "</div>";
}else{
	$accountName = 'Guest';
	echo "<div id='history'>";
	echo "<h2 align='center'>Order History for: $accountName</h2>";
	echo "</div>";
}
 
echo "<table align='center' style='border: solid 1px black;'>";
echo "<tr><th>OrderId</th><th>Account Name</th><th>Customer Name</th><th>Customer Email</th><th>Trans ID</th><th>Item Price</th><th>Total Price</th><th>Order Date</th><th>Product Name</th><th>Item Number</th><th>Quantity</th></tr>";
//<th>Product Name</th><th>Item Price</th><th>Item Number</th><th>Quantity</th>
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
    $stmt = $conn->prepare("SELECT orders.orderid, accountname, custname, custemail, transactionid, itemprice, CONCAT('$',totalprice), date_format(orderdate,'%M %D %Y'), prodname, itemnumber, itemqty FROM orders, line_items WHERE orders.orderid = line_items.orderid AND accountname='$accountName'");
    $stmt->execute();
//prodname, CONCAT('$',itemprice), itemnumber, itemqty,

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