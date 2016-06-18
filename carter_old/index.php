 <!DOCTYPE html>
<html lang="en">
 
        <head>
                <title> Virtual Planet </title>
                <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      	<link rel="stylesheet" href="owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      	<script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      	<script type="text/javascript" src="js/modernizr.js"></script>


                  </head>
              
              <body>                                                     
 			<div class="wrap-header">
                   <header>
                   <a href="index.php"><img height="92" src="images/Logo.jpg" width="93"></a>
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
                            <li><a href="xbox1.php">XBox One</li>
                            <li><a href="ps4.php">Playstation 4</a></li>
                            <li><a href="pc.php">PC</a></li>
                            <li><a href="rpg.php">RPG</a></li>
                            <li><a href="3ds.php">Nintento 3DS</a></li>
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


<main>

				<div id="feature">
                			<div class="featured_image">
                            
                					<img src="images/featured2.png">
                        	</div>
      
                        		<div class="featured_image2">
                        			
                        			<img src="images/featured3.png"  height="310" width="300">
                                   
                        		</div>
                 				
                                		<div class="featured_product">
                     				<img src="images/category1.png"><br/>
                     				<img src="images/bestselling1.png">
                     
                   				</div>
                </div>
                
                
                
                <div class="content">
                	<h2>Welcome</h2>
                                  <p>Thank you for visiting our site. Virtual Planet was created by Carter Sills, Jason Turner, Rosalie Desilets, and Lisa Mason. This was a group project at Baker College for Web 231 Server-Side Programming. We used PHP to create the eCommerce gaming site. You are welcome to look around but please do not order anything, as the site is just a project.
</p> 
</div>                
					<div id="games">
            				<div id="owl-demo2" class="owl-carousel margin-bottom">
                            
               <div class="item"><img src="products/bf4.jpg" alt=""></div>
               <div class="item"><img src="products/cod.jpg" alt=""></div>
               <div class="item"><img src="products/doom.jpg" alt=""></div>
               <div class="item"><img src="products/overwatch.jpg" alt=""></div>
               <div class="item"><img src="products/ffxv.jpg" alt=""></div>
               <div class="item"><img src="products/fallout4.jpg" alt=""></div>
               <div class="item"><img src="products/uncharted4.jpg" alt=""></div>
               <div class="item"><img src="products/ufc2.jpg" alt=""></div>
               <div class="item"><img src="products/thewitcher.jpg" alt=""></div>
               <div class="item"><img src="products/mkx.jpg" alt=""></div>
               
            				</div>
					</div>
              </div>          
  
</main>
       <footer>
       <p>Thank you for visiting Virtual Planet</p>
       	<p>Created by Team 231 Jason~Carter~Christina~Lisa copyright 2016</p>
       	<br><br/>
       	
       
       </footer>
       
       
       
       
       <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>  
      <script type="text/javascript">
         jQuery(document).ready(function($) {	  
           $("#owl-demo").owlCarousel({		
         	navigation : true,
         	slideSpeed : 300,
         	paginationSpeed : 400,
         	autoPlay : true,
         	singleItem:true
           });
           $("#owl-demo2").owlCarousel({
         	items : 4,
         	lazyLoad : true,
         	autoPlay : true,
         	navigation : true,
         	pagination : false
           });
         });	 
      </script>

       </body>





</html>

