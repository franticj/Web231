<?php
	@mysql_connect("localhost","csillsze","Levon252!") or die("Database is unavailable, please try again later");
	@mysql_select_db("csillsze_vpcart") or die("Database is unavailable, please try again later");
	session_start();
?>