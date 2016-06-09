<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Virtual Planet - About Us</title>

<link rel="stylesheet" type="text/css" href="style/aboutus.css"/>
</head>

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
                        <li><a href="action.php">Action</a></li>
                            <li><a href="fighting.php">Fighter</a></li>
                            <li><a href="rpg.php">Role-Play</a></li>
                            <li><a href="shooter.php">Shooter</a></li>
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
<div style="margin-top:100px;" align="center">
<form  name="contactform" method="post" action="send_form_email.php">

<table id="contactform" width="450px">

<tr>

 <td valign="top">

  <label for="first_name">First Name *</label>

 </td>

 <td valign="top">

  <input  type="text" name="first_name" maxlength="50" size="30">

 </td>

</tr>

<tr>

 <td valign="top"">

  <label for="last_name">Last Name *</label>

 </td>

 <td valign="top">

  <input  type="text" name="last_name" maxlength="50" size="30">

 </td>

</tr>

<tr>

 <td valign="top">

  <label for="email">Email Address *</label>

 </td>

 <td valign="top">

  <input  type="text" name="email" maxlength="80" size="30">

 </td>

</tr>

<tr>

 <td valign="top">

  <label for="telephone">Telephone Number</label>

 </td>

 <td valign="top">

  <input  type="text" name="telephone" maxlength="30" size="30">

 </td>

</tr>

<tr>

 <td valign="top">

  <label for="comments">Comments *</label>

 </td>

 <td valign="top">

  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>

 </td>

</tr>

<tr>

 <td colspan="2" style="text-align:center">

  <input type="submit" value="Submit"></td>

</tr>

</table>

</form>
</div>
</body>
</html>