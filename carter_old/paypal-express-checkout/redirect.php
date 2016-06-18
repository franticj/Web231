<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

// Original code from evolt.org by jpmaster77
// http://evolt.org/php_login_script_with_remember_me_feature

// ### check login start ###
session_start();
session_regenerate_id(true); // Generate new session id and delete old (PHP >= 5 only)
include_once("../puls/includes/check.php");
// ### check login end ###
?>
<meta http-equiv="refresh" content="0; url=index.php" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>