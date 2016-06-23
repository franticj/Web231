<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Virtual Planet - About Us</title>
<link rel="stylesheet" type="text/css" href="style/aboutus.css"/>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
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
                         
                  
          <!--</div>  -->    
</header>
 
</div>
<div class="clearboth"></div>
<div style="margin-top:100px;" align="center">
<form  name="contact_form" id="contact_form" method="post" action="send_form_email.php">

<table width="450px" align="center" id="contactform">

<tr>

 <td valign="top">

  <label for="first_name">First Name *</label>

 </td>

 <td valign="top">

  <input  type="text" name="first_name" maxlength="50" size="30" value="<?php if (isset($_POST['submit'])){ echo $_POST['first_name'];}?>"/>

 </td>

</tr>

<tr>

 <td valign="top"">

  <label for="last_name">Last Name *</label>

 </td>

 <td valign="top">

            <input  type="text" name="last_name" maxlength="50" size="30" value="<?php if (isset($_POST['submit'])){ echo $_POST['last_name'];}?>"/>
 </td>

</tr>

<tr>

 <td valign="top">

  <label for="email">Email Address *</label>

 </td>

 <td valign="top">

  <input  type="text" name="email" maxlength="80" size="30" value="<?php if (isset($_POST['submit'])){ echo $_POST['email'];}?>"/>

 </td>

</tr>

<tr>

 <td valign="top">

  <label for="telephone">Telephone Number</label>

 </td>

 <td valign="top">

  <input  type="text" name="telephone" maxlength="30" size="30"value="<?php if (isset($_POST['submit'])){ echo $_POST['telephone'];}?>"/>

 </td>

</tr>

<tr>

 <td valign="top">

  <label for="comments">Comments *</label>

 </td>

 <td valign="top">

  <textarea  name="comments" maxlength="1000" cols="25" rows="6"><?php if (isset($_POST['submit'])){ echo $_POST['comments'];}?></textarea>

 </td>

</tr>

<tr>

 <td colspan="2" style="text-align:center">

  <input name="submit" type="submit" id="submit" value="Submit"></td>

</tr>

</table>

</form>
</div>
<footer>
       <p>Thank you for visiting Virtual Planet</p>
       	<p>Created by Team 231 Jason~Carter~Christina~Lisa copyright 2016</p>
       	<br><br/>
       	
       
       </footer>
</body>
</html>
     </script>     					
   