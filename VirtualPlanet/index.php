 <!DOCTYPE html>
<html lang="en">
  <html>
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
                                    
                   <img src="images/logo.png">
                   <div class="greeting" style="width:45%;">
  
  
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
                        	<li><a href="">Action</a></li>
                            <li><a href="">Fighter</a></li>
                            <li><a href="">Role-Play</a></li>
                            <li><a href="">Shooter</a></li>
                        </ul>
                        
                        
                        
                 </nav>
                 
                 
                 <div id="account">
                 		<ul>
                        	<li><a href="">Account</a></li>
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


<main>

				<div id="feature">
                			<div class="featured_image">
                            
                					<img src="images/featured2.png">
                        	</div>
      
                        		<div class="featured_image2">
                        			
                        			<img src="images/featured3.png">
                                   
                        		</div>
                 				
                                		<div class="featured_product">
                     				<img src="images/category1.png"><br/>
                     				<img src="images/bestselling1.png">
                     
                   				</div>
                </div>
                
                
                
                <div class="content">
                	<h2>News</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue risus eu elit semper condimentum. Vivamus feugiat a nisi eget consequat. Sed vulputate fermentum nibh, ac rhoncus tortor sagittis vitae. In ornare, nisl quis convallis condimentum, ligula nibh porttitor augue, nec sollicitudin mauris ligula vitae nisi. Morbi tempor lacinia leo, at accumsan nisi lobortis at. Mauris eget porttitor urna. Donec malesuada commodo laoreet. Nam congue metus massa, eu ultrices libero consequat vitae. Nullam cursus convallis dui. Sed ut dui at elit dapibus posuere ac a neque. Vivamus tincidunt iaculis lectus quis mattis. Vestibulum hendrerit porttitor dignissim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer tincidunt justo quis posuere maximus. Phasellus in consequat leo. Vivamus nunc ligula, semper non ex vel, posuere volutpat ex.</p><p>

Cras finibus dapibus metus quis suscipit. Praesent convallis blandit magna quis hendrerit. Nulla vitae leo id metus auctor aliquet eget in nunc. Aliquam sed sapien diam. Praesent efficitur ac elit et aliquet. Fusce at posuere neque. Proin eget imperdiet ligula. Integer malesuada massa vel hendrerit iaculis. In mattis diam sed posuere pellentesque. </p> 
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
       	 <div class="footerformat">
       	  
          <div class="left">
 			<h2>CATEGORIES</h2>
            	<ul>
                	<li><a href="">Action</a></li>
                    <li><a href="">Fighter</a></li>
                    <li><a href="">Role-Play</a></li>
                    <li><a href="">Shooter</a></li>
                </ul>
            </div>
             	
                <div class="left">
                  <img src="images/paypal.png">
				</div>
                
                
                
                <div class="right">
 			<h2>NAVIGATION</h2>
            	<ul>
                	<li><a href="">Account</a></li>
                    <li><a href="">Wishlist</a></li>
                    <li><a href="">Order History</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            
           <div id="botbar">
               </div>
          </div>        
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




