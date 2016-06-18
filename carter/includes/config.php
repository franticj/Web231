<?php
// A string used to encrypt the passwords, can be anything.
// This should not be changed once the login system is operating.
$encryption_string = "jgffaeeqwoovnhjHHGrrFdeEe";
// Use trailing slashes with all paths
define('DB_HOST', 'localhost');
define('DB_NAME', 'lmasonze_VirtualPlanet');
define('DB_USERNAME', 'lmasonze');
define('DB_PASSWORD', 'Chops7777!');
define('DB_PREFIX', ''); // Not required
define('LANGUAGE', 'EN'); // Currently available: EN (English) and NL (Dutch), or create your own!
define('EMAIL', 'lmason09@baker.edu');
define('LOGIN_URL', 'http://lmason09.com/Virtual_Planet/');
define('SUCCESS_URL', 'http://lmason09.com/Virtual_Planet/redirect.php'); // URL to go to after successfull login
// If ALLOW_RESET is set to false, users cannot reset their password when they have forgotten it.
// This is offcourse less user friendly, but also more secure,
// since the e-mail containing the reset variable could be sniffed.
define('ALLOW_RESET', true);
// If ALLOW_JOIN is set to true, people can register for a login name and password.
define('ALLOW_JOIN', true);
// If CAPTCHA is set to true, people need to enter a CAPTCHA to join (more secure).
define('CAPTCHA', true);
define('HTML_PATH', '/home2/lmasonze/public_html/Virtual_Planet/puls/html/'); // The absolute path.
// -- End of configuration -- //
// Connect to the mysql database.
$conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_NAME, $conn) or die(mysql_error());
$salt = sha1($encryption_string);
// set key used for encryption
if (!$_SESSION['key']) $_SESSION['key'] = sha1(randString());
include_once('lang_'.LANGUAGE.'.php');
// NOTHING after ?>