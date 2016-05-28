 <?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>




<!DOCTYPE html>

  <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title> Virtual Planet </title>
                        
                        <style type="text/css">

body {
	
	margin: 0 auto;
}


header {
	text-align: center;
	position: fixed;
    top: 0;
    width: 100%;
	
}

header img {
	float:left;
}

* {
	font-family: "Arial Black", Gadget, sans-serif;
	color: #e2e2e2;
	text-align: center;
}

main {
	overflow: auto;
}


nav, section, aside, footer, #feature {
	display:block;
}

nav, footer {
 	background-color: #252525;
    padding: 0.5em;
    text-align:center;
	
}
footer{
	border-top-style:solid;
	border-top-color:#FF8040
}

section {
    width: 31.3%;
    float: left;
    margin:1%;
    text-align: center;
}

#feature {
    margin-top:10em;
    height: 20em;
    margin-bottom: 1em;
    background-color:#252525;
    text-align: center;
    margin-right:1%;
    margin-left:1%;
}

article {
	height: 17em;
    margin-bottom: 1em;
    background-color: #252525;
    text-align: center;
}

article {
	margin-right:0%;
}


.wrap-header{
	width:100%; 
	height:6em;
	background-color:#252525;
	border-bottom: 2px solid #ff850c;
	position:fixed;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #252525;
}

li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

nav, #feature, footer {
	background-color:#252525;
	padding:0.5em;
	text-align:center;
}




a {
	color:#000;
	text-decoration:none;
}

a:visited {
	color:#666;
	text-decoration:none;
}

a:hover { 
	color:#333;
	text-decoration:underline;
}

a:active {
	color:#999;
	text-decoration:none;
}

</style>

                  </head>
              
              <body>                                                     
 			<div class="wrap-header">
                   <header>

        		  <nav>
                  	<img src="Ardwyn Logo-02.png">
                		<ul>
                        	<li><a href="">PC</a></li>
                            <li><a href="">XBox One</a></li>
                            <li><a href="">PS4</a></li>
                            <li><a href="">3DS</a></li>
                        </ul>
                        
                 </nav>
</header>
</div>


<main>

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
		$platform = $cart_itm["platform"];
        $category = $cart_itm["category"];
        $available = $cart_itm["available"];
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
$results = $mysqli->query("SELECT product_code, category, product_name, product_desc, platform, available, product_img_name, price FROM products ORDER BY id ASC");
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
		<span>Platform</span>
		<select name="product_system">
		<option value="PS4">PS4</option>
		<option value="XBox One">XBox One</option>
        <option value="PC">PC</option>
        <option value="3DS">3DS</option>
		</select>
	</label>
	
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
  
</main>
       <footer>
 
                  <p>&copy; Copyright 2014</p>

           
                        
       </footer>

       </body>





</html>




