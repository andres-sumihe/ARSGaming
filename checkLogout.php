<<?php 
	session_id("Login");
	session_start();
	session_destroy();
	header("Location: login.php")
 ?>