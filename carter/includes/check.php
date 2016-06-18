<?php

include_once(dirname(__FILE__)."/functions.php");
include_once(dirname(__FILE__)."/config.php");
// Check if the user has already logged in,
// and a if session with the user has already been established.
// Also checks to see if user has been remembered.
// If so, querie database to make sure of the user's authenticity.
// Returns true if the user has logged in.
function checkLogin(){
	/* Check if user has been remembered */
	if(isset($_COOKIE['c_name']) && isset($_COOKIE['c_pass'])){
		$_SESSION['username'] = $_COOKIE['c_name'];
		$_SESSION['password'] = hmac($_SESSION['key'], $_COOKIE['c_pass']);
	}
	/* Username and password have been set */
	if(isset($_SESSION['username']) && isset($_SESSION['password'])){
		/* Confirm that username and password are valid */
		if(confirmUser($_SESSION['username'], $_SESSION['password']) != 0){
			/* Variables are incorrect, user not logged in */
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			// reset cookies
			if(isset($_COOKIE['c_name'])){
				setcookie("c_name", "", time()-60*60*24*100, "/");
			}
			if(isset($_COOKIE['c_pass'])){
				setcookie("c_pass", "", time()-60*60*24*100, "/");
			}
			return false;
		}
		// log user data
		if (!isset($_SESSION['logged'])) {
			$_SESSION['logged'] = true;
			global $conn;
			/* Add slashes if necessary (for query) */
			$username = $_SESSION['username'];
			$ip = $_SERVER['REMOTE_ADDR'];
			if(!get_magic_quotes_gpc()) {
				$username = addslashes($username);
				$ip = addslashes($ip);
			}
			$q = "UPDATE ".DB_PREFIX."users SET ip = '$ip', lastdate = '".date('Y-m-d  H:i:s')."' WHERE username = '$username'";
			mysql_query($q,$conn);
		}
		return true;
	}
	/* User not logged in */
	else{
		return false;
	}
}
if(!checkLogin()) {
	// cannot redirect using header() because header is already sent with session_start()
	// using html meta refresh instead
	$refresh = LOGIN_URL.'login.php';
	exit(include_once(HTML_PATH."html_refresh.php"));
}
?>