<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>3DS Titles</title>
	<link rel="stylesheet" type="text/css" href="css/cart.css"/>
    <link rel="stylesheet" type="text/css" href="style/xbox1.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>


  <div class="wrap-header">
                   <header>                                
                   <a href="index.php"><img height="92" src="/VirtualPlanet/images/Logo.jpg" width="93"></a>
                   <div id="greeting" class="greeting" style="width:45%;">
  
  
  <b>Welcome to Virtual Planet.</b>
  <span><?php if(isset($_COOKIE['c_name'])){  
    $cookie = $_COOKIE['c_name'];
    print "Hello " . $cookie . " Welcome Back &nbsp;<a href='http://csills02.com/Web231/TeamProject/Web231/carter/puls/change.php'>Change Password</a>" . " Or <a href='orderhistory.php'>View Order History.</a>" . " If you are not " . $cookie . " then sign out here" . " <a href='http://csills02.com/Web231/TeamProject/Web231/carter/puls/logout.php'>Sign Out<a/>";
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
                            <li><a href="ps4.php">Play Station 4</a></li>
                            <li><a href="pc.php">PC</a></li>
                            <li><a href="3ds.php">Nintendo 3DS</a></li>
                            <li><a href="rpg.php">RPG</a></li>
                        </ul>
                        
                        
                        
                 </nav>
                 
                 
                 <div id="account">
                 		<ul>
                        	<li><a href="puls/register.php">Create Account</a></li>
                            <li><a href="Game_News.php" TARGET="_blank">News Feed</a></li>
                            <li><a href="VideoPage.html">Top Ten</a></li>
                            <li><a href="view_cart.php">Cart</a></li>
                            <li><a href="contact_us.php">Contact Us</a></li>
                        </ul>
                 </div>
                         
                 
          <!--</div>  -->    
</header>
</div>





<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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

<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT product_code, category, product_name, product_desc, platform, available, product_img_name, price FROM products WHERE platform=\"3DS\" ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
    
    <div class="category">Category: {$obj->category}</div>
    <div class="platform">Platform: {$obj->platform}</div>
    <div class="available">Available: {$obj->available}</div>
	<div class="product-desc">{$obj->product_desc}</div>
	
	Price {$currency}{$obj->price} 
	
	<fieldset>

	
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>    
<!-- Products List End -->
</body>

</html>
     </script>     					
 <footer>
       <p>Thank you for visiting Virtual Planet</p>
       	<p>Created by Team 231 Jason~Carter~Christina~Lisa</p>
      
       </footer>    